<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::group(['middleware'=>['web']],function (){
    Route::get('blog/{slug}',[
        'uses'=>'BlogController@getSingle',
        'as'=>'blog.single'
    ])->where('slug','[\w\d\-\_]+');

    Route::get('blog',[
        'uses'=> 'BlogController@getIndex',
        'as'=>'blog.index'
    ]) ;

    Route::get('/',[
        'uses'=> 'PagesController@getIndex',
        'as'=>'pages.welcome'
    ]) ;

    Route::get('/about',[
        'uses'=> 'PagesController@getAbout',
        'as'=>'pages.about'
    ]) ;

    Route::get('/contact',[
        'uses'=> 'PagesController@getContact',
        'as'=>'pages.contact'
    ]) ;

    Route::resource('posts','PostController');

});
