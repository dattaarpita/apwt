@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{route('admin_login')}}" method="post" class="form-group">
    @csrf
  
  Username<br>
  <input type="text" name="uname" id="" class="form-control" value="<?php if(isset($_COOKIE['uname'])) {echo $_COOKIE['uname'];} ?>" placeholder="username"><span class="text-danger">
      @error('uname'){{$message}}@enderror
  </span><br>
  Password<br>
  <input type="password" name="pass" id="" class="form-control" value ="<?php if(isset($_COOKIE['pass'])) {echo $_COOKIE['pass'];} ?>"placeholder="password"><span class="text-danger">
      @error('pass'){{$message}}@enderror
  </span><br>
  <input type="checkbox" name="remember" id="" class="form-select"> Remember Me <br><br>
  <input type="submit" value="Login" class="btn btn-primary">
 

    </form>
    
</div>
@endsection