<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ObstaclesController extends Controller
{
	public function all_obstacles()
	{
		return \App\Obstacle::all();
	}

	public function all_obstacles_field(string $field)
	{
		return \App\Obstacle::all()->pluck('field');
	}
	public function all_for_user($request = Auth::user()->id)
	{
		return \App\Obstacle::where('user_id', $request->user_id);
	}
	public function all_for_article(Request $request)
	{
		return \App\Obstacle::where('article_id', $request->article_id);
	}
	public function all_for_article_by_user(Request $request, $user_id = Auth::user()->id)
	{
		return \App\Obstacle::where('article_id', $request->article_id)->where('user_id', $user_id);
	}
	public function search_by_parameter(Request $request)
	{
		return \App\Obstacle::where($request->parameter, $request->query_string);
	}
	public function create(Request $request)
	{
		$this->validate($request, [
			'obstacle' => 'required',
			'positivity' => 'required|boolean',
			'notes' => 'required|max:1023',
		]);

		$result = $request->user()->obstacles()->create([
			'obstacle' => $request->obstacle,
			'positivity' => $request->positivity,
			'notes' => $request->notes,
		]);
	}
}