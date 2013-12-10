<div class='form-container pull-left' id=images-container'>
    {{ Form::open(array('url' => 'images/upload', 'method' => 'post', 'role' => 'form', 'files' => true)) }}
    <div class="form-group">    
        <label class="sr-only" for="title">Image Caption</label>
        {{ Form::text('caption', Input::old('caption'), array('placeholder' => 'Image Caption' , 'class' => 'form-control', 'id' => 'caption' )) }}
    </div>
    <div class="form-group">    
        <label class="sr-only" for="text">Image File</label>
        {{ Form::file('image', array('class' => 'form-control', 'id' => 'text' )) }}
    </div>
    {{ Form::submit('Add Image') }}
    {{ Form::close() }}
</div>

