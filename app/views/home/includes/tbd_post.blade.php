<div class='col-md-10' id=notes-container'>
    {{ Form::open(array('url' => 'tbd/create', 'method' => 'post', 'role' => 'form')) }}
    <div class="form-group">    
        <label class="sr-only" for="date">Date</label>
        {{ Form::text('tbd_date', Input::old('tbd_date'), array('placeholder' => 'YYYY-MM-DD' , 'class' => 'form-control', 'id' => 'tbd_date' )) }}
        <label class="sr-only" for="text">Note Text</label>
        {{ Form::textarea('tbd_text', Input::old('tbd_text'), array('placeholder' => 'TBD Text' , 'class' => 'form-control', 'id' => 'tbd_text' )) }}
    	<button id="addtbd" type="button" class="btn btn-primary btn">Add</button>    
    
    </div>
    <div class="form-group">    
    </div>
    
    {{ Form::close() }}
</div>

