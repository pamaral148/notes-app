@extends('layouts.default')
@section('content')
<div class='container form-container'>
    {{ Form::open(array('url' => 'notes/update', 'method' => 'post', 'role' => 'form')) }}
    <div class="form-group">    
        <label  for="title">Note Title</label>
        {{ Form::text('title', $note->title, array('class' => 'form-control', 'id' => 'title' )) }}
    </div>
    <div class="form-group">    
        <label for="text">Note Text</label>
        {{ Form::textarea('text', $note->description, array('class' => 'form-control', 'id' => 'text' )) }}
    </div>
    {{ Form::hidden('id', $note->id) }}
    {{ Form::submit('Save Changes') }}
    {{ Form::close() }}
</div>
@stop

