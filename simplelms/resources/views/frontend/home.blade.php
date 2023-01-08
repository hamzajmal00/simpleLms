<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/frontend-style.css') }}">

    <title>Hello, world!</title>
</head>

<body>
    <header class="herder">
        <div class="log">
            <h1>Simple LMS</h1>
        </div>

        <div class="profile">
            @guest
                <a href="{{ route('login') }}" class="login btn btn-primary">Login</a>
                <a href="{{ route('register') }}" class="register btn btn-primary">Register</a>
            @endguest

            @auth
                @if (Auth::user()->type == 'admin')
                    <a href="{{ route('admindashboard') }}" class="login btn btn-primary">Dashboard</a>
                @elseif (Auth::user()->type == 'teacher')
                <a href="{{ route('teacherdashboard') }}" class="login btn btn-primary">Dashboard</a>

                @elseif (Auth::user()->type == 'learner')
                <a href="{{ route('learnerdashboard') }}" class="login btn btn-primary">Dashboard</a>

                @else
                    <button class="login btn btn-primary">Dashboard</button>
                @endif
            @endauth

        </div>
    </header>
    <div class="main-fr">
        <div class="container">
            <h2 class="conten-center">All Courses</h2>
            <div class="row">
                @forelse ($courses as $cours)
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="card" style="width:400px">
                            <img class="card-img-top" src="{{ asset($cours->thumbnail) }}" alt="Card image"
                                style="width:100%">
                            <div class="card-body">
                                <h4 class="card-title">{{ $cours->title }}</h4>
                                <p class="card-text">{{ $cours->description }}
                                </p>
                            @auth
                            @if (Auth::user()->type == 'user')
                                        
                            <a href="{{route('enroll_course',$cours->id)}}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Only Register User">Enroll Now</a>
                            @endif 
                            @endauth
                                   
                            
                            </div>
                        </div>
                    </div>
                @empty
                    <h3>No Course Assign Yet</h3>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
