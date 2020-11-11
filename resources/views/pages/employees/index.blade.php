@extends('layouts.app')
@section('title','Employees List')
@section('content')
<h2>employee List</h2>
<div class="text-right" style="margin-bottom:5px">
    <a href="/employees/create" class="btn btn-primary">Add employee</a>
</div>

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
<table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>name</th>
        <th>lastname</th>
        <th>birthdate</th>
        <th>personal_id</th>
        <th>salary</th>
        <th>created_at</th>
        <th>updated_at</th>
        <th>action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($employees as $employee)
        <tr>
            <td>{{$employee->id }}</td>
            <td>{{$employee->name }}</td>
            <td>{{$employee->lastname }}</td>
            <td>{{$employee->birthdate }}</td>
            <td>{{$employee->personal_id }}</td>
            <td>{{$employee->salary }}</td>
            <td>{{$employee->created_at }}</td>
            <td>{{$employee->updated_at}}</td>
            <td style="display: flex;">
                <a href="/employees/{{$employee->id}}/edit" class="btn btn-primary" style="margin-right: 3px">Edit</a>
                <form action="{{ route('employees.destroy',$employee->id) }}" method="post">
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

