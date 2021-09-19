<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="userId" content="{{ Auth::check()? Auth::user()->id : 'null' }}">
  <title>nCube ICMS - @yield('title')</title>
  <link rel="stylesheet" href=" {{ asset('/css/app.css') }} ">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<style>
  .chat {
    list-style: none;
    margin: 0;
    padding: 0;
  }

  .chat li {
    margin-bottom: 10px;
    padding-bottom: 5px;
    border-bottom: 1px dotted #B3A9A9;
  }

  .chat li .chat-body p {
    margin: 0;
    color: #777777;
  }

  .panel-body {
    overflow-y: scroll;
    height: 350px;
  }

  ::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
  }

  ::-webkit-scrollbar {
    width: 12px;
    background-color: #F5F5F5;
  }

  ::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
  }
</style>

<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('home') }}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search fa-lg"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-envelope fa-lg"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('img/mh.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
        </div>
      </li>
      <!-- ExpandWindow -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt fa-lg"></i>
        </a>
      </li>
      <li class="nav-item">
        <a
            class="nav-link"
            href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="fas fa-power-off fa-lg red"></i>
        </a>
          <form
             id="logout-form"
             action="{{ route('logout') }}"
             method="POST"
             style="display: none;">
             @csrf
          </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset(Auth::user()->profile->avatar) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('user-profile') }}" class="d-block">Hi! {{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Dasboard -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt blue {{ request()->is('/home') ? 'active' : '' }}"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <!-- EndOfDasboard -->

          <!-- Management -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-briefcase blue"></i>
              <p>
                Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item pl-3">
                <a href="{{route('users')}}" class="nav-link">
                  <i class="fas fa-user-cog nav-icon"></i>
                  <p>User Management</p>
                </a>
              </li>
              <li class="nav-item pl-3">
                <a href="{{ route('church-profile') }}" class="nav-link">
                  <i class="fas fa-home nav-icon"></i>
                  <p>Church Management</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- EndOfManagement -->

          <!-- Departments -->
          <li class="nav-item">
            <a href="{{ route('departments') }}" class="nav-link">
              <i class="nav-icon fas fa-user-circle blue"></i>
              <p>
                Departments
              </p>
            </a>
          </li>
          <!-- EndofDepartment -->

          <!-- Associations -->
          <li class="nav-item">
            <a href="{{ route('associations') }}" class="nav-link">
              <i class="nav-icon fas fa-user-circle blue"></i>
              <p>
                Associations
              </p>
            </a>
          </li>
          <!-- EndofAssociations -->

          <!-- Membership -->
          <li class="nav-item">
            <a href="{{ route('members') }}" class="nav-link">
              <i class="nav-icon fas fa-users blue"></i>
              <p>
                Membership
              </p>
            </a>
          </li>
          <!-- EndofMemberships -->

          <!-- Financials -->
          <li class="nav-item">
            <a href="{{ route('financials') }}" class="nav-link">
              <i class="nav-icon fas fa-dollar-sign blue"></i>
              <p>
                Financials
              </p>
            </a>
          </li>
          <!-- EndofFinancilas -->
          <!-- Messaging -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-comments blue"></i>
              <p>
                Messaging
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item pl-3">
                <a href="{{route('messaging')}}" class="nav-link">
                  <i class="fas fa-comment nav-icon"></i>
                  <p>Chat</p>
                </a>
              </li>
              <li class="nav-item pl-3">
                <a href="#" class="nav-link">
                  <i class="fas fa-envelope nav-icon"></i>
                  <p>Email</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- End of Messaging -->

          <!-- Settings -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs blue"></i>
              <p>
                Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item pl-3">
                <a href="{{ route('church-profile') }}" class="nav-link">
                  <i class="fas fa-home nav-icon"></i>
                  <p>Church Settings</p>
                </a>
              </li>
              <li class="nav-item pl-3">
                <a href="#" class="nav-link">
                  <i class="fas fa-user-cog nav-icon"></i>
                  <p>Profile settings</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Seetings End -->
          <hr>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Starter Pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Active Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inactive Page</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Simple Link
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
    <div class="content">
      <div class="container-fluid pt-3">
      @yield('content')
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer bg-dark">
             <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
         Version 1.0.0
      </div>

             <!-- Default to the left -->
     <strong>Developed by <a href="">Peter Ayittah</a> || nCube Concepts & Investments &copy; <?php echo date('Y'); ?> ||
     </strong>
     All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->
<script src=" {{ asset('/js/app.js') }} "></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $('.permission-selector').select2({theme: 'classic'});
    });
</script>

</body>
</html>
