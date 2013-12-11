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
        $cookie = Cookie::forget('_secure');
        $user->password = Hash::make($password);
        $user->active = 1;
        $user->save();
        return Redirect::route('home')
                ->withCookie($cookie);
    });
});


// POST reset password
Route::post('reset', array('before' => 'csrf', 'uses' => 'AuthenticateController@postReset'));

// GET activation
Route::get('activation/{token}', array('uses' => 'AuthenticateController@getActivate'));

// Logout route 
Route::get('logout', array('as' => 'logout', function () {
    $id = Auth::user()->id;
    $dir = './tmp_' . $id;
    $tmpFiles = scandir($dir);
    foreach($tmpFiles as $file) {
        if(($file == '.') ||
           ($file == '..')
        ) {
            continue;
        }    
        unlink($dir . '/' . $file);
    }       
    rmdir($dir);
    Auth::logout();
    return Redirect::route('login')
               ->with('message', 'You are successfully logged out.');
}))->before('auth');

// Notes routes
Route::group(array('prefix' => 'notes'), function() {

    // POST new note
    Route::post('create', array('before' => 'csrf', 'uses' => 'NoteController@postAdd'));
    
    // GET update
    Route::get('update', array('as' => 'note.update', 'before' => 'auth', 'uses' => 'NoteController@getNote'));
    
    // POST update
    Route::post('update', array('before' => 'csrf', 'uses' => 'NoteController@postUpdate'));
    
    // GET delete note
    Route::get('delete', array('as' => 'note.delete', 'before', 'auth', 'uses' => 'NoteController@deleteNote'));
    
});

// Images routes
Route::group(array('prefix' => 'images'), function() {
   
    // POST new image
    Route::post('upload', array('before' => 'csrf', 'uses' => 'ImageController@postUpload'));
    
});

// Links routes
Route::group(array('prefix' => 'links'), function() {
   
    // POST new image
    Route::post('post', array('before' => 'csrf', 'uses' => 'LinkController@postLinks'));
    
});

// Tbd routes
Route::group(array('prefix' => 'tbd'), function() {

    // POST new note
    Route::post('create', array('before' => 'csrf', 'uses' => 'TbdController@postAdd'));
    
    // GET update
    Route::get('update', array('as' => 'tbd.update', 'before' => 'auth', 'uses' => 'TbdController@getTbd'));
    
    // POST update
    Route::post('update', array('before' => 'csrf', 'uses' => 'TbdController@postUpdate'));
    
    // GET delete tbd
    Route::get('delete', array('as' => 'tbd.delete', 'before', 'auth', 'uses' => 'TbdController@deleteTbd'));
    
});