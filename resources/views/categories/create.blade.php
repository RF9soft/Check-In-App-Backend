@extends('admin_master')
@section('content')
 
 <div class="container-fluid" id="container-wrapper">
   
   <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Category</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>
   </div>

   <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Add Category</h6>
                </div>
                <div class="card-body">
                  <form action="{{route('categories.store')}}" method="POST">
                  	@csrf

                  	<input type="hidden" name="status" class="get-status" value="Publish">

                    <div class="form-group">
                      <label for="category_name">Category Name <span class="required">*</span></label>
                      <input type="text" class="form-control" name="category_name" id="category_name" aria-describedby="category_name"
                        placeholder="Category Name" value="{{old('category_name')}}" required="">
                     @error('category_name')
                       <p class="alert alert-danger">{{ $message }}</p>
                     @enderror
                    </div>

                    <div class="form-group">
                      <label for="category_type">Select Category Type <span class="required">*</span></label>
                     <select class="select2-single form-control" id="category_type" name="category_type" required="">
                     	<option value="" selected="" disabled="">Select category type</option>
                     	<option value="Free">Free</option>
                     	<option value="VIP">VIP</option>
                     </select>
                     @error('category_type')
                       <p class="alert alert-danger">{{ $message }}</p>
                     @enderror
                    </div>


                     <div class="form-group">
                      <p class="label-status">Status <span class="required">*</span></p>
                      <label class="switch"><input class="publish-status" id="status" type="checkbox" checked><span class="slider round"></span></label>

                      @error('status')
                       <p class="alert alert-danger">{{ $message }}</p>
                     @enderror

                  </div>
                
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>

 </div>
@endsection