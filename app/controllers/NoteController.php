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
        $note = Note::find($id);
        return $note->title;
    }
    
    public function postAdd()
    {
        $validator = Note::validate(Input::all());
        
        if($validator->fails()){
            return Redirect::route('home')
                ->withErrors($validator)
                ->withInput();
        } else {
            $note = new Note();
            $note->title = Input::get('title');
            $note->description = Input::get('text');
            $note->user_id = Auth::user()->id;
            $note->save();
            
            return Redirect::route('home')
                ->with('message', 'Note \'' . $note->title . '\' successfully added.');
        }
    }
}
