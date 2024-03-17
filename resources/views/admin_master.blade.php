<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin | Dashboard</title>
  <link href="{{asset('back/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('back/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('back/css/ruang-admin.min.css')}}" rel="stylesheet">

  <!-- Bootstrap DatePicker -->  
  <link href="{{asset('back/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet" >


<!-- Select2 -->

 <link href="{{asset('back/vendor/select2/dist/css/select2.css')}}" rel="stylesheet" type="text/css">

    <link href="{{asset('back/vendor/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="{{asset('toastr/toastr.css')}}">

  <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css" href="{{asset('back/datatable/css/dataTables.bootstrap4.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('back/datatable/css/buttons.dataTables.min.css')}}">
    
    <link rel="stylesheet" type="text/css" href="{{asset('back/datatable/css/responsive.bootstrap4.min.css')}}">
  
     <link rel="stylesheet" href="{{asset('custom/style.css')}}">


     <link rel="stylesheet" type="text/css" href="{{ asset('dropify/dist/css/dropify.min.css') }}">

      

</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{URL::to('/dashboard')}}">
        <div class="sidebar-brand-icon">
          <img src="{{URL::to(Auth::user()->image)}}">
        </div>
        <div class="sidebar-brand-text mx-3">Edge</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="{{URL::to('/dashboard')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" id="categorySection" href="#" data-toggle="collapse" data-target="#collapseCategory"
          aria-expanded="true" aria-controls="collapseCategory">
         <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
          <span>Users</span>
        </a>
        <div id="collapseCategory" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Users</h6>
            <a class="collapse-item" id="all-user" href="{{URL::to('/user-lists')}}">All User</a>
           
          </div>
        </div>
      </li>
      
     <li class="nav-item">
        <a class="nav-link collapsed" id="categorySection" href="#" data-toggle="collapse" data-target="#collapseCategory"
          aria-expanded="true" aria-controls="collapseCategory">
         <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
          <span>Checkins</span>
        </a>
        <div id="collapseCategory" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Checkin Lists</h6>
            <a class="collapse-item" id="all-checkin" href="{{URL::to('/checkin-lists')}}">Checkin Lists</a>
           
          </div>
        </div>
      </li>


      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        <i class="fas fa-fw fa-cog"></i>
        Settings
      </div>

      <li class="nav-item" id="account-settings">
        <a class="nav-link" href="{{URL::to('/account-settings')}}">
          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
          <span>Account Settings</span>
        </a>
      </li> 
      
      <li class="nav-item" id="app-settings" style="display:none;">
        <a class="nav-link" href="{{URL::to('/app-settings')}}">
          <i class="fab fa-app-store"></i>
          <span>App Settings</span>
        </a>
      </li>

      <li class="nav-item" id="ads-settings" style="display:none;">
        <a class="nav-link" href="{{URL::to('/ads-settings')}}">
          <i class="fas fa-fw fa-ad"></i>
          <span>Ads Setting</span>
        </a>
      </li>

      <li class="nav-item" id="change-password">
        <a class="nav-link" href="{{URL::to('/change-password')}}">
          <i class="fas fa-fw fa-key"></i>
          <span>Change Password</span>
        </a>
      </li>

      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
  
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="{{URL::to(Auth::user()->image)}}"> 
                <span class="ml-2 d-none d-lg-inline text-white small">{{Auth::user()->name}}</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{URL::to('/account-settings')}}">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Account Settings
                </a>
                

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{URL::to('/logout')}}">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->

        @yield('content')
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span> 
              Copyright @ {{date('Y')}}
            </span>
          </div>
        </div>

        
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="{{asset('back/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('back/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('back/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <script src="{{asset('back/js/ruang-admin.min.js')}}"></script> 


  
  <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
  <script src="{{asset('back/custom.js')}}"></script>

  <script src="{{asset('toastr/toastr.js')}}"></script>

  <!-- data-table js -->
    <script src="{{asset('back/datatable/js/jquery.dataTables.min.js')}}"></script>

    <script src="{{asset('back/datatable/js/dataTables.buttons.min.js')}}"></script>



    <script src="{{asset('back/datatable/js/dataTables.bootstrap4.min.js')}}"></script>

    <script src="{{asset('back/datatable/js/dataTables.responsive.min.js')}}"></script>

    <script src="{{asset('back/datatable/js/responsive.bootstrap4.min.js')}}"></script>

    <script src="{{asset('back/datatable/js/data-table-custom.js')}}"></script>

    <script src="{{ asset('dropify/dist/js/dropify.min.js') }}"></script>

    <script src="{{asset('back/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>

    <!-- Select2 -->
  <script src="{{asset('back/vendor/select2/dist/js/select2.min.js')}}"></script>

  @if(Session::has('messege'))
    @toastr("{{ Session::get('messege') }}")
  @endif

  

</body>

</html>