@extends('layouts.default')
@section('content')
    @if(isset($message))
        {{ $message }}
    @endif
    @if(Request::is('register'))
        <div class="container form-container">
            <h2>{{ $heading }}</h2>
            <br>
            @include('authenticate.includes.register')
        </div>
    @elseif(Request::is('reset'))
        <div class="container form-container">
            <h2>{{ $heading }}</h2>
            <br>
            @include('authenticate.includes.reset')
        </div>
    @else 
        <div class="container form-container">
            <h2>{{ $heading }}</h2>
            <br>
            @include('authenticate.includes.login')
            <br>
            <p>Not a registered user? {{ link_to_route('register', 'Register now!') }}</p>
            <p>Forgot your password? {{ link_to_route('reset', 'Reset it here!') }}</p>
        </div>
   @endif
@stop

