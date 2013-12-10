<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}
        
        public function index()
        {
            $title = 'Assignment 2 - Home';
            $user_id = Auth::user()->id;
            $notes = User::find($user_id)->notes;
            $links = User::find($user_id)->links;
            return View::make('home.index')
                        ->with('title', $title)
                        ->with('notes', $notes)
                        ->with('links', $links);
        }

}