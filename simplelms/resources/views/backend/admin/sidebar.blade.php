<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            @if (Auth::user()->type == 'admin')
            <div class="nav">
          
                <div class="sb-sidenav-menu-heading">Dashboard</div>
                <a class="nav-link collapsed" href="{{route('admindashboard')}}" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Users
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('admindashboard')}}">All</a>
                        
                    </nav>
                </div>
                <a class="nav-link collapsed" href="{{route('admindashboard')}}" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Teacher
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('addteacher')}}">All</a>
                        <a class="nav-link" href="{{route('addteacher')}}">Add Teacher</a>
                      
                        
                    </nav>
                </div>
                <a class="nav-link collapsed" href="{{route('admindashboard')}}" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Courses
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('getcourse')}}">All Courses</a>
                        <a class="nav-link" href="{{route('getcoursecat')}}">Course Categories</a>
              
                        
                    </nav>
                </div>
              
            </div>
            @else
            <div class="nav">
          
                <div class="sb-sidenav-menu-heading">Dashboard</div>
          
              
            </div>
            @endif
      
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>