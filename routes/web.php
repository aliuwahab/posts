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
Route::get('/users','UserController@index');
Route::get('/users/{userId}','UserController@show');
Route::get('/users/{userId}/posts','UserController@userPosts');
Route::get('/posts','PostController@index');
Route::get('/posts/{postId}','PostController@show');
Route::get('/posts/{postId}/comments','PostController@postComments');
Route::get('/comments','CommentController@index');
Route::get('/comments/{commentId}','CommentController@show');
