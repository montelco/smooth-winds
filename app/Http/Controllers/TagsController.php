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

    public function json_categories()
    {
        return response()->json($this->all_pluck_field('name'));
    }

    public function all_pluck_field(string $field)
    {
        return \App\Tag::all()->pluck($field);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:64',
            'type' => 'required|numeric',
        ]);

        $tag = new \App\Tag;
        $tag->create([
            'name' => collect($this->format($request->name))['0'],
            'type' => $request->type,
        ]);
        return redirect('/categories/editor/list')->with('status', 'Created your new tag successfully.');
    }

    public function update(Request $request)
    {
        $tag = \App\Tag::find($request->id);
        $tag->update([
            'name' => collect($this->format($request->name))['0'],
            'type' => $request->type,
        ]);
        return redirect('/categories/editor/list')->with('status', 'Updated tag successfully.');
    }

    public function discard($article_id)
    {
        \App\Tag::where('id', $article_id)->delete();
        return redirect('/categories/editor/list')->with('delete-status', 'Tag has been successfully trashed. Tags are kept in recycling for 90 days in case of accidental deletion.');
    }

    public function all()
    {
        return \App\Tag::all();
    }

    public function difference($taggables, $database)
    {
        return collect($taggables->diff($database));
    }

    public function add_to_article(Request $request)
    {
        $user = $request->user();
        $tags = collect($this->ids_for_list($request));
        $user->tags()->where('type', $request->type)->wherePivot('article_id', $request->article)->detach(collect($user->tags()->where('type', $request->type)->wherePivot('article_id', $request->article)->pluck('id')));
        foreach ($this->ids_for_list($request) as $tag_id) {
            $user->tags()->attach(Auth::user()->id, array('article_id' => $request->article, 'tag_id' => $tag_id));
        }
        return redirect('/categories/'.$request->article);
        
        // return $user->tags()->sync(array('article_id' => $request->article, 'tag_id' => $tags, 'user_id' => Auth::user()->id));
    }

    public function ids_for_list(Request $request)
    {
        return \App\Tag::whereIn('name', $request->name)->pluck('id');
    }

    public function format_array(Request $request){
        return $this->dashCasing($this->trim($this->individualize($this->lowerCase($request->taggable))));
    }

    public function format($name){
        return $this->dashCasing($this->lowerCase($name));
    }

    public function lowerCase($taggables)
    {
        return strtolower($taggables);
    }

    public function trim($taggables)
    {
        return array_map('trim', $taggables);
    }

    public function categorized()
    {
        $all = $this->all();
        return collect($all->mapToGroups(function($all) {
            return [$all['type'] => $all['name']];
        }));
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
        // Deprecation
        return \App\User::where('id', Auth::user()->id)->with('tags.articles')->get();
    }

    public function tags_on_article($user_collected, $article_id)
    {
        // Now we need to go the other way and dig into the tag to find which ones have been applied to which articles
        // Deprecation
        if ($user_collected['0']->articles->where('id', $article_id)->take(1)->nth(1)) {
            return $user_collected['0']->articles->where('id', $article_id)->take(1)->nth(1);
        } else {
            return null;
        }
    }

    public function users_tags($collected_tags)
    {
        // Deprecation
        if ($collected_tags[0]->tags->pluck('name')) {
            return $collected_tags[0]->tags->pluck('name');
        } else {
            return "";
        }
    }

    public function show_tags_for_article($article_id)
    {
        $article = \App\Article::findOrFail($article_id);
        return $article->tags()->where('user_id', Auth::user()->id)->pluck('name');
        // return $this->users_tags($this->tags_on_article($this->users_tagged_articles(), $article_id));
    }

    public function display_view($article_id)
    {
        return view('categories')
            ->with([
                'article' => \App\Article::where('id', $article_id)->get(),
                'all_tags' => $this->categorized(),
                'tags' => $this->show_tags_for_article($article_id),
                'tags_compressed' => collect($this->show_tags_for_article($article_id))->implode(','),
            ]);
    }

    public function display_editor()
    {
        return view('tag-editor')
            ->with([
                'feed' => $this->all(),
            ]);
    }

    public function display_update_new($tag_id = null)
    {
        if($tag_id != null) {
            return view('tag-composer')
                ->with([
                    'update' => \App\Tag::find($tag_id),
                ]);
        } else {
            return view('tag-composer')
                ->with([
                    'update' => null,
                ]);
        }
        
    }
}