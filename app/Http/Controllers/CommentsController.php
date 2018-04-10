<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CommentsController extends Controller
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


    public function set_comment(Request $request)
    {
        return $this->validation_rule($request);
    }

    public function validation_rule(Request $request)
    {
        $this->validate($request,[
            'article' => 'required',
            'body' => 'required|max:512'
        ]);

        return $this->submit($request);
    }

    public function submit(Request $request)
    {
        $request->user()->comments()->create([
            'article_id' => $request->article,
            'body' => $request->body
        ]);

        return redirect('/comments' . '/' . $request->article);
    }

}
