<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LinkController
 *
 * @author pamaral
 */
class LinkController extends BaseController 
{
    public function postLinks()
    {
        $validator = Link::validate(Input::all());
        
        if($validator->fails()){
            return Redirect::route('home')
                ->withErrors($validator)
                ->withInput();
        } else {
            $input = Input::except('_token');
            foreach($input as $key => $value) {
              if(($key == 'url') &&
                 ($value != NULL)
              ){
                    $user_id = Auth::user()->id;
                    $link = new Link();
                    $link->user_id = $user_id;
                    $link->url = $value;
                    $link->save();
              } 
              elseif($key != 'url') {
                  $link = Link::find($key);
                  $link->url = $value;
                  $link->save();
              }
              
            }
            return Redirect::route('home')
                  ->with('message', 'Link successfully added.');
        }
    }
}
