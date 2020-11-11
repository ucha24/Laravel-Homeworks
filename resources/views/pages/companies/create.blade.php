@extends('layouts.app')
@section('title','Create company')
@section('content')
<h2>Create company</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <form action="{{ route('companies.store') }}" method="post">
    @csrf
    <div class="form-group">
      <label for="name">name:</label>
      <input type="text" class="form-control" id="name" placeholder="name" name="name">
    </div>
    <div class="form-group">
      <label for="code">code:</label>
      <input type="text" class="form-control" id="code" placeholder="code" name="code">
    </div>
    <div class="form-group">
      <label for="address">address:</label>
      <input type="text" class="form-control" id="address" placeholder="address" name="address">
    </div>
    <div class="form-group">
      <label for="city">city:</label>
      <input type="text" class="form-control" id="city" placeholder="city" name="city">
    </div>
    <div class="form-group">
      <label for="country">country:</label>
      <input type="text" class="form-control" id="country" placeholder="country" name="country">
    </div>
  
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
@endsection

