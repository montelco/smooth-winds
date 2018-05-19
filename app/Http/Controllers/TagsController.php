<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class TagsController extends Controller
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
    public function json_categories()
    {
        return response()->json($this->all_pluck_field('name'));
    }
    public function all_pluck_field(string $field)
    {
        return \App\Tag::all()->pluck($field);
    }

    public function difference($taggables, $database)
    {
        return collect($taggables->diff($database));
    }

    public function add_to_article(Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
            'taggable' => 'required',
            'article' => 'required',
        ]);

        // Do we want to run attach at this point or what?
        // Lets diff the request from what's already on the article by that user versus all the available tags
        // Then using the diff we should be able to attach
        // >>> $user->tags()->attach(Auth::user()->id, array('article_id' => $request->article, 'tag_id' => {INSERT CALL TO FIRST OR CREATE}));
        return $this->difference($this->format($request), $this->show_tags_for_article($request->article)->all());
    }

    public function format(Request $request){
        return $this->dashCasing($this->trim($this->individualize($this->lowerCase($request->taggable))));
    }

    public function lowerCase($taggables)
    {
        return strtolower($taggables);
    }

    public function trim($taggables)
    {
        return array_map('trim', $taggables);
    }

    public function dashCasing($taggables)
    {
        return collect(str_replace(' ', '-', $taggables));
    }

    public function individualize($taggables)
    {
        return explode(',', $taggables);
    }

    public function users_tagged_articles()
    {
        return \App\User::where('id', Auth::user()->id)->with('tags.articles')->get();
    }

    public function tags_on_article($user_collected, $article_id)
    {
        // Now we need to go the other way and dig into the tag to find which ones have been applied to which articles
        if ($user_collected['0']->articles->where('id', $article_id)->take(1)->nth(1)) {
            return $user_collected['0']->articles->where('id', $article_id)->take(1)->nth(1);
        } else {
            return null;
        }
    }

    public function users_tags($collected_tags)
    {
        if ($collected_tags[0]->tags->pluck('name')) {
            return $collected_tags[0]->tags->pluck('name');
        } else {
            return "";
        }
    }

    public function show_tags_for_article($article_id)
    {
        return $this->users_tags($this->tags_on_article($this->users_tagged_articles(), $article_id));
    }

    public function display_view($article_id)
    {
        return view('categories')
            ->with([
                'article' => \App\Article::where('id', $article_id)->get(),
                'tags' => $this->show_tags_for_article($article_id),
                'tags_compressed' => collect($this->show_tags_for_article($article_id))->implode(','),
            ]);
    }
}