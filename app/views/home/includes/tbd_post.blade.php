<div class='form-container pull-left' id=notes-container'>
    {{ Form::open(array('url' => 'tbd/create', 'method' => 'post', 'role' => 'form')) }}
    <div class="form-group">    
        <label class="sr-only" for="title">TBD Title</label>
        {{ Form::text('tbd_title', Input::old('tbd_title'), array('placeholder' => 'TBD Title' , 'class' => 'form-control', 'id' => 'tbd_title' )) }}
    </div>
    <div class="form-group">    
        <label class="sr-only" for="text">Note Text</label>
        {{ Form::textarea('tbd_text', Input::old('tbd_text'), array('placeholder' => 'TBD Text' , 'class' => 'form-control', 'id' => 'tbd_text' )) }}
    </div>
    {{ Form::submit('Add Tbd') }}
    {{ Form::close() }}
</div>

