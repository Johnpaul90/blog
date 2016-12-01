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
    /**
     * Authentication
     */
    Route::get('auth/login',[
        'uses'=>'AuthController@getLogin',
        'as' =>'auth.login'
    ]);

    Route::post('auth/login',[
        'uses'=>'AuthController@postLogin',
        'as' =>'auth.login'
    ]);
    Route::get('auth/register',[
        'uses'=>'AuthController@getRegister',
        'as' =>'auth.register'
    ]);

    Route::post('auth/register',[
        'uses'=>'AuthController@postRegister',
        'as' =>'auth.register'
    ]);
    /**
     * Password Reset
     */
    Route::get('password/reset/{token?}',[
        'uses'=>'Auth\ResetPasswordController@showResetForm',
        'as'=>'passwords.reset'
    ]);
    Route::post('password/reset',[
        'uses'=>'Auth\ResetPasswordController@reset',
        'as'=>'passwords.reset'
    ]);
    Route::post('password/email',[
        'uses'=>'Auth\ForgotPasswordController@sendResetLinkEmail',
        'as'=>'passwords.email'
    ]);
    Route::get('password/email',[
        'uses'=>'Auth\ForgotPasswordController@showLinkRequestForm',
        'as'=>'passwords.email'
    ]);
    /**
     * Welcome page
     */
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

});

Route::group(['middleware'=>'auth'], function(){
    Route::get('auth/logout',[
        'uses'=>'AuthController@getLogout',
        'as' =>'auth.logout',
    ]);


    Route::get('blog/{slug}',[
        'uses'=>'BlogController@getSingle',
        'as'=>'blog.single'
    ])->where('slug','[\w\d\-\_]+');

    Route::get('blog',[
        'uses'=> 'BlogController@getIndex',
        'as'=>'blog.index'
    ]) ;
    /**
     * CRUD
     */

    Route::resource('posts','PostController');

});
