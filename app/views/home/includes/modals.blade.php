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
        <h4 id="modalTitle" class="modal-title" >Edit</h4>
      </div>
      <div class="modal-body">
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
        <h4 id="modalTitle" class="modal-title" >View</h4>
      </div>
      <div class="modal-body">
        
        	
      </div>                    
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
       
      </div>
      </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal-->

