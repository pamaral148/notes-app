
<br />
    {{ Form::open(array('url' => 'links/post', 'method' => 'post','role' => 'form', 'id' => "linkForm")) }}
        
            <div class="form-group col-md-7">    
                <label class="sr-only" for="new_link">Link</label>
                {{ Form::text('url', Input::old('url'), array('placeholder' => 'Add URL like http://example.com', 'class' => 'form-control', 'id' => 'url' )) }}
            	
            </div>
            <div class="form-group col-md-2">
        		<button type="button" class="btn btn-primary" id="addLink">Add</button>
    		</div>
    		<div class="form-group col-md-3">  
   		 		<label class="sr-only" for="text">Search</label>  
    			<input type="text" name="searchLink" id="searchLink" class="form-control" placeholder="Search">    
    		</div>
    {{ Form::close() }}
       
  
