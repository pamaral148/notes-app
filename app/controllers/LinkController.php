<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LinkController
 *
 * @author pamaral and RobertH
 */
class LinkController extends BaseController 
{
    public function postLinks()
    {
        $validator = Link::validate(Input::all());
        
        if($validator->fails()){
            return $validator->messages()->toJson();
        } else {
            $input = Input::get('url');
            $user_id = Auth::user()->id;
			$link = new Link();
			$link->url = $input;
			$link->user_id = $user_id;
			$link->save();	
           
         	$data = array('message'=>"Link successfully added!");
            return json_encode($data);
        }
    }
    
    public function getAll()
    {
    	$user_id = Auth::user()->id;
    	if (trim(Input::get('search')) !=""){
    		$search = "%" . Input::get('search') . "%";
    		$links = Link::where('user_id', $user_id)
    			 	->where('url','LIKE',$search)
    			 	->orderBy('updated_at', 'DESC')
    			 	->get();
    	}
    	else
    	 	$links = Link::where('user_id', $user_id)
    			 	->orderBy('updated_at', 'DESC')
    			 	->get();

    	return View::make('home.includes.links_list')
    	 	   ->with('links', $links);
    
    }
    
    public function postDelete()
    {
    	$id = Input::get('id');
    	$link = Link::find($id);
    	$link->delete();
    	
    	$data = array('message'=>"Link successfully deleted!");
    	return json_encode($data);
    
    }
    
    public function postUpdate()
    {
    	$id = Input::get('id');
    	
    	$validator = Link::validate(Input::all());
    	if($validator->fails()){
    		return $validator->messages()->toJson();
    	} else {
    		$input = Input::get('url');
    		$link = Link::find($id);
    		$link->url = $input;
    		$link->save();
    		 
    		$data = array('message'=>"Link successfully updated!");
    		return json_encode($data);
    	}
    }
}
