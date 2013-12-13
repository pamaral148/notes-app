<br />
<div>
    {{ Form::open(array('method' => 'post', 'role' => 'form', 'id' => 'imageForm' ,'files' => true)) }}
	    
	    <div class="form-group col-md-4">    
     	   	<label class="sr-only" for="text">Image File</label>
         	<input class="btn btn-default" type="file" id="image" name="image">
	   	</div>
    
    	<div class="form-group col-md-1">    
    		<button id="addimage" type="button" class="btn btn-primary btn">Add</button>    
    	</div>
    {{ Form::close() }}
</div>

