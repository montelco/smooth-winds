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

Route::get('/new-entry', 'HomeController@new_entry')->name('new-entry');

Route::get('/view-entries', 'HomeController@view_entries')->name('view-entries');

Route::get('/categories/{id}', function (\App\Article $id) {
    return view('categories')->with('article_id', $id);
});

Route::get('/comments/{id}', function (\App\Article $id) {
	return view('comments')->with('comments', $id->comments)->with('article', $id);
});

Route::post('/add-comment', 'CommentsController@set_comment');

Route::post('/categories', 'CategoriesController@add_to_article');

Route::post('/search', 'CrossRefController@validate_doi_article');

Route::get('/insert', 'CrossRefController@insert');