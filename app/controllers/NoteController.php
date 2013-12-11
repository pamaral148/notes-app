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
        $title = 'Assignment 2 - Note';
        return View::make('notes.index')
                ->with('title', $title)
                ->with('note', $note);
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
    
    public function postUpdate()
    {
        $validator = Note::validate(Input::all());
        $id = Input::get('id');
        if($validator->fails()){
            return Redirect::route('note.update', array('id' => $id))
                ->withErrors($validator)
                ->withInput();
        } else {
            
            $note = Note::find($id);
            $note->title = Input::get('title');
            $note->description = Input::get('text');
            $note->save();
            
            return Redirect::route('note.update', array('id' => $id))
                ->with('message', 'Note \'' . $note->title . '\' successfully updated.');
        }
    }
    
    public function deleteNote()
    {
        $id = Input::get('id');
        $note = Note::find($id);
        $note->delete();
        return Redirect::route('home')
                ->with('message', 'Note \'' . $note->title . '\' successfully deleted.');
    }
}
