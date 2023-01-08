@extends('backend.admin.master')
@section('content')
<h1 class="mt-4">Admin Dashboard</h1>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
       All teachers
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Action</th>
                 
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Action</th>
                
                </tr>
            </tfoot>
            <tbody>
                @foreach ($teachers as $teacher )
                <tr>
                    <td>{{$teacher->user->name}}</td>
                    <td>{{$teacher->user->email}}</td>
                    <td>{{$teacher->user->type}}</td>
                    <td>
                        <a href={{route('edituser',$teacher->id)}} class="btnbtn-success">edit</a>
                        <a href={{route('deleteuser',$teacher->id)}} class="btnbtn-success">delete</a>
                    </td>
       
                </tr>
                @endforeach
          
             
            </tbody>
        </table>
    </div>
</div>
@endsection