@extends('backend.admin.master')
@section('content')
<h1 class="mt-4">Admin Dashboard</h1>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
       All Course 
       <a style="float: right;" href="{{route('addcourse')}}"  class="btn btn-primary">Add New</a>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>image</th>
                    <th>price</th>
                    <th>Action</th>
                 
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>image</th>
                    <th>price</th>
                    <th>Action</th>
                
                </tr>
            </tfoot>
            <tbody>
                @foreach ($courses as $course )
                <tr>
                    <td>{{$course->title}}</td>
                    <td><img  src="{{asset($course->thumbnail)}}"style="height: 50px; width:50px;" /></td>
                    <td>${{$course->price}}</td>
                    <td>
                        <a href={{route('editecourse',$course->id)}} class="btnbtn-success">edit</a>
                        <a href={{route('deletecourse',$course->id)}} class="btnbtn-success">delete</a>
                    </td>
       
                </tr>
                @endforeach
          
             
            </tbody>
        </table>
    </div>
</div>
@endsection