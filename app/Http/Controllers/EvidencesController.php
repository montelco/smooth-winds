<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class EvidencesController extends Controller
{
	public function all_evidence()
	{
		return \App\Evidence::all();
	}

	public function all_evidence_field(string $field)
	{
		return \App\Evidence::all()->pluck('field');
	}
	public function all_for_user($request = Auth::user()->id)
	{
		return \App\Evidence::where('user_id', $request->user_id);
	}
	public function all_for_article(Request $request)
	{
		return \App\Evidence::where('article_id', $request->article_id);
	}
	public function all_for_article_by_user(Request $request, $user_id = Auth::user()->id)
	{
		return \App\Evidence::where('article_id', $request->article_id)->where('user_id', $user_id);
	}
	public function search_by_parameter(Request $request)
	{
		return \App\Evidence::where($request->parameter, $request->query_string);
	}
	public function create(Request $request)
	{
		$this->validate($request, [
			'evidence' => 'required',
			'positivity' => 'required|boolean',
			'notes' => 'required|max:1023',
		]);

		$result = $request->user()->evidences()->create([
			'evidence' => $request->evidence,
			'positivity' => $request->positivity,
			'notes' => $request->notes,
		]);
	}
}