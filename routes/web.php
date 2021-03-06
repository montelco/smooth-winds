<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/about', 'HomeController@about')->name('about');

Route::get('/team', 'HomeController@team')->name('team');

Route::get('/new-entry', 'HomeController@new_entry')->name('new-entry');

Route::get('/doi', 'HomeController@doi_prefetch')->name('doi');

Route::post('/doi-prefill', 'CrossRefController@prefill_doi_article');

Route::get('/tags/tags.json', 'TagsController@json_categories');

Route::get('/diff-demo/{params}', 'TagsController@diff');

Route::get('/view-entries', 'HomeController@view_entries')->name('view-entries');

Route::get('/categories/{id}', 'TagsController@display_view');

Route::get('/categories/editor/edit/{article_id?}', 'TagsController@display_update_new');

Route::post('/categories/editor/edit/create', 'TagsController@create');

Route::post('/categories/editor/edit/update', 'TagsController@update');

Route::get('/categories/editor/discard/{tag_id}', 'TagsController@discard');

Route::get('/categories/editor/list', 'TagsController@display_editor');

Route::get('/discard/{article_id}', 'ArticleController@discard');

Route::get('/sorted-tags', 'TagsController@categorized');

Route::get('/demo-tagged/{article_id}', 'TagsController@show_tags_for_article');

Route::get('/comments/{id}', function (\App\Article $id) {
	return view('comments')->with('comments', $id->comments)->with('article', $id);
});

Route::post('/add-comment', 'CommentsController@set_comment');

Route::post('/categories', 'TagsController@add_to_article');

Route::post('/search', 'CrossRefController@validate_doi_article');

Route::get('/insert', 'CrossRefController@insert');