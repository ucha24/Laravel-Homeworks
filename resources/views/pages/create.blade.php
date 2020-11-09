@extends('layouts.app')
@section('title','Create Car')
@section('content')
<h2>Create Car</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <form action="{{ route('cars.store') }}" method="post">
    @csrf
    <div class="form-group">
      <label for="name">name:</label>
      <input type="text" class="form-control" id="name" placeholder="name" name="name">
    </div>
    <div class="form-group">
      <label for="make">make:</label>
      <input type="text" class="form-control" id="make" placeholder="make" name="make">
    </div>
    <div class="form-group">
      <label for="model">model:</label>
      <input type="text" class="form-control" id="model" placeholder="model" name="model">
    </div>
    <div class="form-group">
      <label for="license_number">license_number:</label>
      <input type="text" class="form-control" id="license_number" placeholder="license_number" name="license_number">
    </div>
    <div class="form-group">
      <label for="registration_year">registration_year:</label>
      <input type="date" class="form-control" id="registration_year" placeholder="registration_year" name="registration_year">
    </div>
    <div class="form-group">
      <label for="weight">weight:</label>
      <input type="text" class="form-control" id="weight" placeholder="weight" name="weight">
    </div>
  
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
@endsection

