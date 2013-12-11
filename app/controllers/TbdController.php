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
    public function getTbd()
    {
        $id = Input::get('id');
        $tbd = Tbd::find($id);
        $title = 'Assignment 2 - Tbd';
        return View::make('tbd.index')
                ->with('title', $title)
                ->with('tbd', $tbd);
    }
    
    public function postAdd()
    {
        $validator = Tbd::validate(Input::all());
        
        if($validator->fails()){
            return Redirect::route('home')
                ->withErrors($validator)
                ->withInput();
        } else {
            $tbd = new Tbd();
            $tbd->title = Input::get('tbd_title');
            $tbd->description = Input::get('tbd_text');
            $tbd->user_id = Auth::user()->id;
            $tbd->save();
            
            return Redirect::route('home')
                ->with('message', 'Tbd \'' . $tbd->title . '\' successfully added.');
        }
    }
    
    public function postUpdate()
    {
        $validator = Tbd::validate(Input::all());
        $id = Input::get('id');
        if($validator->fails()){
            return Redirect::route('tbd.update', array('id' => $id))
                ->withErrors($validator)
                ->withInput();
        } else {
            
            $tbd = Tbd::find($id);
            $tbd->title = Input::get('tbd_title');
            $tbd->description = Input::get('tbd_text');
            $tbd->save();
            
            return Redirect::route('tbd.update', array('id' => $id))
                ->with('message', 'Tbd \'' . $tbd->title . '\' successfully updated.');
        }
    }
    
    public function deleteTbd()
    {
        $id = Input::get('id');
        $tbd = Tbd::find($id);
        $tbd->delete();
        return Redirect::route('home')
                ->with('message', 'Tbd \'' . $tbd->title . '\' successfully deleted.');
    }
}
