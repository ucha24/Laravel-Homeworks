@extends('layouts.app')
@section('title','companys List')
@section('content')
<h2>company List</h2>
<div class="text-right" style="margin-bottom:5px">
    <a href="/companies/create" class="btn btn-primary">Add company</a>
</div>

@if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('success') }}
    </div>
@endif
<table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>name</th>
        <th>code</th>
        <th>address</th>
        <th>city</th>
        <th>country</th>
        <th>created_at</th>
        <th>updated_at</th>
        <th>action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($companies as $company)
   
        <tr>
            <td>{{ $company->id }}</td>
            <td>{{$company->name}}</td>
            <td>{{$company->code}}</td>
            <td>{{$company->address}}</td>
            <td>{{$company->city}}</td>
            <td>{{$company->country}}</td>
            <td>{{$company->created_at}}</td>
            <td>{{$company->updated_at}}</td>
            <td style="display: flex;">
                <a href="/companies/{{$company->id}}/edit" class="btn btn-primary" style="margin-right: 3px">Edit</a>
                <form action="{{ route('companies.destroy',$company->id) }}" method="post">
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

