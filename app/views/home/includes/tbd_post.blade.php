<div  id=notes-container'>
<br />
    {{ Form::open(array('url' => 'tbd/create', 'method' => 'post', 'id' => 'tbdForm', 'role' => 'form')) }}
    <div class="form-group col-md-2">    
        <label class="sr-only" for="date">Date</label>
        {{ Form::text('tbd_date', Input::old('tbd_date'), array('placeholder' => 'YYYY-MM-DD' , 'class' => 'form-control datePicker', 'id' => 'tbd_date' )) }}
    </div>
    <div class="form-group col-md-4">   
        <label class="sr-only" for="text">Note Text</label>
        {{ Form::text('tbd_text', Input::old('tbd_text'), array('placeholder' => 'To be done' , 'class' => 'form-control', 'id' => 'tbd_text' )) }}
    </div>	
    
    
    <div class="form-group col-md-1">    
    	<button id="addtbd" type="button" class="btn btn-primary btn">Add</button>    
    </div>
     
     <div class="btn-group col-md-3 data-toggle="buttons-radio">
	  <button type="button" id='2' class="btn btn-primary active">All</button>
	  <button type="button" id='0' class="btn btn-primary">To do's</button>
	  <button type="button" id='1' class="btn btn-primary">Done</button>
	</div>
    
    <div class="form-group col-md-2">  
   		 <label class="sr-only" for="text">Search</label>  
    	<input type="text" name="searchtbd" id="searchtbd" class="form-control" placeholder="Search">    
    </div>
	
    {{ Form::close() }}
</div>

