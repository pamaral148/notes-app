<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AuthenticateController
 *
 * @author pamaral and RobertH
 */
class AuthenticateController extends BaseController {

    public function getIndex() {
        $title = 'Assigment 2 - Login';
        $heading = 'Login';
        
        return View::make('authenticate.index')
                        ->with('title', $title)
                        ->with('heading', $heading);
    }

    public function postLogin() {
        
        $credentials = array(
            'email' => Input::get('email'),
            'password' => Input::get('password'),
            'active' => 1
        );
        // remember and populate the username
        setcookie('username', $credentials['email'], time()+3600*24*30);
        if (Input::get('remember')) {
            $remember = TRUE;
        } else {
            $remember = FALSE;
            setcookie('username', $credentials['email'], time()-3600);
        }
		// user have credetial ok 
        if (Auth::attempt($credentials, $remember)){
            $user = User::find(Auth::user()->id);
            $user->attempt = 0;
            $user->save(); 
                 
        	return Redirect::route('home')
        	->with('message','You are succesfuly log in!');
                    
        } else {
        	
        	$email = Input::get('email');
        	$user = User::where('email', $email)->take(1)->first();
         // email is ok but password or activation aren't    
            if (isset($user->id)){
            	if ($user->active != 1)	
            		// user is not activated
            		return Redirect::route('login')
					->withErrors('Your accoount ' . $email ." is not active or it's locked! Please check your email and spam folder too!" );
				else{		
            			// save attemp for each user 
		            	$val = $user->attempt;
		    	        if($val < 2) {
		        	        $val++;
		            	} else {
			                // this is the third attemp 
			                $user->active = 0;
			                $str = '!dffhjgh@bnm6767584fgfhrre_hjhkytjygyj';
			                $user->password = Hash::make(str_shuffle($str));
			                $user->save();

			                $credentials = array('email' => $user->email);
			                $response = Password::remind($credentials, function($message, $user) {
			                	$message->subject('Someone has tried to access your account. Your password has been reset.');
			                });
			                
			                return $response;
		            	}	
						// save the attempt 
		            	$user->attempt = $val;
		            	$user->save();
            		}
            } 
          	// redirect to login 
          	return Redirect::route('login')
           	->withErrors('Username or password incorrect!')
           	->withInput();
        } 	 
    }

    public function getRegister() {
        $captcha = new Captcha\Captcha();
        $captcha->setPublicKey('6LfTbOsSAAAAAGLbwdfKl-ZnvyXenoMEhgV0fxbp');
        $captcha->setPrivateKey('6LfTbOsSAAAAAEQ141JvRMt5mBm4sYsy28DW9h11');
        $captcha_html = $captcha->html();
        $recaptcha = serialize($captcha);
        Session::put('captcha', $recaptcha);
        $title = 'Assignment 2 - Register';
        $heading = 'Register';

        return View::make('authenticate.index')
                        ->with('title', $title)
                        ->with('captcha', $captcha_html)
                        ->with('heading', $heading);
    }

    public function postRegister() {
        $captcha = Session::get('captcha');
        $recaptcha = unserialize($captcha);
        $response = $recaptcha->check();
        if (!$response->isValid()) {
            return Redirect::route('register')
                            ->withErrors($response->getError());
        }
        $validator = User::registrationValidate(Input::all());

        if ($validator->fails()) {
            return Redirect::to('register')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $user = new User();
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->active = Input::get('_token');
            $user->save();

            $data = array('link' => url('activation/' . $user->active));
            Mail::send('emails.auth.activate', $data, function($message) use ($user) {
                $message->to($user->email)->subject('Your account activation!');
            });
        }
        $message = 'Your account was created and is waiting activation. Please check you email for activation instructions.';
        return View::make('authenticate.thankyou')
                        ->with('email', $user->email);
    }

    public function getActivate($token) {
        if ($user = User::where('active', '=', $token)->update(array('active' => '1'))) {
            $message = 'Account has been successfully activated.';
        } else {
            $message = 'Account activation failed.';
        }
        return Redirect::route('login')
                        ->with('message', $message);
    }
    
    public function getReset()
    {
        $title = 'Assigment 2 - Reset Password';
        $heading = 'Reset Password';
        return View::make('authenticate.index')
                        ->with('title', $title)
                        ->with('heading', $heading);
    }
    
    public function postReset()
    {
        $credentials = array('email' => Input::get('email'));
        return Password::remind($credentials, function($message, $user) {
            $message->subject('Your password reminder');
        });
    }

}
