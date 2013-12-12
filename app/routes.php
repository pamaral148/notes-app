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

// Register Group
Route::group(array('prefix' => 'register'), function() {

	// GET register form
	Route::get('/', array('as' => 'register', 'uses' => 'AuthenticateController@getRegister'));

	// POST register route
	Route::post('/', array('before' => 'csrf', 'uses' => 'AuthenticateController@postRegister'));
});

// GET activation
Route::get('activation/{token}', array('uses' => 'AuthenticateController@getActivate'));

// Login Group
Route::group(array('prefix' => 'login'), function() {

	// GET Login 
	Route::get('/', array('as' => 'login', 'uses' => 'AuthenticateController@getIndex'))->before('guest');
	
	// POST login
	Route::post('/', array('before' => 'csrf', 'uses' => 'AuthenticateController@postLogin'));
});

// Reset Group
Route::group(array('prefix' => 'reset'), function() {

	// GET reset password
	Route::get('/', array('as' => 'reset', 'uses' => 'AuthenticateController@getReset'));

	// POST reset password
	Route::post('/', array('before' => 'csrf', 'uses' => 'AuthenticateController@postReset'));
});


// Reset reset password
Route::group(array('prefix' => 'password/reset/{token}'), function() {

	// GET reset password form
	Route::get('/', function($token){
	    return View::make('authenticate.reset')
	            ->with('token', $token)
	            ->with('title', 'Password Reset');
	});

	//POST verify the new credintial 
	Route::post('/', function() {
	    $credentials = array(
	        'email' => Input::get('email'),
	        'password' => Input::get('password'),
	        'password_confirmation' => Input::get('password_confirmation')
	    );
	    return Password::reset($credentials, function($user, $password)
	    {
	        $user->password = Hash::make($password);
	        $user->active = 1;
	        $user->attempt = 0;
	        $user->save();
	        return Redirect::route('login')
	               ->with('message', 'Your password was upate successfully!');
	    });
	});
});

// Logout route
Route::get('logout', array('as' => 'logout', function () {
	$id = Auth::user()->id;
	// delete the dir before log out -----
	$dir = './tmp/' . $id;
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
	//-------------------------------------
	Auth::logout();
	return Redirect::route('login')
	->with('message', 'You are successfully logged out.');
}))->before('auth');
	


// home route
Route::get('/', array('as' => 'home', 'before' => 'auth', 'uses' => 'HomeController@index'));
	
// Notes routes
Route::group(array('prefix' => 'notes', 'before' => 'auth'), function() {

    // POST new note
    Route::post('create', array('before' => 'csrf', 'uses' => 'NoteController@postAdd'));
    
    // GET all notes
    Route::get('all', array('uses' => 'NoteController@getAll'));
    
    // GET update
    Route::get('update', array('as' => 'note.update', 'uses' => 'NoteController@getNote'));
    
    // POST update
    Route::post('update', array('before' => 'csrf', 'uses' => 'NoteController@postUpdate'));
    
    // GET delete note
    Route::get('delete', array('as' => 'note.delete', 'uses' => 'NoteController@deleteNote'));
    
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