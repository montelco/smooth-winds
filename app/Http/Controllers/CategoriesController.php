<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CategoriesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_categories()
    {
        return view('view-categories');
    }

    public function add_to_article(Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
            'taggable' => 'required',
        ]);

        $formatted = $this->format($request);
        $this
        return $formatted;
    }

    public function format(Request $request){
        return $this->trim($request->taggable);
    }

    public function trim($taggables)
    {
        $taggable = trim($taggables);
        return $this->dashCasing($taggables);
    }

    public function dashCasing($taggables)
    {
        $taggables = str_replace(' ', '-', $taggables);
        return $this->individualize($taggables);
    }

    public function individualize($taggables)
    {
        $taggables = explode(',', $taggables);
        return $taggables;
    }
}
