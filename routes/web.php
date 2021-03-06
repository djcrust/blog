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

Route::group(['middleware'=>['web']],function (){

    Route::get('blog/{slug}',['as' => 'blog.single','uses' => 'BlogController@getSingle']);

    Route::get('blog',['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);

    Route::get('/','PageController@Index');
    Route::get('about','PageController@getAbout');
    Route::get('contact','PageController@getContact');
    Route::resource('posts','PostController');
    Route::resource('categories','CategoryController');

    Route::get('exportCategory','CategoryController@exportCategory')-> name('exportCategory');
    Route::get('readData','CategoryController@readData');
    Route::get('paginateCategory','CategoryController@paginateCategory')-> name('paginateCategory');
});