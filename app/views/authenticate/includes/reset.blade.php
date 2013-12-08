{{ Form::open(array('url' => 'reset', 'method' => 'POST', 'role'=> 'form')) }}
  <div class="form-group">
    <label class="sr-only" for="email">Email address</label>
    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
  </div>
  <button type="submit" class="btn btn-default">Reset Password</button>
{{ Form::close() }}

