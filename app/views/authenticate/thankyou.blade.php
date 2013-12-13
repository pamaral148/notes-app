@extends('layouts.default')
@section('content')

<p class = "lead">Thank you for registering.</p>
<p>An email has been sent to <strong>{{ $email }}</strong>. To complete your registration, click on the link in the email.</p>
<p>Once you complete your registration, you can {{ link_to_route('login', 'sign in') }} to our application.</p>
<p>Note: please check the spam folder for activation email.</p>
@stop
