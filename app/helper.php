<?php
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\User;


function userImage(Request $request)
{
    $user = User::findorfail(Auth::user()->id);
    if($request->file('image'))
    {   
        $file = $request->file('image');
        $name = rand(10,10000).time().".".$file->getClientOriginalExtension();
        $file->move(public_path().'/uploads/users/', $name); 
        if($user->image != NULL)
        {
            unlink(public_path($user->image));
        }
        
        $path = 'uploads/users/'.$name;
    }
    else
    {
        $path = $user->image;
    }
    return $path;
}

function generalSettings(Request $request)
{    

    $setting = Setting::findorfail(1);
    if($request->file('app_logo'))
    {   
        $file = $request->file('app_logo');
        $name = rand(10,10000).time().".".$file->getClientOriginalExtension();
        $file->move(public_path().'/uploads/settings/', $name); 
        if($setting->app_logo != NULL)
        {
            unlink(public_path($setting->app_logo));
        }
        
        $path = 'uploads/settings/'.$name;
    }
    else
    {
        $path = $setting->app_logo;
    }

    $setting->app_name = $request->app_name;
    $setting->app_logo = $path;
    $setting->footer_text = $request->footer_text;

    $setting->update();
}

function adsSettings(Request $request)
{   
    $setting = Setting::findorfail(1);
    $setting->select_ads = $request->select_ads;
    $setting->admob_app_id = $request->admob_app_id;
    $setting->admob_banner_id = $request->admob_banner_id;
    $setting->admob_native_id = $request->admob_native_id;
    $setting->abmob_interstial_id = $request->abmob_interstial_id;
    $setting->abmob_interstial_id = $request->abmob_interstial_id;
    $setting->admob_ads_unit = $request->admob_ads_unit;

    $setting->facebook_app_id = $request->facebook_app_id;
    $setting->facebook_banner_id = $request->facebook_banner_id;
    $setting->facebook_native_id = $request->facebook_native_id;
    $setting->facebook_interstial_id = $request->facebook_interstial_id;
    $setting->facebook_interstial_id = $request->facebook_interstial_id;
    $setting->facebook_ads_unit = $request->facebook_ads_unit;

    $setting->applovin_app_id = $request->applovin_app_id;
    $setting->applovin_banner_id = $request->applovin_banner_id;
    $setting->applovin_native_id = $request->applovin_native_id;
    $setting->applovin_interstial_id = $request->applovin_interstial_id;
    $setting->applovin_ads_unit = $request->applovin_ads_unit;
    $setting->update();
}


