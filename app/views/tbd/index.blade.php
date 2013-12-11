@extends('layouts.default')
@section('content')
<div class='container form-container'>
    {{ Form::open(array('url' => 'tbd/update', 'method' => 'post', 'role' => 'form')) }}
    <div class="form-group">    
        <label  for="title">Tbd Title</label>
        {{ Form::text('tbd_title', $tbd->title, array('class' => 'form-control', 'id' => 'tbd_title' )) }}
    </div>
    <div class="form-group">    
        <label for="text">Note Text</label>
        {{ Form::textarea('tbd_text', $tbd->description, array('class' => 'form-control', 'id' => 'tbd_text' )) }}
    </div>
    {{ Form::hidden('id', $tbd->id) }}
    {{ Form::submit('Save Changes') }}
    {{ Form::close() }}
</div>
@stop

