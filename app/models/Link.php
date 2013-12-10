<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Link
 *
 * @author pamaral
 */
class Link extends Eloquent 
{
    public static $rules = array(
        'url' => 'url'
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
