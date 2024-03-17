@extends('admin_master')
@section('content')
 
 <div class="container-fluid" id="container-wrapper">
   
   <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Change Password</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>
   </div>

   <div class="card mb-4"> 
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
                </div>
                <div class="card-body">
                  <form action="{{url('password-change')}}" method="POST">
                  	@csrf

                   
                   <div class="form-group">
                    <label for="current_password">Current Password <span class="required">*</span></label>
                    <input type="password" name="current_password" id="current_password" class="form-control" placeholder="Current Password" required=""> 
                    @error('current_password')
                <p class="alert alert-danger">{{ $message }}</p>
                   @enderror
                  </div>

                  <div class="form-group">
                    <label for="new_password">New Password <span class="required">*</span></label>
                    <input type="password" name="new_password" id="new_password" class="form-control" placeholder="New Password" required="">
                    @error('new_password')
                <p class="alert alert-danger">{{ $message }}</p>
                   @enderror
                  </div>

                  <div class="form-group">
                    <label for="confirm_password">Confirm Password <span class="required">*</span></label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password" required="">

                    @error('confirm_password')
                <p class="alert alert-danger">{{ $message }}</p>
                   @enderror
                   
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-success">Update</button>
                  </div>
                
                  </form>
                </div>
              </div>

 </div>
@endsection