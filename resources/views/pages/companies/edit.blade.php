@extends('layouts.app')
@section('title','Edit company')
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
<h2>Edit company</h2>
  <form action="{{ route('companies.update',$company->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="name">name:</label>
      <input type="text" class="form-control" id="name" value="{{ $company->name}}" name="name">
    </div>
    <div class="form-group">
      <label for="code">code:</label>
      <input type="text" class="form-control" id="code" value="{{ $company->code}}" name="code">
    </div>
    <div class="form-group">
      <label for="address">address:</label>
      <input type="text" class="form-control" id="address" value="{{ $company->address}}" name="address">
    </div>
    <div class="form-group">
      <label for="city">city:</label>
      <input type="text" class="form-control" id="city" value="{{ $company->city}}" name="city">
    </div>
    <div class="form-group">
      <label for="country">country:</label>
      <input type="text" class="form-control" id="country" value="{{ $company->country}}" name="country">
    </div>
  
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
@endsection