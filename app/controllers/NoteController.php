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
class NoteController extends BaseController
{
    public function getNote()
    {
        $id = Input::get('id');
        $data = Note::find($id)->toJson();
        return $data;
    }
    
    public function getAll()
    {
    	$id = Auth::user()->id;
    	if (trim(Input::get('search')) !=""){
    		$search = "%" . Input::get('search') . "%";
    		$notes = Note::where('user_id',$id)
    					->where('description',"LIKE",$search)
    					->orderBy('updated_at','DESC')
    					->get();
    	}	
    	else
    	$notes = Note::where('user_id',$id)
		    	->orderBy('updated_at','DESC')
		    	->get();
		    
    
    	return View::make('home.includes.notes_table')
    	->with('notes', $notes);
    }
    
    public function postAdd()
    {
        $validator = Note::validate(Input::all());
        
        if($validator->fails()){
            return $validation->messages()->toJson();
        } else {
            $note = new Note();
            $note->description = Input::get('text');
            $note->user_id = Auth::user()->id;
            $note->save();
            
            $data = array('message'=>"Note successfully added!");
            return json_encode($data);
        }
    }
    
    public function postUpdate()
    {
        $validator = Note::validate(Input::all());
        $id = Input::get('id');
        if($validator->fails()){
            return $validation->messages()->toJson();
        } else {
            
            $note = Note::find($id);
            $note->title = Input::get('title');
            $note->description = Input::get('text');
            $note->save();
            
           	$data = array('message'=>"Note successfully updated!");
            return json_encode($data);
        	
        }
    }
    
    public function deleteNote()
    {
        $id = Input::get('id');
        $note = Note::find($id);
        $note->delete();
        
        $data = array('message'=>"Note successfully deleted!");
        return json_encode($data);
    }
}
