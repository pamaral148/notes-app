@extends('layouts.default')
@section('content')
<!-- Nav tabs -->
<ul class="nav nav-tabs">
  <li><a href="#notes" data-toggle="tab">Notes</a></li>
  <li><a href="#tbd" data-toggle="tab">TBD</a></li>
  <li><a href="#links" data-toggle="tab">Links</a></li>
  <li><a href="#images" data-toggle="tab">Images</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane active" id="notes">
        <br>
        @include('home.includes.notes_post')
        @include('home.includes.notes_table')
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

