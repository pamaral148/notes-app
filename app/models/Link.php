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
        'url' => 'url|unique:links'
    );

    public function user() 
    {
        return $this->belongsTo('User');
    }
    
    public static function validate($data)
    {
    	$messages = array(
    			'url.unique' => 'You already have this link.',
        	);
    	 
        return Validator::make($data, self::$rules);
    }
}
