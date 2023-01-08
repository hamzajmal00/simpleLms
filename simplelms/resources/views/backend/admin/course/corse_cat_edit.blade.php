@extends('backend.admin.master')
@section('content')
<h1 class="mt-4">Add Category</h1>

<form action="{{route('updatecoursecat',$courCat->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
	<div class="form-group">
		<label for="">Category Name</label>
		<input type="text" name="cat_name" class="form-control" id="" aria-describedby="" value="{{$courCat->name}}" >
	</div>
    <input type="hidden" name="old_img" value="{{$courCat->image}}">
	<div class="form-group">
		<label for="">Category Image</label>
		<input type="file" name="cat_img" class="form-control" id="" aria-describedby="" >
	</div>

	<button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection