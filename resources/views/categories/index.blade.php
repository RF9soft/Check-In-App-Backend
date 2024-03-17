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

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="filter_category_type" >Filter by category type</label>
                           <select class="form-control select2-single" id="filter_category_type">
                             <option value="" selected="" disabled="">Select category type</option>
                             <option value="free">Free</option>
                             <option value="VIP">VIP</option>
                             
                           </select>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="filter_category_status">Filter by status</label>
                           <select class="form-control select2-single" id="filter_category_status">
                             <option value="" selected="" disabled="">Select status</option>
                             <option value="Publish">Publish</option>
                             <option value="Unpublish">Unpublish</option>
                             
                           </select>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="row justify-content-center">
                            <div class="col-auto">
                              <button type="button" class="btn btn-primary filter filter-category"><i class="fa fa-filter"></i> FILTER</button>

                              <a href="#" class="btn btn-danger reset"><i class="fa fa-refresh"></i> RESET</a>

                            </div>
                         </div>
                      </div>

                </div>

                   <div class="table-responsive">
                     <table class="table table-bordered table-striped data-table" id="category-table">
                       <thead class="thead-light">
                        <tr>
                          <th>Category Name</th>
                          <th>Category Type</th>
                          <th>Status</th>
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