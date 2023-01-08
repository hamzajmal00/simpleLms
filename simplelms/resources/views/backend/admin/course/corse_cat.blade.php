@extends('backend.admin.master')
@section('content')
<h1 class="mt-4">Admin Dashboard</h1>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
       All Course Categories
       <a style="float: right;" href="{{route('addcoursecat')}}"  class="btn btn-primary">Add New</a>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>image</th>
                    <th>status</th>
                    <th>Action</th>
                 
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>image</th>
                    <th>status</th>
                    <th>Action</th>
                
                </tr>
            </tfoot>
            <tbody>
                @foreach ($courseCats as $course_cat )
                <tr>
                    <td>{{$course_cat->name}}</td>
                    <td><img  src="{{asset($course_cat->image)}}"style="height: 50px; width:50px;" /></td>
                    <td>{{$course_cat->status}}</td>
                    <td>
                        <a href={{route('editecoursecat',$course_cat->id)}} class="btnbtn-success">edit</a>
                        <a href={{route('deletecoursecat',$course_cat->id)}} class="btnbtn-success">delete</a>
                    </td>
       
                </tr>
                @endforeach
          
             
            </tbody>
        </table>
    </div>
</div>
@endsection