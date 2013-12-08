{{ Form::open(array('url' => 'login', 'method' => 'POST', 'role'=> 'form')) }}
  <div class="form-group">
    <label class="sr-only" for="email">Email address</label>
    <input type="email" name="email" class="form-control" id="login_email" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label class="sr-only" for="password">Password</label>
    <input type="password" name="password" class="form-control" id="login_password" placeholder="Password">
  </div>
  <div class="checkbox">
    <label>
      <input name="remember" type="checkbox"> Remember me
    </label>
  </div>
  <button type="submit" class="btn btn-default">Sign in</button>
{{ Form::close() }}


