<div class='form-container pull-left' id=notes-container'>
    {{ Form::open(array('url' => 'notes/create', 'method' => 'post', 'role' => 'form')) }}
    <div class="form-group">    
        <label class="sr-only" for="title">Note Title</label>
        {{ Form::text('title', Input::old('title'), array('placeholder' => 'Note Title' , 'class' => 'form-control', 'id' => 'title' )) }}
    </div>
    <div class="form-group">    
        <label class="sr-only" for="text">Note Text</label>
        {{ Form::textarea('text', Input::old('text'), array('placeholder' => 'Note Text' , 'class' => 'form-control', 'id' => 'text' )) }}
    </div>
    {{ Form::submit('Add Note') }}
    {{ Form::close() }}
</div>

