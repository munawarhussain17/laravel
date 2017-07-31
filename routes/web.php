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

Route::get('/', 'PagesController@getIndex');
Route::get('about','PagesController@getAbout');
Route::get('contact','PagesController@getContact');
Route::resource('posts','PostController');
Route::get('blog/{slug}',['as'=>'slug.single','uses'=>'BlogController@getsingle'])->where('slug','[\w\d\-\_]+');
Route::get('blog',['as'=>'blog.index','uses'=>'BlogController@getindex']);
Route::resource('categories','CategoriesController',['except'=>['create']]);
Route::resource('tags','tagController',['except'=>['create']]);
Route::post('contact','PagesController@postcontact');
Route::post('comment/{post_id}',['as'=>'comment.store' ,'uses'=>'CommentController@store']);
Route::get('comment/{id}/edit',['as'=>'comment.edit','uses'=>'CommentController@edit']);
Route::put('comment/{id}',['as'=>'comment.update','uses'=>'CommentController@update']);
Route::get('comment/{id}/delete',['as'=>'comment.delete','uses'=>'CommentController@delete']);
Route::delete('comment/{id}',['as'=>'comment.destroy','uses'=>'CommentController@destroy']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
