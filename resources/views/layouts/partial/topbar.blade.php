

    <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
    </ul>

   

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        @php
        $new_orders = App\Order::where('is_seen_by_admin',0)->count();
        @endphp
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-danger navbar-badge">{{ $new_orders }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          @if($new_orders > 0)
          <span class="dropdown-item dropdown-header">You have {{ $new_orders }} new orders</span>
          @endif
          <div class="dropdown-divider"></div>
          <a href="{{ route('order.index') }}" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> Check orders now
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
     
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          @php
          $user_avatar = Auth::user()->avatar;
          @endphp
          <img src="@if(Auth::user()->avatar == 'default.png'){{asset('backend/img/user2-160x160.jpg')}}@else {{asset("uploads/users/avatar/{$user_avatar}")}} @endif" class="user-image img-circle elevation-2" alt="User Image">
          <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-secondary">
            <img src="@if(Auth::user()->avatar == 'default.png'){{asset('backend/img/user2-160x160.jpg')}}@else {{asset("uploads/users/avatar/{$user_avatar}")}} @endif" class="img-circle elevation-2" alt="User Image">

            <p>
              {{ Auth::user()->name }}
              <small>Member since - {{ date_format(Auth::user()->created_at, 'M. Y') }}</small>
            </p>
          </li>
          <!-- Menu Body -->
          
          <!-- Menu Footer-->
          <li class="user-footer">
            {{-- <a href="#" class="btn btn-default btn-flat float-right">Sign out</a> --}}

            <a href="{{route('logout')}}" class="btn btn-default btn-block" onclick="event.preventDefault();
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