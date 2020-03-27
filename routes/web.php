<?php

use Illuminate\Support\Facades\Route;

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
//=====index=========
Route::get('/posts', 'PostController@index')->name('posts.index')->middleware('auth');
//========create========
Route::get('/posts/create', 'PostController@create')->name('posts.create')->middleware('auth');
//=======store==========
Route::post('/posts', 'PostController@store')->name('posts.store');
//=======show===========
Route::get('/posts/{post}', 'PostController@show')->name('posts.show');
//=======Edit===========
Route::GET('/posts/{post}/edit', 'PostController@edit')->name('posts.edit');
//=======Update===========
Route::PUT('/posts/{post}', 'PostController@update')->name('posts.update');
//=======Delete===========
Route::DELETE('/posts/{post}', 'PostController@destroy')->name('posts.destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
