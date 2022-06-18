@extends('layouts.app')
@section('content')
<div class="container">
    <div style="text-align: center">
    <h4>Contact Form</h4>
    </div>
    <form action="{{route('query')}}" method="post" class="form-group">
        @csrf
        Name <br>
        <input type="text" name="name" value ="{{old('name')}}"  class="form-control">
        <span class="text-danger">
            @error('name'){{$message}}@enderror
        </span>
        <br>
        Email <br>
        <input type="text" name="mail"value ="{{old('mail')}}" class="form-control"> 
        <span class="text-danger">
        @error('mail'){{$message}}@enderror
    </span>
    <br>
        Query <br>
        <textarea name="info" value ="{{old('info')}}" class="form-control" id="" cols="30" rows="10"></textarea>
        <span class="text-danger">
            @error('info'){{$message}}@enderror
        </span>
        <br>
        <input type="submit" value="Submit" class="btn btn-primary">
    </form>
    
    </div>
@endsection