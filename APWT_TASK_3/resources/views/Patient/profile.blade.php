@extends('layouts.dash')
@section('content')
<div class="container">
    <div style="text-align:center;">

        <h3>Patient's Profile</h3>

        <br>

        <img src="{{ 'storage/dp/'.$patient->patient_dp }}" alt="" title="" height="270" width="220" class="rounded mx-auto d-block" ><br>


       <p class="h4"> Name : {{ $patient->patient_name }} </p>
       <p class="h4">Email : {{ $patient->patient_email}}</p>
       <p class="h4"> Gender : {{ $patient->patient_gender }}</p>
       <p class="h4"> Patient's Dob: {{ $patient->patient_dob}} </p> <br>

       <a href="{{ route('edit_profile') }}" class="btn btn-outline-info">Edit</a><br><br>



    </div>
</div>
@endsection
