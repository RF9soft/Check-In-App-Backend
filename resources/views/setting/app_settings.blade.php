@extends('admin_master')
@section('content')
 
 <div class="container-fluid" id="container-wrapper">
   
   <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">App Settings</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>
   </div>

   <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">App Settings</h6>
                </div>
                <div class="card-body">
                  <form action="{{url('settings-app')}}" method="POST" enctype="multipart/form-data">
                  	@csrf

                    <div class="form-group">
                      <label for="app_name">App Name ( Maximum 12 characters ) <span class="required">*</span></label>
                      <input type="text" class="form-control" name="app_name" id="app_name" aria-describedby="app_name"
                        placeholder="App Name" value="{{old('app_name',(setting()->app_name !== null) ? setting()->app_name : config('app.name'))}}"  required="">
                     @error('app_name')
                       <p class="alert alert-danger">{{ $message }}</p>
                     @enderror
                    </div>


                  <div class="form-group">
                      <label for="footer_text">Footer text <span class="required">*</span></label>
                      <input type="text" class="form-control" name="footer_text" id="footer_text" aria-describedby="footer_text"
                        placeholder="Footer text" value="{{old('footer_text',setting()->footer_text)}}" required="">
                     @error('footer_text')
                       <p class="alert alert-danger">{{ $message }}</p>
                     @enderror
                    </div>
                    

                    @if(setting()->app_logo == NULL)
                    <div class="form-group">
                        <label for="app_logo">App Logo <span class="required">*</span></label>
                        <input name="app_logo" type="file" id="app_logo" accept="image/*" class="dropify" data-height="150"/>
                     
                      </div>
                    @else
                      <div class="form-group">
                        <label for="app_logo">App Logo <span class="required">*</span></label>
                        <input name="app_logo" type="file" id="app_logo" accept="image/*" class="dropify" data-height="150" data-default-file="{{URL::to(setting()->app_logo)}}"/>
                     
                      </div>
                    @endif

                
                    <button type="submit" class="btn btn-success">Update</button>
                  </form>
                </div>
              </div>

 </div>
@endsection