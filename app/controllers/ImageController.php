<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ImageController
 *
 * @author pamaral and RobertH
 */
class ImageController extends BaseController
{
    public function postUpload()
    {
        $user_id = Auth::user()->id;
       
        $validator = Image::validate(Input::all());
        
      
        if($validator->fails()){
            return $validator->messages()->toJson();
        } else {
            $count = Image::where('user_id', $user_id)->count();
            if($count >= 4) {
            	$data = array('error'=>"Sorry, you have already uploaded the maximum number of images for your account.!");
            	return json_encode($data);
             }
            $image = new Image();
            $image->user_id = $user_id;
           
            $image->extension = Input::file('image')->getClientOriginalExtension();
            $image->contents = file_get_contents(Input::file('image'));
            $image->mime = Input::file('image')->getMimeType();
           // $image->extension = Input::file('image')->getClientOriginalExtension();
            
           
            $image->save();
            
            $dir = './tmp/' . $user_id;
            file_put_contents($dir . "/" .$image->id . "." . $image->extension, $image->contents);
            HomeController::thumb($dir. "/" . $image->id . "." . $image->extension,$image->extension, $dir);
            
            
            $data = array('message'=>"Image uploaded successfully!");
    		return json_encode($data);
        }
    }
    	
        public function getAll(){
        
        $user_id = Auth::user()->id;
        $images = Image::where('user_id',$user_id)
        			->orderBy('updated_at','DESC')
        			->get();
        	
       	return View::make('home.includes.image_list')
        	->with('images', $images);
        
        }
    
 		public function getDelete(){
	 		$id = Input::get('id');
	    	$image = Image::find($id);
	    	$image->delete();
	    	
	    	$data = array('message'=>"Image successfully deleted!");
	    	return json_encode($data);
 		}   
}
    
    

