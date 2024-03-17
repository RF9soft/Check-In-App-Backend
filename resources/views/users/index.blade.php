@extends('admin_master')
@section('content')
 
 <div class="container-fluid" id="container-wrapper">
   
   <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>
   </div>

   <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">All Categories</h6>
                </div>
                <div class="card-body">

                  <div class="row px-5 py-5 font-weight-bold">

                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="filter_user_type" >Filter by user type</label>
                           <select class="form-control select2-single" id="filter_user_type">
                             <option value="" selected="" disabled="">Select user type</option>
                             <option value="social_worker">Social Worker</option>
                             <option value="supervisor">Supervisor</option>
                             <option value="police">Police</option>
                           </select>
                        </div>
                      </div>



                </div>

                   <div class="table-responsive">
                     <table class="table table-bordered table-striped data-table" id="user-table">
                       <thead class="thead-light">
                        <tr>
                          <th>Name</th>
                          <th>Type</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                      </tbody>
                     </table>
                   </div>
                </div>
      </div>

 </div>
@endsection