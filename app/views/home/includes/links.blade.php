<div id="links-container">
    {{ Form::open(array('url' => 'links/post', 'method' => 'post', 'role' => 'form')) }}
        
            <div class="form-group col-md-5">    
                <label class="sr-only" for="new_link">Link</label>
                {{ Form::text('url', Input::old('url'), array('placeholder' => 'Add a URL', 'class' => 'form-control', 'id' => 'url' )) }}
            	
            </div>
            <div class="form-group col-md-2">
        		<button type="button" class="btn btn-primary" id="addLink">Add</button>
    		</div>
    {{ Form::close() }}

    
    
    @foreach($links as $link)
           
    @endforeach
</div>    

