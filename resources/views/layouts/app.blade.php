@extends('admin_master')
@section('content')

@php
 $total_users = DB::table('users')->count();
 $total_supervisors = DB::table('users')->where('user_type', 'supervisor')->count();
 $total_social_workers = DB::table('users')->where('user_type', 'social_worker')->count();

$today_checkins = DB::table('checkins')->where('date',date('Y-m-d'))->count();

$today_users = DB::table('checkins')->where('date',date('Y-m-d'))->groupBy('user_id')->count();

$total_checkins = DB::table('checkins')->count();

@endphp
<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>

          <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total Users</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total_users}}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                
                      </div>
                    </div>

                    <div class="col-auto">
                      <i class="fas fa-calculator fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total Supervisors</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total_supervisors}}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                      
                      
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas far fa-sun fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total Social workers</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total_social_workers}}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                      
                      
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas far fa-sun fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>



            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total Checkins</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total_checkins}}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                      
                      
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas far fa-sun fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>



            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Today total users</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$today_users}}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                      
                      
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas far fa-sun fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>



            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Today total checkins</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$today_checkins}}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                      
                      
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas far fa-sun fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            
          </div>
          <!--Row-->





        </div>
        <!---Container Fluid-->
@endsection