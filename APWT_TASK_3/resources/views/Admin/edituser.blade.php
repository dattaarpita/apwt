@extends('layouts.admin_dash')
@section('content')
<div class="container">
    <div style="text-align:center;">

        <h4>Edit User</h4>

    </div>
    <form action="{{route('upProfile')}}" method="post" class="form-group" >
        @csrf
        <input type="hidden" name="p_id" value="{{ $patient->patient_id}}">
       Name<br>
      <input type="text" name="nam" id="" class="form-control" value ="{{$patient->patient_name}}" placeholder="name"><span class="text-danger">
          @error('nam'){{$message}}@enderror
      </span><br>
       E-mail<br>
      <input type="text" name="mail" id="" class="form-control" value ="{{ $patient->patient_email}} "placeholder="email"><span class="text-danger">
          @error('mail'){{$message}}@enderror
      </span><br>
     
        Date of Birth <br>
        <input type="date" name="dob" id="" class="form-control" value ="{{ $patient->patient_dob}}"><span class="text-danger">
            @error('dob'){{$message}}@enderror
        </span><br>
       
    
      Username<br>
      <input type="text" name="uname" id="" class="form-control"value ="{{ $patient->patient_un}}" placeholder="username"><span class="text-danger">
          @error('uname'){{$message}}@enderror
      </span><br>
      Password<br>
      <input type="password" name="pass" id="" class="form-control" value ="{{ $patient->patient_pass}}"placeholder="password"><span class="text-danger">
          @error('pass'){{$message}}@enderror
      </span><br>
     
      <input type="submit" value="Edit" class="btn btn-primary">
    
     
    
        </form>
</div>
@endsection