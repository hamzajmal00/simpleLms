@extends('backend.admin.master')
@section('content')
<h1 class="mt-4">Add Course</h1>

<form action="{{route('storecourse')}}" method="POST" enctype="multipart/form-data">
    @csrf
	<div class="form-group">
		<label for="">Course Name</label>
		<input type="text" name="title" class="form-control" id="" aria-describedby=""  >
	</div>
	<div class="form-group">
		<label for="">Course description</label>
		<textarea type="textarea" name="description" class="form-control" id="" aria-describedby=""  ></textarea>
	</div>
	<div class="form-group">
		<label for="">Course price</label>
		<input type="textarea" name="price" class="form-control" id="" aria-describedby=""  >
	</div>
	<div class="form-group">
		<label for="">Course Image</label>
		<input type="file" name="course_img" class="form-control" id="" aria-describedby="" >
	</div>
	<div class="form-group">
		<label for="">Course thumb</label>
		<input type="file" name="course_thumb" class="form-control" id="" aria-describedby="" >
	</div>
    <div class="form-group">
		<label for="">Teacher </label>
        <select class="form-control" name="teacher_id" id="exampleFormControlSelect1">
            @foreach ($teachers as $teacher) 
            <option value="{{$teacher->id}}">{{$teacher->user->name}}</option>
            @endforeach
           
  
          </select>
	</div>
    <div class="form-group">
		<label for="">Category </label>
        <select class="form-control" name="cat_id" id="exampleFormControlSelect1">
            @foreach ($categories as $category) 
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
           
  
          </select>
	</div>

	<button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection