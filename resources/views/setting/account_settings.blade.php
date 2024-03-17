@extends('admin_master')
@section('content')
 
 <div class="container-fluid" id="container-wrapper">
   
   <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Account Settings</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>
   </div>

   <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Account Settings</h6>
                </div>
                <div class="card-body">
                  <form action="{{url('settings-account')}}" method="POST" enctype="multipart/form-data">
                  	@csrf

                    <div class="form-group">
                      <label for="name">Name <span class="required">*</span></label>
                      <input type="text" class="form-control" name="name" id="name" aria-describedby="name"
                        placeholder="Name" value="{{old('name',Auth::user()->name)}}" required="">
                     @error('name')
                       <p class="alert alert-danger">{{ $message }}</p>
                     @enderror
                    </div>


                    <div class="form-group">
                      <label for="email">Email <span class="required">*</span></label>
                      <input type="email" class="form-control" name="email" id="email" aria-describedby="email"
                        placeholder="Email" value="{{old('email',Auth::user()->email)}}" required="">
                     @error('email')
                       <p class="alert alert-danger">{{ $message }}</p>
                     @enderror
                    </div>

                    

                    @if(Auth::user()->image == NULL)
                    <div class="form-group">
                        <label for="image">Profile Photo <span class="required">*</span></label>
                        <input name="image" type="file" id="image" accept="image/*" class="dropify" data-height="150"/>
                     
                      </div>
                    @else
                      <div class="form-group">
                        <label for="image">Profile Photo <span class="required">*</span></label>
                        <input name="image" type="file" id="image" accept="image/*" class="dropify" data-height="150" data-default-file="{{Auth::user()->image}}"/>
                     
                      </div>
                    @endif

                
                    <button type="submit" class="btn btn-success">Update</button>
                  </form>
                </div>
              </div>

 </div>
@endsection