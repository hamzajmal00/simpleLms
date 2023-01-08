@extends('backend.admin.master')
@section('content')
<h1 class="mt-4">Add Category</h1>

<form action="{{route('storecoursecat')}}" method="POST" enctype="multipart/form-data">
    @csrf
	<div class="form-group">
		<label for="">Category Name</label>
		<input type="text" name="cat_name" class="form-control" id="" aria-describedby=""  >
	</div>
	<div class="form-group">
		<label for="">Category Image</label>
		<input type="file" name="cat_img" class="form-control" id="" aria-describedby="" >
	</div>

	<button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection