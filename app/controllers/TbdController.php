<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NoteController
 *
 * @author pamaral
 */
class TbdController extends BaseController
{
    public function postAdd()
    {
        $validator = Tbd::validate(Input::all());
        
        if($validator->fails()){
            return $validator->messages()->toJson();
        } else {
            $tbd = new Tbd();
            $tbd->description = Input::get('tbd_text');
            $tbd->user_id = Auth::user()->id;
			$tbd->done = 0;
			$tbd->date = Input::get('tbd_date');
				
            $tbd->save();
            
            $data = array('message'=>"To be done successfully added!");
            return json_encode($data);
        }
    }
    
    public function getAll()
    {
    	$id = Auth::user()->id;
    	$status = Input::get('status');
    	
    	if ($status == 2)
    		$array= array(0,1);
    	else 
    		$array= array($status);
    	
    	if (trim(Input::get('search')) != ""){
    			// there is a search key
    			$search = "%" . Input::get('search') . "%";
    			$tbds = Tbd::where('user_id', $id)
    					->where('description',"LIKE", $search) 
						->whereIn('done', $array)
    					->orderBy('date', "DESC")
    					->get();
    	}
    	else 
    			$tbds = Tbd::where('user_id', $id)
    			->whereIn('done', $array)
    			->orderBy('date', "DESC")
    			->get();
    			
    	return View::make('home.includes.tbd_table')
    	->with('tbds', $tbds);
    }
    
    public function postStatus()
    {
    	$id = Input::get('id');
    	$tbd = Tbd::find($id);
    	$tbd->done = !$tbd->done;
    	$tbd->save();
    
    	return '';
    	
    }
    
    
    public function postUpdate()
    {
        $validator = Tbd::validate(Input::all());
        $id = Input::get('id');
        if($validator->fails()){
            return $validator->messages()->toJson();
        } else {
            
            $tbd = Tbd::find($id);
            $tbd->date = Input::get('tbd_date');
            $tbd->description = Input::get('tbd_text');
            $tbd->save();
            
            $data = array('message'=>"To be done successfully updated!");
        	return json_encode($data);
        }
    }
    
    public function deleteTbd()
    {
        $id = Input::get('id');
        $tbd = Tbd::find($id);
        $tbd->delete();
       	$data = array('message'=>"To be done successfully deleted!");
        return json_encode($data);
    }
}
