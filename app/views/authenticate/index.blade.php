@extends('layouts.default')
@section('content')
    @if(Request::is('register'))
        <div class="container form-container">
            <h2>{{ $heading }}</h2>
            <br>
            @include('authenticate.includes.register')
        </div>
    @else 
        <div class="container form-container">
            <h2>{{ $heading }}</h2>
            <br>
            @include('authenticate.includes.login')
            <p>Not a registered user? {{ link_to_route('register', 'Register now!') }}</p>
        </div>
   @endif
@stop

