@extends('backend.admin.master')
@section('content')
<h1 class="mt-4">Edit User</h1>

<form action="{{route('updateuser',$user->id)}}" method="POST">
    @csrf
	<div class="form-group">
		<label for="">Name</label>
		<input type="text" name="name" class="form-control" id="" aria-describedby="" value="{{$user->name}}" >
	</div>
	<div class="form-group">
		<label for="">Email</label>
		<input type="email" name="email" class="form-control" id="" aria-describedby="" value="{{$user->email}}">
	</div>
    {{-- <div class="form-group">
		<label for="">User Type</label>
        <select class="form-control" name="type" id="exampleFormControlSelect1">
            <option value="{{$user->type}}" selected>{{$user->type}}</option>
            <option value="admin">Admin</option>
            <option value="user">User</option>
            <option value="teacher">teacher</option>
            <option value="learner">learner</option>
  
          </select>
	</div> --}}
	<button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection