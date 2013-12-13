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
@include('home.includes.modals')
<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane active" id="notes">
        <br>
        @include('home.includes.notes_post')
       <input type="text" name="search" id="search" class="form-control" placeholder="Search">

       <div id="notesTable" class='col-md-5'>

         	 @include('home.includes.notes_table')
       </div>
    </div>
    <div class="tab-pane" data-status='2' id="tbd">
        @include('home.includes.tbd_post')
      <div id='tbdTable' class='col-md-12'>
        @include('home.includes.tbd_table')
      </div>
    </div>
  <div class="tab-pane" id="links">
    @include('home.includes.links_post')
    <div id ='linkTable'>
      @include('home.includes.links_list')
  	</div>
  </div>
  <div class="tab-pane" id="images">
      @include('home.includes.image_post')
      <div id ='imageTable'>
      	@include('home.includes.image_list')
  	  </div>	
  </div>
</div>
@stop
@section('addEndScript')


<script src="{{ URL::asset('assets/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ URL::asset('assets/js/ajax.js') }}"></script>
@stop
