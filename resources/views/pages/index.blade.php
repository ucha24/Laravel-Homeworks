@extends('layouts.app')
@section('title','Cars List')
@section('content')
<h2>Car List</h2>
<div class="text-right" style="margin-bottom:5px">
    <a href="/cars/create" class="btn btn-primary">Add Car</a>
</div>

@if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('success') }}
    </div>
@endif
<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>name</th>
        <th>make</th>
        <th>model</th>
        <th>license_number</th>
        <th>registration_year</th>
        <th>Year</th>
        <th>weight</th>
        <th>created at</th>
        <th>updated at</th>
        <th>action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($cars as $car)
        @php
            $diff = abs(strtotime($car->registration_year) - strtotime(date('Y-m-d')));
            $years = floor($diff / (365*60*60*24));
        @endphp
        <tr>
            <td>{{ $car->id }}</td>
            <td>{{$car->name}}</td>
            <td>{{$car->make}}</td>
            <td>{{$car->model}}</td>
            <td>{{$car->license_number}}</td>
            <td>{{$car->registration_year}}</td>
            <td>{{ $years }}</td>
            <td>{{$car->weight}}</td>
            <td>{{$car->created_at}}</td>
            <td>{{$car->updated_at}}</td>
            <td style="display: flex;">
                <a href="/cars/{{$car->id}}/edit" class="btn btn-primary" style="margin-right: 3px">Edit</a>
                <form action="{{ route('cars.destroy',$car->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Remove</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection

