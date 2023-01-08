@extends('backend.admin.master')
@section('content')
<h1 class="mt-4">Edit Course</h1>

<form action="{{route('updatecourse',$course->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
	<div class="form-group">
		<label for="">Course Name</label>
		<input type="text" name="title" class="form-control" id="" aria-describedby="" value="{{$course->title}}"  >
	</div>
	<div class="form-group">
		<label for="">Course description</label>
		<textarea  name="description" class="form-control" id="" aria-describedby="" >{{$course->description}}</textarea>
	</div>
	<div class="form-group">
		<label for="">Course price</label>
		<input type="text" name="price" class="form-control" id="" aria-describedby="" value="{{$course->price}}" >
	</div>
    <input type="hidden" name="c_image" value="{{$course->image}}">
    <input type="hidden" name="c_thumb" value="{{$course->thumbnail}}">
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
            <option value="{{$teach->id}}"  selected>{{$teach->user->name}}</option>
           
            @foreach ($teachers as $teacher) 
            <option value="{{$teacher->id}}">{{$teacher->user->name}}</option>
            @endforeach
           
  
          </select>
	</div>
    <div class="form-group">
		<label for="">Category </label>
        <select class="form-control" name="cat_id" id="exampleFormControlSelect1">
            <option value="{{$cate->id}}"  selected>{{$cate->name}}</option>
            
            @foreach ($categories as $category) 
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
           
  
          </select>
	</div>

	<button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection