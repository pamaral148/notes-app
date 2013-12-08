<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
// home route
Route::get('/', array('as' => 'home', 'before' => 'auth', 'uses' => 'HomeController@index'));

// login route
Route::get('login', array('as' => 'login', 'uses' => 'AuthenticateController@getIndex'))->before('guest');

// GET register form
Route::get('register', array('as' => 'register', 'uses' => 'AuthenticateController@getRegister'));

// POST register route
Route::post('register', array('before' => 'csrf', 'uses' => 'AuthenticateController@postRegister'));

// GET activation
Route::get('activation/{token}', array('uses' => 'AuthenticateController@getActivate'));
