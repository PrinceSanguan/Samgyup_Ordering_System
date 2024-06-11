<body class="hold-transition sidebar-mini">
  <div class="wrapper">
  
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__wobble" src="{{asset('images/dadsburger.jpg')}}" alt="" height="260" width="260">
    </div>
  
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark justify-content-start">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item d-sm-inline">
        <a href="" class="nav-link">Dads Burger & House of Unlimited</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  
  
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a class="brand-link" style="cursor: default;">
        <span class="brand-text font-weight-light">Admin Dashboard</span>
      </a>
  
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex"> 
          <div class="info">
            <a style="cursor: default;">Hello Chef!</strong></a>
          </div>
        </div>
  
       <!-- Sidebar Menu -->
       <nav class="mt-2">
        <ul
          class="nav nav-pills nav-sidebar flex-column"
          data-widget="treeview"
          role="menu"
          data-accordion="false"
        >
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
  
           <li class="nav-item">
            <a href="{{ route('admin.pending') }}" class="nav-link {{ Route::is('admin.pending') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Pending Order
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.product') }}" class="nav-link {{ Route::is('admin.product') ? 'active' : '' }}">
                <i class="nav-icon fas fa-plus-circle"></i>
                <p>
                    Add Product
                </p>
            </a>
        </li>        

          <li class="nav-item">
            <a href="" class="">
                <i class="nav-icon fas fa-table"></i>
                <p>
                    Table #1
                </p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="" class="">
                <i class="nav-icon fas fa-chair"></i>
                <p>
                    Table #2
                </p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="" class="">
                <i class="nav-icon fas fa-utensils"></i>
                <p>
                    Table #3
                </p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="" class="">
                <i class="nav-icon fas fa-couch"></i>
                <p>
                    Table #4
                </p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="" class="">
                <i class="nav-icon fas fa-wine-glass"></i>
                <p>
                    Table #5
                </p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="" class="">
                <i class="nav-icon fas fa-glass-martini-alt"></i>
                <p>
                    Table #6
                </p>
            </a>
        </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>