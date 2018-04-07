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

Route::get('/categories/{id}', 'HomeController@show_categories')->name('categories');

Route::post('/search', 'CrossRefController@validate_doi_article');

Route::get('/insert', 'CrossRefController@insert');