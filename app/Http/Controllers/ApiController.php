<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use Auth;
use DataTables;
use App\Models\Checkin;
class ApiController extends Controller
{
    public function signup(Request $request)
    {
    	try
    	{
	    		$validator = Validator::make($request->all(), [
		            'name' => 'required|string',
		            'user_name' => 'required|string|unique:users',
		            'email' => 'required|string|unique:users',
		            'phone' => 'required|string|unique:users',
		            'password' => 'required|string',
		            'user_type' => 'required|string',
	           ]);

		        if($validator->fails()){
		            return ['status'=>false, 'message'=>'The given data was invalid', 'data'=>$validator->errors()];  
		        }

		       $user = new User();
		       $user->name = $request->name;
		       $user->role = 'user';
		       $user->user_name = $request->user_name;
		       $user->email = $request->email;
		       $user->phone = $request->phone;
		       $user->password = bcrypt($request->password);
		       $user->user_type = $request->user_type;
		       $user->save();

		     return response()->json(['status'=>true, 'message'=>'Successfully signup']);

    	}catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
    }

    public function signin(Request $request)
    {
    	try
    	{
    		$validator = Validator::make($request->all(), [
		            'username_email' => 'required|string',
		            'password' => 'required|string',
	           ]);

	        if($validator->fails()){
	            return ['status'=>false, 'message'=>'The given data was invalid', 'data'=>$validator->errors()];  
	        }

	        if (filter_var($request->input('username_email'), FILTER_VALIDATE_EMAIL)) {
			    // User entered an email
			    $loginType = 'email';
			} else {
			    // User entered a username
			    $loginType = 'user_name';
			}

			if (Auth::attempt([$loginType => $request->input('username_email'), 'password' => $request->password])) {
				$user = Auth::user();
			    $data['token'] =  $user->createToken('MyApp')->plainTextToken; 
                $data['id'] = $user->id;
                $data['name'] =  $user->name;
                $data['user_name'] =  $user->user_name;
                $data['user_type'] =  $user->user_type;
                $data['email'] = $user->email;
                $data['phone'] = $user->phone;

                return ['status'=>true, 'message'=>'User login successfully', 'data'=>$data];
			} else {
			     return ['status'=>false, 'message'=>'Login information is invalid', 'data'=>['token'=>"", 'id'=>0, 'name'=>"", 'user_name'=>"", 'user_type'=>"", "email"=>"", 'phone'=>""]];
			}

    	}catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
    }

    public function logout(Request $request)
    {
    	try
    	{
    		auth()->user()->tokens()->delete();
    		return response()->json(['status'=>true, 'message'=>'Successfully LoggedOut!']);
    	}catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
    }
    
    public function userSupervisor()
    {
        try
        {
            $users = User::select('id', 'name', 'user_name', 'email', 'phone')->where('user_type', 'supervisor')->latest()->get();
            if(count($users) > 0)
            {
                return response()->json(['status'=>true, 'message'=>'Data found', 'data'=>$users]);
            }
            return response()->json(['status'=>false, 'message'=>'No data found', 'data'=>$users]);
        }catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
    }
    
    public function userSocialWorkers()
    {
        try
        {
            $users = User::select('id', 'name', 'user_name', 'email', 'phone')->where('user_type', 'social_worker ')->latest()->get();
            if(count($users) > 0)
            {
                return response()->json(['status'=>true, 'message'=>'Data found', 'data'=>$users]);
            }
            return response()->json(['status'=>false, 'message'=>'No data found', 'data'=>$users]);
        }catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
    }
   

   public function storeCheckin(Request $request)
   {
       try
       {
           $validator = Validator::make($request->all(), [
                    'feelings_type' => 'required|string',
                    'lat' => 'required|string',
                    'lon' => 'required|string',
                    'mood' => 'required|string',
                    'image' => 'required',

               ]);

            if($validator->fails()){
                return ['status'=>false, 'message'=>'The given data was invalid', 'data'=>$validator->errors()];  
            }

            if($request->file('image'))
            {   
                $file = $request->file('image');
                $name = rand(10,10000)."checkin_".time().".".$file->getClientOriginalExtension();
                $file->move(public_path().'/uploads/checkins/', $name); 
                
                $path = 'uploads/checkins/'.$name;
            }

            $checkin = new Checkin();
            $checkin->user_id = Auth::user()->id;
            $checkin->feelings_type = $request->feelings_type;
            $checkin->lat = $request->lat;
            $checkin->lon = $request->lon;
            $checkin->mood = $request->mood;
            $checkin->date = date('Y-m-d');
            $checkin->month = date('F');
            $checkin->year = date('Y');
            $checkin->time = date('H:i:s');
            $checkin->timestamp = time();
            $checkin->image = $path;
            $checkin->save();
          
          return response()->json(['status'=>true, 'message'=>'Successfully checkin taken']);
       }catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
   }

   public function allCheckins()
   {
       try
       {
          $checkins = Checkin::latest()->get();
          $data = array();
          foreach($checkins as $checkin)
          {
              $data[] = ['id'=>$checkin->id, 'user_id'=>$checkin->user_id, 'name'=>$checkin->user->name, 'phone'=>$checkin->user->phone, 'email'=>$checkin->user->email, 'feelings_type'=>$checkin->feelings_type, 'lat'=>$checkin->lat, 'lon'=>$checkin->lon, 'mood'=>$checkin->mood, 'date'=>$checkin->date, 'month'=>$checkin->month, 'year'=>$checkin->year, 'time'=>$checkin->time, 'timestamp'=>$checkin->timestamp, 'image'=>$checkin->image, 'created_at'=>$checkin->created_at, 'updated_at'=>$checkin->updated_at];
          }
          if(count($data) > 0)
          {
              return response()->json(['status'=>true, 'message'=>'Data found', 'total'=>count($data), 'data'=>$data]);
          }
          return response()->json(['status'=>false, 'message'=>'No data found', 'total'=>count($data), 'data'=>$data]);
       }catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
   }

   public function checkinDate(Request $request)
   {
       try
       {
          $validator = Validator::make($request->all(), [
                    'date' => 'required|date',

               ]);

            if($validator->fails()){
                return ['status'=>false, 'message'=>'The given data was invalid', 'data'=>$validator->errors()];  
            }

            $checkins = Checkin::where('date',$request->date)->latest()->get();

            $data = array();
          foreach($checkins as $checkin)
          {
              $data[] = ['id'=>$checkin->id, 'user_id'=>$checkin->user_id, 'name'=>$checkin->user->name, 'phone'=>$checkin->user->phone, 'email'=>$checkin->user->email, 'feelings_type'=>$checkin->feelings_type, 'lat'=>$checkin->lat, 'lon'=>$checkin->lon, 'mood'=>$checkin->mood, 'date'=>$checkin->date, 'month'=>$checkin->month, 'year'=>$checkin->year, 'time'=>$checkin->time, 'timestamp'=>$checkin->timestamp, 'image'=>$checkin->image, 'created_at'=>$checkin->created_at, 'updated_at'=>$checkin->updated_at];
          }
          if(count($data) > 0)
          {
              return response()->json(['status'=>true, 'message'=>'Data found', 'total'=>count($data), 'data'=>$data]);
          }
          return response()->json(['status'=>false, 'message'=>'No data found', 'total'=>count($data), 'data'=>$data]);

         if(count($data) > 0)
          {
              return response()->json(['status'=>true, 'message'=>'Data found', 'total'=>count($data), 'data'=>$data]);
          }
          return response()->json(['status'=>false, 'message'=>'No data found', 'total'=>count($data), 'data'=>$data]);

       }catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
   }

   public function todayCheckin()
   {
      try
      {
         $checkins = Checkin::where('date',date('Y-m-d'))->latest()->get();


         $data = array();
          foreach($checkins as $checkin)
          {
              $data[] = ['id'=>$checkin->id, 'user_id'=>$checkin->user_id, 'name'=>$checkin->user->name, 'phone'=>$checkin->user->phone, 'email'=>$checkin->user->email, 'feelings_type'=>$checkin->feelings_type, 'lat'=>$checkin->lat, 'lon'=>$checkin->lon, 'mood'=>$checkin->mood, 'date'=>$checkin->date, 'month'=>$checkin->month, 'year'=>$checkin->year, 'time'=>$checkin->time, 'timestamp'=>$checkin->timestamp, 'image'=>$checkin->image, 'created_at'=>$checkin->created_at, 'updated_at'=>$checkin->updated_at];
          }
          if(count($data) > 0)
          {
              return response()->json(['status'=>true, 'message'=>'Data found', 'total'=>count($data), 'data'=>$data]);
          }
          return response()->json(['status'=>false, 'message'=>'No data found', 'total'=>count($data), 'data'=>$data]);

         if(count($data) > 0)
          {
              return response()->json(['status'=>true, 'message'=>'Data found', 'total'=>count($data), 'data'=>$data]);
          }
          return response()->json(['status'=>false, 'message'=>'No data found', 'total'=>count($data), 'data'=>$data]);
      }catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
   }
    
}
