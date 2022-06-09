@extends('layouts.app')
@section('content')

<div class="container">
    <div style="text-align: center">
 <h4>Patient Registration Form</h4>
 <small>Please fill up the form correctly</small>
    </div>
    <form action="{{route('submitteddata')}}" method="post" class="form-group">
    @csrf
  Your Name<br>
  <input type="text" name="name" id="" class="form-control" value ="{{old('name')}}"placeholder="name"><span class="text-danger">
      @error('name'){{$message}}@enderror
  </span><br>
  Your E-mail<br>
  <input type="text" name="mail" id="" class="form-control" value ="{{old('mail')}} "placeholder="email"><span class="text-danger">
      @error('mail'){{$message}}@enderror
  </span><br>
  Gender <br>
  <select class="form-control" name="gender" value ="{{old('gender')}}">
    <option></option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
    <option value="other">Others</option>
     </select>
     <span class="text-danger">
        @error('gender'){{$message}}@enderror
    </span><br>
    Date of Birth <br>
    <input type="date" name="dob" id="" class="form-control" value ="{{old('dob')}}"><span class="text-danger">
        @error('dob'){{$message}}@enderror
    </span><br>


  Your username<br>
  <input type="text" name="uname" id="" class="form-control"value ="{{old('uname')}}" placeholder="username"><span class="text-danger">
      @error('uname'){{$message}}@enderror
  </span><br>
  Your Password<br>
  <input type="password" name="pass" id="" class="form-control" value ="{{old('pass')}}"placeholder="password"><span class="text-danger">
      @error('pass'){{$message}}@enderror
  </span><br>
  <input type="submit" value="Registration" class="btn btn-primary">


    </form>
</div>
@endsection