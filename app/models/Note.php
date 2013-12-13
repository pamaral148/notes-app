<?php


class Note extends Eloquent 
{
    public static $rules = array(
        'text' => 'required|between:3,255'
    );
    
    public function user() 
    {
        return $this->belongsTo('User');
    }
    
    public static function validate($data)
    {
        return Validator::make($data, self::$rules);
    }
    public static function snippet($string)
    {
    	if (strlen($string) <= 100)
    		return $string;
    	else {
    		return substr($string,0,100);
    	}
    }
}
