<div class='col-md-7' id= "notes-container">
    {{ Form::open(array('url' => 'notes/create', 'method' => 'post', 'role' => 'form', 'id' => 'noteForm')) }}
  
    <div class="form-group">    
        <label class="sr-only" for="text">Note Text</label>
        {{ Form::textarea('text', Input::old('text'), array('placeholder' => 'Note Text' , 'class' => 'form-control resizeVertical', 'id' => 'text' )) }}
    </div>
    <button id="addNote" type="button" class="btn btn-primary btn">Add </button>
    {{ Form::close() }}
</div>

