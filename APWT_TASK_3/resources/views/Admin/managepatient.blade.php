@extends('layouts.admin_dash')
@section('content')
<div class="container">
    <div style="text-align:center;">

        <h4>Manage Users</h4>


    </div>
    <table class="table table-bordered">
        <tr class="table-primary">
        <th class="table-primary">Patient ID</th>
        <th class="table-primary">Patient Name</th>
        <th class="table-primary">Patient Email</th>
        <th class="table-primary"></th>
        <th class="table-primary"></th>
        <th class="table-primary"></th>
    </tr>
    @foreach($patients as $patient)
    <tr class="table-info">
    <td >{{ $patient->patient_id }}</td>
    <td >{{ $patient->patient_name }}</td>
    <td >{{ $patient->patient_email }}</td>
    <td ><a href="/c-{{ $patient->patient_id }}" class="btn btn-info">View</a></td>
    <td ><a href="/cE-{{ $patient->patient_id }}" class="btn btn-secondary">Edit</a></td>
    <td ><a href="/cD-{{ $patient->patient_id }} " class="btn btn-danger">Delete</a></td>
    </tr>
    @endforeach
    </table>

</div>
@endsection