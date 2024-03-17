@extends('admin_master')
@section('content')
 
 <div class="container-fluid" id="container-wrapper">
   
   <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Tips</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>
   </div>

   <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Add Tips</h6>
                </div>
                <div class="card-body">
                  <form action="{{route('tips.store')}}" method="POST" enctype="multipart/form-data">
                  	@csrf

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="tips_title">Tips Title <span class="required">*</span></label>
                        <input type="text" class="form-control" name="tips_title" id="tips_title" aria-describedby="tips_title"
                          placeholder="Tips Title" value="{{old('tips_title')}}" required="">
                       @error('tips_title') 
                         <p class="alert alert-danger">{{ $message }}</p>
                       @enderror
                    </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                      <label for="league_name">League name<span class="required">*</span></label>
                      <input type="text" class="form-control" name="league_name" id="league_name" aria-describedby="league_name"
                        placeholder="League name" value="{{old('league_name')}}" required="">
                     @error('league_name') 
                       <p class="alert alert-danger">{{ $message }}</p>
                     @enderror
                    </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="category_id">Select Category <span class="required">*</span></label>
                       <select class="select2-single form-control" id="category_id" name="category_id" required="">
                        <option value="" selected="" disabled="">Select Category</option>
                        @foreach(categories() as $category)
                          <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                       </select>
                       @error('category_id')
                         <p class="alert alert-danger">{{ $message }}</p>
                       @enderror
                    </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="status">Select Status <span class="required">*</span></label>
                       <select class="select2-single form-control" id="status" name="status" required="">
                        <option value="" selected="" disabled="">Select Status</option>
                         <option value="Pending">Pending</option>
                         <option value="Win">Win</option>
                         <option value="Loss">Loss</option>
                       </select>
                       @error('status')
                         <p class="alert alert-danger">{{ $message }}</p>
                       @enderror
                    </div>
                    </div>
                    

                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="team_one">Team one<span class="required">*</span></label>
                        <input type="text" class="form-control" name="team_one" id="team_one" aria-describedby="team_one"
                          placeholder="Team one" value="{{old('team_one')}}" required="">
                       @error('team_one') 
                         <p class="alert alert-danger">{{ $message }}</p>
                       @enderror
                      </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="team_two">Team two<span class="required">*</span></label>
                        <input type="text" class="form-control" name="team_two" id="team_two" aria-describedby="team_two"
                          placeholder="Team two" value="{{old('team_two')}}" required="">
                       @error('team_two') 
                         <p class="alert alert-danger">{{ $message }}</p>
                       @enderror
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="date_time">DateTime <span class="required">*</span></label>
                        <input type="datetime-local" name="date_time" class="form-control" id="date_time" required="">

                        @error('date_time') 
                         <p class="alert alert-danger">{{ $message }}</p>
                       @enderror

                      </div>
                    </div>


                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="odds_value">Odds value<span class="required">*</span></label>
                        <input type="text" name="odds_value" class="form-control" id="odds_value" placeholder="Odds Value" value="{{old('odds_value')}}" required="">
                        @error('odds_value') 
                         <p class="alert alert-danger">{{ $message }}</p>
                       @enderror
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="team_one_score">Team one score <span class="required">*</span></label>
                        <input type="text" name="team_one_score" class="form-control" id="team_one_score" placeholder="Team one score" value="{{old('team_one_score')}}" required=""> 
                        @error('team_one_score') 
                         <p class="alert alert-danger">{{ $message }}</p>
                       @enderror
                      </div>
                    </div>


                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="team_two_score">Team two score <span class="required">*</span></label>
                        <input type="text" name="team_two_score" class="form-control" id="team_two_score" placeholder="Team two score" value="{{old('team_two_score')}}" required=""> 
                        @error('team_two_score') 
                         <p class="alert alert-danger">{{ $message }}</p>
                       @enderror
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="team_one_image">Team one image <span class="required">*</span></label>
                        <input name="team_one_image" type="file" id="team_one_image" accept="image/*" class="dropify" data-height="150" required="" />
                        @error('team_one_image') 
                         <p class="alert alert-danger">{{ $message }}</p>
                       @enderror
                      </div>
                    </div>


                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="team_two_image">Team two image <span class="required">*</span></label>
                        <input name="team_two_image" type="file" id="team_two_image" accept="image/*" class="dropify" data-height="150" required="" />
                        @error('team_two_image') 
                         <p class="alert alert-danger">{{ $message }}</p>
                       @enderror
                      </div>
                    </div>

                  </div>

                
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>

 </div>
@endsection