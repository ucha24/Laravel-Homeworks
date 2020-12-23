@extends('layouts.app')

@section('content')
<div class="text-right">
    <a class="btn btn-primary" href="/clients/create">Add New Client</a>
</div>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add Cities
</button>
<table class="table">
<thead>
    <tr>
        <th>id</th>
        <th>Name</th>
        <th>Age</th>
        <th>City</th>
        <th>Action</th>
    </tr>
</thead>
    <tbody>
        @foreach($clients as $client)
        <tr>
            <td>{{$client->id}}</td>
            <td>{{$client->name}}</td>
            <td>{{$client->age}}</td>
            <td>{{$client->city->name}}</td>
            <th>
            <a href="/clients/{{$client->id}}/edit">Edit</a>
                <form action="{{route('clients.destroy',$client->id)}}" method="POST">
                @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">DELETE</button>
                </form>
            </th>
        </tr>
        @endforeach
    </tbody>
</table>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="text" name="name" id="cityName">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary btn-submit">Add City</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('javascript')
<script type="text/javascript">
  
    $(".btn-submit").click(function(e){
  
        e.preventDefault();
   
        var name = $("#cityName").val();
   
        $.ajax({
           type:'POST',
           url:"{{ route('cities.store') }}",
           data:{name:name},
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
           success:function(data){
              alert(data[0]);
           }
        });
  
    });
</script>
@endsection