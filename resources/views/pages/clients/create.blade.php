@extends('layouts.app')


@section('content')
<form action="{{ route('clients.store') }}" method="POST">
    @csrf
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="form-group">
    <label for="name">Age:</label>
    <input type="text" class="form-control" id="name" name="age">
  </div>
  <div class="form-group">
    <label for="name">City:</label>
   <select name="city_id" id="">
    @foreach(\App\City::all() as $city)
    <option value="{{$city->id}}">{{$city->name}}</option>
    @endforeach
   </select>
  </div>

  <div class="checkbox">
    <label><input type="checkbox" name="status"> Public</label>
  </div>
  <button type="submit" class="btn btn-primary" >Submit</button>
</form>
@endsection