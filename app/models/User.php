<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
        public static $registrationRules = array(
            'email' => 'required|email|unique:users',
            'password' => 'required|alpha_dash|between:5,20'
        );
        
        public static $loginRules = array(
            'email' => 'required|email',
            'password' => 'required|alpha_dash|between:5,20'
        );
        
        public static function registrationValidate($data)
        {
            return Validator::make($data, self::$registrationRules);
        }
        
        public static function loginValidate($data)
        {
            return Validator::make($data, self::$loginRules);
        }
        
        public function notes()
        {
            return $this->hasMany('Note');
        }
        
        public function images()
        {
            return $this->hasMany('Note');
        }
        
        public function links()
        {
            return $this->hasMany('Link');
        }
        
        public function tbds()
        {
            return $this->hasMany('Tbd');
        }
        
        public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}
        
        public static function getLockedResponse($user)
        {
            if($user->active == 0) {
                $response = Redirect::route('login');
            } else {
                $credentials = array('email' => $user->email);
                $response = Password::remind($credentials, function($message, $user) {
                     $message->subject('Someone has tried to access your account. Your password has been reset.');
                });     
            }
            
            return $response;
        }
}