{{ Form::open(array('url' => 'register', 'method' => 'POST', 'class' => "form-inline", 'role'=> 'form')) }}
  <div class="form-group">
    <label class="sr-only" for="email">Email address</label>
    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label class="sr-only" for="password">Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
  </div>
  <div class="checkbox">
     {{ $captcha }}
  </div>
  <button type="submit" class="btn btn-default">Register</button>
{{ Form::close() }}

