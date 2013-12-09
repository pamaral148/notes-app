<?php


class Note extends Eloquent 
{
    public static $rules = array(
        'title' => 'required|between:3,45',
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
}
