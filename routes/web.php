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

Route::resource('posts', 'PostsController');

// Route::get('/posts', 'PostsController@index')->name('posts.index');
// Route::get('/posts/create', 'PostsController@create')->name('posts.create');
// Route::get('/posts/{id}/edit', 'PostsController@edit')->name('posts.edit');
// Route::post('/posts', 'PostsController@store')->name('posts.store');
// Route::patch('/posts/{id}', 'PostsController@update')->name('posts.update');
// Route::delete('/posts', 'PostsController@destroy')->name('posts.destroy');
Route::get('/home', 'HomeController@index')->name('home');
