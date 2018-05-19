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
    	\App\Article::where('id', $article_id)->delete();
        return redirect('view-entries')->with('status', 'Article has been successfully trashed. Articles are kept in recycling for 90 days in case of accidental deletion.');
    }
}