<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tbd
 *
 * @author pamaral
 */
class Tbd extends Eloquent 
{
    public static $rules = array(
        'tbd_date' => 'required|date_format:Y-m-d',
        'tbd_text' => 'required|between:3,255'
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
