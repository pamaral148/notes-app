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

// POST login
Route::post('login', array('before' => 'csrf', 'uses' => 'AuthenticateController@postLogin'));

// GET register form
Route::get('register', array('as' => 'register', 'uses' => 'AuthenticateController@getRegister'));

// POST register route
Route::post('register', array('before' => 'csrf', 'uses' => 'AuthenticateController@postRegister'));

// GET reset password
Route::get('reset', array('as' => 'reset', 'uses' => 'AuthenticateController@getReset'));

// GET reset password form
Route::get('password/reset/{token}', function($token){
    return View::make('authenticate.reset')
            ->with('token', $token)
            ->with('title', 'Password Reset');
});

Route::post('password/reset/{token}', function() {
    $credentials = array(
        'email' => Input::get('email'),
        'password' => Input::get('password'),
        'password_confirmation' => Input::get('password_confirmation')
    );
    return Password::reset($credentials, function($user, $password)
    {
        $user->password = Hash::make($password);
        $user->save();
        return Redirect::route('home');
    });
});


// POST reset password
Route::post('reset', array('before' => 'csrf', 'uses' => 'AuthenticateController@postReset'));

// GET activation
Route::get('activation/{token}', array('uses' => 'AuthenticateController@getActivate'));

// Logout route 
Route::get('logout', array('as' => 'logout', function () {
    Auth::logout();
    return Redirect::route('login')
               ->with('message', 'You are successfully logged out.');
}))->before('auth');
