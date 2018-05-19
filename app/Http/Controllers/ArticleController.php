<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ArticleController extends Controller
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

    public function discard($article_id)
    {
    	return Auth::user()->name . ' tried to delete ' . \App\Article::where('id', $article_id)->pluck('name') . ' but never accounted for the fact that this method was not written yet.';
    }
}