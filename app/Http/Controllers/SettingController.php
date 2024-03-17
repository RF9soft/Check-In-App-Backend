<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\User;
use Hash;
use App\Http\Requests\UpdateAccountRequest; 
use App\Http\Requests\UpdateAppSettings;
use App\Http\Requests\PasswordChangeRequest;
use Auth;
class SettingController extends Controller
{   

	public function __construct()
    {
        $this->middleware('auth_check');
    }

    public function accountSettings()
    {
    	try
    	{
    		return view('setting.account_settings');
    	}catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
    }

    public function settingsAccount(UpdateAccountRequest $request)
    {
    	try 
    	{
    		$user = User::findorfail(Auth::user()->id);
    		$user->name = $request->name;
    		$user->email = $request->email;
    		$user->image = userImage($request,$user);
    		$user->update();

    		$notification=array(
                             'messege'=>'Successfully account information has been updated',
                             'alert-type'=>'success'
                            );

           return redirect()->back()->with($notification);

    	}catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
    }

    public function appSettings()
    {
        return view('setting.app_settings');
    }

    public function settingsApp(UpdateAppSettings $request)
    {
        try
        {   

            
            generalSettings($request); 

            $notification=array(
                             'messege'=>'Successfully app information has been updated',
                             'alert-type'=>'success'
                            );

           return redirect()->back()->with($notification);
        }catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }

    }

    public function adsSetting()
    {
        return view('setting.ads_settings');
    }

    public function settingsAdd(Request $request)
    {
        try
        {
            adsSettings($request);
            $notification=array(
                             'messege'=>'Successfully ads information has been updated',
                             'alert-type'=>'success'
                            );

           return redirect()->back()->with($notification);
        }catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }

    }

    public function changePassword()
    {
        return view('setting.change_password'); 
    }

    public function passwordChange(PasswordChangeRequest $request)
    {
        try
        {
             User::find(Auth::user()->id)->update(['password'=> Hash::make($request->new_password)]);

            $notification=array(
                             'messege'=>'Successfully password has been changed',
                             'alert-type'=>'success'
                            );

           return redirect()->back()->with($notification);

        }catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
    }

   


}
