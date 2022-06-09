@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{route('dashboard')}}" method="post" class="form-group">
    @csrf
  
  Username<br>
  <input type="text" name="uname" id="" class="form-control"value ="{{old('uname')}}" placeholder="username"><span class="text-danger">
      @error('uname'){{$message}}@enderror
  </span><br>
  Password<br>
  <input type="password" name="pass" id="" class="form-control" value ="{{old('pass')}}"placeholder="password"><span class="text-danger">
      @error('pass'){{$message}}@enderror
  </span><br>
  <input type="submit" value="Login" class="btn btn-primary">
 

    </form>
    <div>
        <h5>Don’t have an account? <a href="{{route('registration')}}" class="btn btn-primary">Create Account </a></h5>
    </div>
</div>
@endsection