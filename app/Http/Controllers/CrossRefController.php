<?php

namespace App\Http\Controllers;
use App\Author;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Auth;
use Carbon;
use Validator;

class CrossRefController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function validate_doi_article(Request $request) {
        if ($request->manual == 1) {
            return $this->manual_insert($request);
        } else {
            return Response::json(['message' => 'This article fails to meet requirements for security.'], 400);
        }
    }

    public function lookup_from_api(Request $request) {
        $doiRequest = new Client(['base_uri' => 'https://api.crossref.org/works/'
    ]);
        $result = $doiRequest->request('GET', $request->doi_val)->getBody();
        $result = json_decode($result, true);
        return $result;
        // return $this->insert($request, $result);
        // return $this->fill_form($request, $result);
    }

    public function fill_form(Request $request, $result)
    {
        dd($result, $request);
    }

    public function prefill_doi_article(Request $request)
    {
        return view('new-entry')->with([
            'prefill' => $this->lookup_from_api($request)
        ]);
    }

    public function insert(Request $request, $result)
    {
        if (isset($result['message']['created'])) { 
            $newRecord = $request->user()->articles()->create([
                'doi' => $request->doi_val,
                'journal' => $result['message']['container-title']['0'],
                'name' => $result['message']['title']['0'],
                'page' => $result['message']['page'],
                'year' => $result['message']['created']['date-parts']['0']['0'],
            ]);
        } else { 
            $newRecord = $request->user()->articles()->create([
                'doi' => $request->doi_val,
                'journal' => $result['message']['container-title']['0'],
                'name' => $result['message']['title']['0'],
                'page' => $result['message']['page'],
            ]);
        }

        $article_id = $newRecord->id;

        for($i=0;$i <= count($result['message']['author'])-1;$i++) {
            \App\Author::create([
                'family_name' => $result['message']['author'][$i]['family'],
                'given_name' => $result['message']['author'][$i]['given'],
                'article_id' => $article_id,
            ]);
        }
        return redirect('view-entries')->with('status', 'Imported your document successfully.');
    }
    public function manual_insert(Request $request)
    {
        $newRecord = \App\Article::create([
            'doi' => $request->doi_val,
            'journal' => $request->journal,
            'name' => $request->name,
            'page' => $request->pages,
            'year' => $request->year,
            'month' => $request->month,
            'day' => $request->day,
        ]);

        $result = $this->lookup_from_api($request);
        $article_id = $newRecord->id;

        if($request->doi_val){
            for($i=0;$i <= count($result['message']['author'])-1;$i++) {
                \App\Author::create([
                    'family_name' => $result['message']['author'][$i]['family'],
                    'given_name' => $result['message']['author'][$i]['given'],
                    'article_id' => $article_id,
                ]);
            }
        }
        
        return redirect('view-entries')->with('status', 'Imported your document successfully.');
    }
}
