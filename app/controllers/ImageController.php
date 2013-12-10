<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ImageController
 *
 * @author pamaral
 */
class ImageController extends BaseController
{
    public function postUpload()
    {
        $user_id = Auth::user()->id;
        
        $validator = Image::validate(Input::all());
        
        if($validator->fails()){
            return Redirect::route('home')
                ->withErrors($validator)
                ->withInput();
        } else {
            $count = Image::where('user_id', $user_id)->count();
            if($count >= 4) {
                return Redirect::route('home')
                    ->with('message', 'Sorry, you have already uploaded the maximum number of images for your account.');
            }
            $image = new Image();
            $image->user_id = $user_id;
            $image->caption = Input::get('caption');
            $image->mime = Input::file('image')->getMimeType();
            $image->extension = Input::file('image')->getClientOriginalExtension();
            $image->contents = Input::file('image');
            $image->save();
            Input::file('image')->move('./tmp_' . $user_id, $image->id . '.' . $image->extension);
            
            return Redirect::route('home')
                    ->with('message', 'Image upload succesful.');
        }
    }
}
