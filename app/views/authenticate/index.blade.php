@extends('layouts.default')
@section('content')
    <h2>{{ $heading }}</h2>
    <br>
    @if(Request::is('register'))
        @include('authenticate.includes.register')
    @else 
        @include('authenticate.includes.login')
        <p>Not a registered user? {{ link_to_route('register', 'Register now!') }}</p>
   @endif
@stop

