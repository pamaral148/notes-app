<!-- Confirm Modal -->
<div class="modal fade" id="confirm" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" >Confirm</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this?</p>
      </div>                    
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="confirmOk">Ok</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
      </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal-->


<!-- Edit Modal -->
<div class="modal fade" id="editModal" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" >Edit note</h4>
      </div>
      <div class="modal-body">
      	<div class="mod-err" ></div>
        	{{ Form::open(array('method' => 'post', 'role' => 'form', 'id' => 'formUpdate')) }}
        		<textarea name = 'text' class = 'form-control resizeVertical' rows = '7'></textarea>
        	{{ Form::close() }}
        	<div id="viewNote"></div>
      </div>                    
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="updateNote">Update</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
      </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal-->

<!-- View Modal -->
<div class="modal fade" id="viewModal" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4  class="modal-title" >View note</h4>
      </div>
      <div class="modal-body">
        <div id="viewNote"></div>
      </div>                    
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
       
      </div>
      </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal-->


<!-- Edit Modal for tbd ----------------------------------------------------------		-->
<div class="modal fade" id="editTbdModal" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4  class="modal-title" >Edit</h4>
      </div>
      <div class="modal-body">
      	<div class="mod-err" ></div>
        	{{ Form::open(array('method' => 'post', 'role' => 'form', 'id' => 'formTbdUpdate')) }}
			   	<div class="form-group col-md-4">    
			        <label class="sr-only" for="date">Date</label>
			        {{ Form::text('tbd_date', Input::old('tbd_date'), array('placeholder' => 'YYYY-MM-DD' , 'class' => 'form-control datePicker', 'id' => 'tbd_date' )) }}
			    </div>
			    <div class="form-group col-md-8">   
			        <label class="sr-only" for="text">Note Text</label>
			        {{ Form::text('tbd_text', Input::old('tbd_text'), array('placeholder' => 'To be done' , 'class' => 'form-control', 'id' => 'tbd_text' )) }}
			    </div>	
        	{{ Form::close() }}
        	<br />
        	
      </div>                    
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="updateTbd">Update</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
      </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal-->



<!-- Edit Modal for links ----------------------------------------------------------		-->
<div class="modal fade" id="editLinkModal" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4  class="modal-title" >Edit</h4>
      </div>
      <div class="modal-body">
      	<div class="mod-err" ></div>
        	{{ Form::open(array('method' => 'post', 'role' => 'form', 'id' => 'formLinkUpdate')) }}
			   	<div class="form-group col-md-10">    
			        <label class="sr-only" for="date">Date</label>
			        {{ Form::text('url', Input::old('tbd_date'), array('placeholder' => 'http://example.com' , 'class' => 'form-control', 'id' => 'url' )) }}
			    </div>
        	{{ Form::close() }}
        <br />	
      </div>                    
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="updateLink">Update</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
      </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal-->



<!-- View Modal -->
<div class="modal fade" id="imgModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body text-center">
        <img src='' id="imgmod" alt='' />
      </div>                    
      
      </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal-->


