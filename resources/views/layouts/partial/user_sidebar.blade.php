<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('frontend')}}" class="brand-link">
      <img src="{{asset('backend/img/AdminLTELogo.png')}}" alt="eStore Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">eStore</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-legacy" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
         
          <li class="nav-header text-uppercase"> <i class="nav-icon fas fa-tachometer-alt"></i> Dashboard</li>
          <li class="nav-item">
            <a href="{{ route('user.dashboard') }}" class="nav-link {{ Request::is('user/dashboard') ? 'active':''}}">
              <i class="nav-icon fa fa-home text-light"></i>
              <p class="text">Home</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('user.profile') }}" class="nav-link {{ Request::is('user/profile*') ? 'active':''}}">
              <i class="nav-icon fa fa-user text-light"></i>
              <p>My profile</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Shipping Address</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>