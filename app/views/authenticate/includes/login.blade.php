{{ Form::open(array('url' => 'login', 'method' => 'POST', 'role'=> 'form')) }}
  <div class="form-group">
    <label class="sr-only" for="email">Email address</label>
    <input type="email" name="email" class="form-control" id="login_email" placeholder="Enter email" value = "{{@$_COOKIE['username']}}" />
  </div>
  <div class="form-group">
    <label class="sr-only" for="password">Password</label>
    <input type="password" name="password" class="form-control" id="login_password" placeholder="Password" />
  </div>
  <div class="checkbox">
    <label>
      @if (isset($_COOKIE['username']))
      <input name="remember" type="checkbox" checked="checked" /> Remember me
      @else
      <input name="remember" type="checkbox" /> Remember me
      @endif	
    </label>
  </div>
  <button type="submit" class="btn btn-default">Sign in</button>
{{ Form::close() }}


