<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EnvRequest;
use App\Http\Requests\StoreUserRequest;
use Artisan;
use App\Models\User;

class InstallController extends Controller 
{
    public function install()
    {   
    	return view('installation.install');
    }

    public function storeInfo(EnvRequest $request)
    {
    	try
    	{
    		$replacements = [
			    'APP_NAME' => "'$request->app_name'",
                'APP_URL'  => $request->domain_url,
			    'DB_DATABASE' => $request->database_name,
                'DB_USERNAME' => $request->database_user,
                'DB_PASSWORD' => $request->database_password,
			]; 

			$path = base_path('.env');
			if (file_exists($path)) {
			    $envContent = file_get_contents($path);
			    foreach ($replacements as $key => $value) {

			        $envContent = preg_replace("/\b" . preg_quote($key) . "\b" . "=(.*)/", $key . "=" . $value, $envContent);
			    }

			    file_put_contents($path, $envContent);
			}

            
           
           $notification=array(
                             'messege'=>'Successfully database information has been taken',
                             'alert-type'=>'success'
                            );

           return redirect('/admin-register')->with($notification);

    	}catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
    }

    public function adminRegister()
    {
        try
        {   

            Artisan::call("migrate");
            return view('admin_register');
        }catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
    }

    public function registerAdmin(StoreUserRequest $request)
    {
        try
        {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();

            $notification=array(
                             'messege'=>'Successfully sign up',
                             'alert-type'=>'success'
                            );

           return redirect('/')->with($notification);

        }catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
    }
}
