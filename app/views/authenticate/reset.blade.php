@extends('layouts.default')
@section('content')

<div class="container form-container">
    <h2>Password Reset</h2>
    <br>
    {{ Form::open(array('url' => 'password/reset/{token}', 'method' => 'POST', 'role'=> 'form')) }}
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="form-group">
        <label class="sr-only" for="email" >Email address</label>
        <input type="text" name="email" class="form-control" id="email" placeholder="Enter email" />
    </div>
    <div class="form-group">
        <label class="sr-only" for="password" >New Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Enter new password" />
    </div>
    <div class="form-group">
        <label class="sr-only" for="password_confirmation" >Conform New Password</label>
        <input type="password" name="password_confirmation" class="form-control" id="conform_password" placeholder="Confirm new password" />
    </div>    
    <button type="submit" class="btn btn-default">Reset Password</button>
    {{  Form::close() }}
</div>
@stop