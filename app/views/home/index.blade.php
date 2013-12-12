@extends('layouts.default')
@section('content')
<div id="messages"></div>
<!-- Nav tabs -->
<ul class="nav nav-tabs">
  <li><a href="#notes" data-toggle="tab">Notes</a></li>
  <li><a href="#tbd" data-toggle="tab">TBD</a></li>
  <li><a href="#links" data-toggle="tab">Links</a></li>
  <li><a href="#images" data-toggle="tab">Images</a></li>
</ul>

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
      </div>                    
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="updateNote">Update</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
      </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal-->




<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane active" id="notes">
        <br>
        @include('home.includes.notes_post')
       <input type="text" name="search" id="search" class="form-control" placeholder="Search">
       <div id="notesTable" class='container pull-right'>
         	 @include('home.includes.notes_table')
       </div>
    </div>
    <div class="tab-pane" id="tbd">
        @include('home.includes.tbd_post')
        @include('home.includes.tbd_table')
    </div>
  <div class="tab-pane" id="links">
      @include('home.includes.links')
  </div>
  <div class="tab-pane" id="images">
      @include('home.includes.image_post')
      @include('home.includes.image_list')
  </div>
</div>
@stop
@section('addEndScript')


<script src="{{ URL::asset('assets/js/bootstrap-dialog.js') }}"></script>
<script src="{{ URL::asset('assets/js/ajax.js') }}"></script>
@stop
