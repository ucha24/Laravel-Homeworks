@extends('layouts.app')
@section('title','Create employee')
@section('content')
<h2>Create employee</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <form action="{{ route('employees.store') }}" method="post">
    @csrf
    <div class="form-group">
      <label for="name">name:</label>
      <input type="text" class="form-control" id="name" placeholder="name" name="name">
    </div>
    <div class="form-group">
      <label for="lastname">lastname:</label>
      <input type="text" class="form-control" id="lastname" placeholder="lastname" name="lastname">
    </div>
    <div class="form-group">
      <label for="birthdate">birthdate:</label>
      <input type="date" class="form-control" id="birthdate" placeholder="birthdate" name="birthdate">
    </div>
    <div class="form-group">
      <label for="personal_id">personal_id:</label>
      <input type="number" class="form-control" id="personal_id" placeholder="personal_id" name="personal_id">
    </div>
    <div class="form-group">
      <label for="salary">salary:</label>
      <input type="number" step=".01" class="form-control" id="salary" placeholder="salary" name="salary">
    </div>
    
  
    <button type="submit" class="btn btn-default">Add</button>
  </form>
@endsection

