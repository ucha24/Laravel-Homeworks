@extends('layouts.app')
@section('title','Edit Car')
@section('content')
<h2>Edit Car</h2>
  <form action="{{ route('cars.update',$car->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="name">name:</label>
      <input type="text" class="form-control" id="name" value="{{ $car->name }}" name="name">
    </div>
    <div class="form-group">
      <label for="make">make:</label>
      <input type="text" class="form-control" id="make" value="{{ $car->make}}" name="make">
    </div>
    <div class="form-group">
      <label for="model">model:</label>
      <input type="text" class="form-control" id="model" value="{{ $car->model}}" name="model">
    </div>
    <div class="form-group">
      <label for="license_number">license_number:</label>
      <input type="text" class="form-control" id="license_number" value="{{ $car->license_number}}" name="license_number">
    </div>
    <div class="form-group">
      <label for="registration_year">registration_year:</label>
      <input type="date" class="form-control" id="registration_year" value="{{ $car->registration_year}}" name="registration_year">
    </div>
    <div class="form-group">
      <label for="weight">weight:</label>
      <input type="text" class="form-control" id="weight" value="{{ $car->weight}}" name="weight">
    </div>
  
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
@endsection