@extends('backend.admin.master')
@section('content')
    <h1 class="mt-4">Teacher Dashboard</h1>
    <div class="row">

        @forelse ($courses as $cours)
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card" style="width:400px">
                    <img class="card-img-top" src="{{ asset($cours->thumbnail) }}" alt="Card image" style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title">{{$cours->title}}</h4>
                        <p class="card-text">{{$cours->description}}
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <h3>No Course Assign Yet</h3>
        @endforelse



    </div>
@endsection
