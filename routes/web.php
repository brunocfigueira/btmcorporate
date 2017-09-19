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
})->name('welcome');

Route::get('/users', 'APIController@users')->name('users');
Route::get('/posts', 'APIController@posts')->name('posts');
Route::get('/posts/create', 'APIController@createPost')->name('createPost');
Route::post('/posts/sendPost', 'APIController@sendPost')->name('sendPost');
Route::get('/posts/edit/{id}', 'APIController@editPost')->name('editPost');
Route::post('/posts/update/{id}', 'APIController@updatePost')->name('updatePost');

Route::get('/maps', 'MapsController@showMap')->name('showMap');

Route::get('/mapForm', function () {
	return view('maps/mapForm');
})->name('mapForm');