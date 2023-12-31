<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Orders</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->first_name." ".Auth::user()->last_name }}</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
        
            <li class="nav-item">
              <a href="{{ route('adminHome') }}" class="nav-link {{ (request()->segment(1) == 'adminHome') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>
        

        
        
        <li class="nav-header">MANAGEMENT</li>
        <li class="nav-item {{ (request()->segment(1) == 'users') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ (request()->segment(1) == 'users') ? 'active' : '' }}">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Management
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('user.index') }}" class="nav-link {{ (request()->segment(1) == 'users') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>User Management</p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="{{ route('category.index') }}" class="nav-link {{ (request()->segment(1) == 'category') ? 'active' : '' }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Category Management</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('product.index') }}" class="nav-link {{ (request()->segment(1) == 'product') ? 'active' : '' }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Product Management</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('order.index') }}" class="nav-link {{ (request()->segment(1) == 'order') ? 'active' : '' }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Order Management</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa fa-cog nav-icon" aria-hidden="true"></i>
            <p>Settings</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>