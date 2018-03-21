<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CrossRefController extends Controller
{
    public function lookup_doi_article(Request $request) {
        $doi = $request->doi_val;
        $doiRequest = new Client(['base_uri' => 'https://api.crossref.org/works/']);
        $result = $doiRequest->request('GET', $doi)->getBody();
        $result = json_decode($result, true);
        // dd($result, $doi);
        $result = $result['message']['container-title']['0'];
        return redirect('new-entry')->with("status", "Imported article from '".$result."' successfully.");
        // print_r('imported article from ' .$result.' successfully.');
    }
}
