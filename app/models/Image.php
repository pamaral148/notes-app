<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Image
 *
 * @author pamaral
 */
class Image extends Eloquent
{
    public static $rules = array(
        'caption' => 'required|between:3,45',
        'image' => 'required|mimes:jpg,jpeg,gif'
    );
    
    public function user() 
    {
        return $this->belongsTo('User');
    }
    
    public static function validate($data)
    {
        return Validator::make($data, self::$rules);
    }
}
