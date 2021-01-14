@extends('layouts.app')


@section('content')
<form id="addClients" action="{{ route('clients.store') }}" method="POST" >
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
  <button type="submit" class="btn btn-primary btn-submit" >Submit</button>
</form>
@endsection

@section('javascript')
<script>
$(".btn-submit").click(function(e){
  
  e.preventDefault();

  var form = $("#addClients").serialize(); //es arasworia?

  $.ajax({
     type:'POST',
     url:$('#addClients').attr('action'),
     data:form,
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
     success:function(data){
        if(data.status == false){
          alert("error")
        }else{
          alert("success")
        }
     },
     error:function(error){
       console.log(error.data)
     }
  });

});
</script>
@endsection