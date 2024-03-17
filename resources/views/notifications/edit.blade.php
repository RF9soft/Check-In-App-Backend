@extends('admin_master')
@section('content')
 
 <div class="container-fluid" id="container-wrapper">
   
   <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Notification</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>
   </div>

   <div class="card mb-4"> 
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Edit Notification</h6>
                </div>
                <div class="card-body">
                  <form action="{{route('notifications.update',$notification->id)}}" method="POST" enctype="multipart/form-data">
                  	@csrf
                    @method('PATCH')

                 

                    <div class="form-group">
                      <label for="notification_title">Notification Title <span class="required">*</span></label>
                      <input type="text" class="form-control" name="notification_title" id="notification_title" aria-describedby="notification_title"
                        placeholder="Notification Title" value="{{old('notification_title',$notification->notification_title)}}" required="">
                     @error('notification_title')
                       <p class="alert alert-danger">{{ $message }}</p>
                     @enderror
                    </div>

                    <div class="form-group">
                        <label for="notification_image">Notifaction Image <span class="required">*</span></label>
                        <input name="notification_image" type="file" id="notification_image" accept="image/*" class="dropify" data-height="150" data-default-file="{{URL::to($notification->notification_image)}}" />
                        @error('notification_image') 
                         <p class="alert alert-danger">{{ $message }}</p>
                       @enderror
                      </div> 


                      <div class="form-group">
                        <label>Description ( Maximum 100 words ) <span class="required">*</span></label>
                        <textarea class="ckeditor" name="notification_description" id="editor">{{old('notification_description',$notification->notification_description)}}</textarea>
                        @error('notification_description') 
                         <p class="alert alert-danger">{{ $message }}</p>
                       @enderror
                      </div>


                
                    <button type="submit" class="btn btn-success">Update</button>
                  </form>
                </div>
              </div>

 </div>
@endsection