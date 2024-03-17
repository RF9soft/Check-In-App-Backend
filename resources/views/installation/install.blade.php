<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="{{asset('images/default-app-logo.png')}}" rel="icon">
  <title>Installation</title>
  <link href="{{asset('back/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('back/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('back/css/ruang-admin.min.css')}}" rel="stylesheet">

  <link rel="stylesheet" href="{{asset('toastr/toastr.css')}}">

  <link rel="stylesheet" href="{{asset('custom/style.css')}}">  

</head>

<body class="bg-gradient-login">
  <!-- Login Content -->
  <div class="container-login m-auto pt-5">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Database environment settings</h1>
                  </div>
                  <form class="user" action="{{URL::to('store-info')}}" method="POST">
                  	@csrf

                    <div class="form-group">
                      <label for="app_name" class="font-weight-bold">App Name ( Maximum 12 characters ) <span class="required">*</span></label>
                      <input type="text" class="form-control" name="app_name" id="app_name" aria-describedby="app_name"
                        placeholder="App Name" value="{{old('app_name')}}" required="">
                     @error('app_name')
                       <p class="alert alert-danger">{{ $message }}</p>
                     @enderror
                    </div> 
                    
                    <div class="form-group">
                      <label for="domain_url" class="font-weight-bold">Your Domain URL <span class="required">*</span></label>
                      <input type="url" name="domain_url" class="form-control" placeholder="Example: http://yourdomain.com" id="domain_url" value="{{old('domain_url')}}" required="">
                      @error('domain_url') 
                         <p class="alert alert-danger">{{ $message }}</p>
                       @enderror
                    </div>

                    <div class="form-group">
                      <label for="database_name" class="font-weight-bold">Database name <span class="required">*</span></label>
                      <input type="text" name="database_name" class="form-control" placeholder="Database name" id="database_name" value="{{old('database_name')}}" required="">
                      @error('database_name') 
                         <p class="alert alert-danger">{{ $message }}</p>
                       @enderror
                    </div>

                    <div class="form-group">
                      <label for="database_user" class="font-weight-bold">Database User Name <span class="required">*</span></label>
                      <input type="text" name="database_user" class="form-control" placeholder="Database User Name" id="database_user" required="">
                      @error('database_user') 
                         <p class="alert alert-danger">{{ $message }}</p>
                       @enderror
                    </div>


                    <div class="form-group">
                      <label for="database_password" class="font-weight-bold">Database Password <span class="required">*</span></label>
                      <input type="password" name="database_password" class="form-control" placeholder="Database Password" id="database_password">
                      @error('database_password') 
                         <p class="alert alert-danger">{{ $message }}</p>
                       @enderror
                    </div>


                    <div class="form-group">
                      <button type="submit" class="btn btn-success btn-block">Next step</button>
                    </div>
                    
                  </form>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  <script src="{{asset('back/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('toastr/toastr.js')}}"></script>
  <script src="{{asset('back/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('back/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('back/js/ruang-admin.min.js')}}"></script>

  
   @if(Session::has('messege'))
    @toastr("{{ Session::get('messege') }}")
  @endif

</body>

</html>