

    <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="@if($user_info->avatar == 'default.png'){{asset('backend/img/user2-160x160.jpg')}}@else {{asset("uploads/users/avatar/{$user_info->avatar}")}} @endif" class="user-image img-circle elevation-2" alt="User Image">
          <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-secondary">
            <img src="@if($user_info->avatar == 'default.png'){{asset('backend/img/user2-160x160.jpg')}}@else {{asset("uploads/users/avatar/{$user_info->avatar}")}} @endif" class="img-circle elevation-2" alt="User Image">

            <p>
              {{$user_info->name}}
              <small>Member since - {{ date_format($user_info->created_at, 'M. Y') }}</small>
            </p>
          </li>
          <!-- Menu Body -->
          
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="{{ route('user.profile') }}" class="btn btn-default btn-flat">Profile</a>
            {{-- <a href="#" class="btn btn-default btn-flat float-right">Sign out</a> --}}

            <a href="{{route('logout')}}" class="btn btn-default btn-flat float-right" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                Logout
              <!-- Message Start -->
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
              <!-- Message End -->
            </a>

          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->