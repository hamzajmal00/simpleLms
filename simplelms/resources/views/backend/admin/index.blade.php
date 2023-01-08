@extends('backend.admin.master')
@section('content')
<h1 class="mt-4">Admin Dashboard</h1>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
       All Users
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
                @foreach ($users as $user )
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->type}}</td>
                    <td>
                        <a href={{route('edituser',$user->id)}} class="btnbtn-success">edit</a>
                        <a href={{route('deleteuser',$user->id)}} class="btnbtn-success">delete</a>
                    </td>
       
                </tr>
                @endforeach
          
             
            </tbody>
        </table>
    </div>
</div>
@endsection