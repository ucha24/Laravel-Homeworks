@extends('layouts.app')
@section('title','Edit employee')
@section('content')

@if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('success') }}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h2>Edit employee</h2>
  <form action="{{ route('employees.update',$employee->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="name">name:</label>
      <input type="text" class="form-control" id="name" value="{{ $employee->name}}" name="name">
    </div>
    <div class="form-group">
      <label for="lastname">lastname:</label>
      <input type="text" class="form-control" id="lastname" value="{{ $employee->lastname}}" name="lastname">
    </div>
    <div class="form-group">
      <label for="birthdate">birthdate:</label>
      <input type="date" class="form-control" id="birthdate" value="{{ $employee->birthdate}}" name="birthdate">
    </div>
    <div class="form-group">
      <label for="personal_id">personal_id:</label>
      <input type="number" class="form-control" id="personal_id" value="{{ $employee->personal_id}}" name="personal_id">
    </div>
    <div class="form-group">
      <label for="salary">salary:</label>
      <input type="number" step=".01" class="form-control" id="salary" value="{{ $employee->salary}}" name="salary">
    </div>
 
  
    <button type="submit" class="btn btn-default">Update</button>
  </form>
@endsection