<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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
    public function index()
    {
        return view('home');
    }

    public function new_entry()
    {
        return view('new-entry');
    }

    public function show_categories()
    {
        return view('categories');
    }

    public function view_entries()
    {
        return view('view-entries')->with([
            'feed' => \App\Article::all()
        ]);
    }

    public function view_comments()
    {
        return view('comments');
    }
}
