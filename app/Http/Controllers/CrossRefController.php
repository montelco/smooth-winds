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
            return $this->lookup_from_api($request);
        }
    }
    public function lookup_from_api(Request $request) {
        $doiRequest = new Client(['base_uri' => 'https://api.crossref.org/works/']);
        $result = $doiRequest->request('GET', $request->doi_val)->getBody();
        $result = json_decode($result, true);
        return $this->insert($request, $result);
    }
    public function insert(Request $request, $result)
    {
        $newRecord = $request->user()->articles()->create([
            'doi' => $request->doi_val,
            'journal' => $result['message']['container-title']['0'],
            'name' => $result['message']['title']['0'],
            'page' => $result['message']['page'],
            'year' => $result['message']['license']['0']['start']['date-parts']['0']['0'],
            'month' => $result['message']['license']['0']['start']['date-parts']['0']['1'],
            'day' => $result['message']['license']['0']['start']['date-parts']['0']['2'],
        ]);

        $article_id = $newRecord->id;

        for($i=0;$i <= count($result['message']['author'])-1;$i++) {
            \App\Author::create([
                'family_name' => $result['message']['author'][$i]['family'],
                'given_name' => $result['message']['author'][$i]['given'],
                'article_id' => $article_id,
            ]);
        }
        return redirect('new-entry')->with('status', 'Imported your document successfully. Please visit the Edit page to add attributes');
    }
    public function manual_insert(Request $request)
    {
        dd($request);
        // $newRecord = $request->user()->articles()->create([
        //     'doi' => $request->doi_val,
        //     'journal' => $result['message']['container-title']['0'],
        //     'name' => $result['message']['title']['0'],
        //     'page' => $result['message']['page'],
        //     'year' => $result['message']['license']['0']['start']['date-parts']['0']['0'],
        //     'month' => $result['message']['license']['0']['start']['date-parts']['0']['1'],
        //     'day' => $result['message']['license']['0']['start']['date-parts']['0']['2'],
        // ]);

        // $article_id = $newRecord->id;

        // for($i=0;$i <= count($result['message']['author'])-1;$i++) {
        //     \App\Author::create([
        //         'family_name' => $result['message']['author'][$i]['family'],
        //         'given_name' => $result['message']['author'][$i]['given'],
        //         'article_id' => $article_id,
        //     ]);
        // }
        // return redirect('new-entry')->with('status', 'Imported your document successfully. Please visit the Edit page to add attributes');
    }
}
