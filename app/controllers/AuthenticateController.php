<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AuthenticateController
 *
 * @author pamaral
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
        
        $user = array(
            'email' => Input::get('email'),
            'password' => Input::get('password'),
            'active' => 1
        );

        if (Input::get('remember')) {
            $remember = TRUE;
        } else {
            $remember = FALSE;
        }

        if (Auth::attempt($user, $remember)){
            return Redirect::route('home');
        } else {
            return Redirect::route('login')
                       ->withErrors('Sorry, your credentials are wrong or that is not an active account.')
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
        return Redirect::route('login')
                        ->with('message', $message);
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

}
