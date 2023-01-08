@extends('backend.admin.master')
@section('content')
<h1 class="mt-4">Add Teacher</h1>

<form action="{{route('storeteacher')}}" method="POST">
    @csrf
	<div class="form-group">
		<label for=""> Name</label>
		<input type="text" name="name" class="form-control" id="" aria-describedby=""  >
	</div>
	<div class="form-group">
		<label for=""> Email</label>
		<input type="text" name="email" class="form-control" id="" aria-describedby=""  >
	</div>
	<div class="form-group">
		<label for=""> Password</label>
		<input type="pasword" name="password" class="form-control" id="" aria-describedby=""  >
	</div>


	<button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection