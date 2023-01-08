@include('backend.admin.header')
<div id="layoutSidenav">
    @include('backend.admin.sidebar')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                @if (\Session::has('error'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('error') !!}</li>
                        </ul>
                    </div>
                @endif
                @yield('content')


            </div>
        </main>
        @include('backend.admin.footer')
