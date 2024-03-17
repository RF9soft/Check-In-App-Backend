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
                <div class="card-header d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">All Tips</h6>
                </div>
                <div class="card-body">
                 <div class="card mb-2">
                  <div class="card-body">
                      <div class="row py-5 font-weight-bold">
                        
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="filter_category_type" >Filter by category type</label>
                               <select class="form-control select2-single" id="filter_category_type">
                                 <option value="" selected="" disabled="">Select category type</option>
                                 <option value="Free">Free</option>
                                 <option value="VIP">VIP</option>
                                 
                               </select>
                            </div>
                          </div>


                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="filter_category_type" >Filter by category</label>
                               <select class="form-control select2-single" id="filter_category">
                                 <option value="" selected="" disabled="">Select category</option>
                                 @foreach(categories() as $category)
                                   <option value="{{$category->id}}">{{$category->category_name}}</option>
                                 @endforeach
                                 
                               </select>
                            </div>
                          </div>


                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="filter_team">Filter by team</label>
                               <select class="form-control select2-single" id="filter_team">
                                 <option value="" selected="" disabled="">Select team</option>
                                 @foreach(teams() as $team)
                                  <option value="{{$team}}">{{$team}}</option>
                                 @endforeach
                               </select>
                            </div>
                          </div>


                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="filter_category_status">Filter by status</label>
                               <select class="form-control select2-single" id="filter_tips_status">
                                 <option value="" selected="" disabled="">Select status</option>
                                 <option value="Pending">Pending</option>
                                 <option value="Win">Win</option>
                                 <option value="Loss">Loss</option>
                               </select>
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group" id="simple-date4">
                              <label for="dateRangePicker">Range Select</label>
                              <div class="input-daterange input-group">
                                <input type="text" class="input-sm form-control start_date" name="start" placeholder="Start date"/>
                                <div class="input-group-prepend">
                                  <span class="input-group-text">to</span>
                                </div>
                                <input type="text" class="input-sm form-control end_date" name="end" placeholder="End date" />
                              </div>
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="custom_option">Today/Current Month</label>
                              <select class="form-control select2-single" id="filter_option">
                                 <option value="" selected="" disabled="">Choose option</option>
                                 <option value="today">Today</option>
                                 <option value="current_month">Current Month</option>
                               </select>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                              <div class="row justify-content-center">
                                <div class="col-auto">
                                  <button type="button" class="btn btn-primary filter filter-tips"><i class="fa fa-filter"></i> FILTER</button>

                                  <a href="#" class="btn btn-danger reset"> RESET</a>

                                </div>
                             </div>
                            </div>
                            
                          </div>

                    </div>
                  </div>
                </div>

                   <div class="table-responsive">
                     <table class="table table-bordered table-striped data-table" id="tips-table"> 
                       <thead class="thead-light">
                        <tr>
                          <th>Tips Title</th>
                          <th>Category</th>
                          <th>Category Type</th>
                          <th>Team One</th>
                          <th>Team Two</th>
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