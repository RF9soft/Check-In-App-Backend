<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use DataTables;
class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth_check');
    }


    public function Dashboard()
    {   
    	return view('layouts.app');
    }

    public function userLists(Request $request)
    {   

        try
        {
            if($request->ajax()) 
            {  
                $users = User::where('role', '!=', 'admin')->orderBy('id','DESC')->select('*');

                    return Datatables::of($users)
                            ->addIndexColumn()
                           
                        ->addColumn('action', function($row){

                                $btn = '';
                                

                                

                                  $btn .= ' <a href="#" class="btn btn-danger btn-sm delete-user action-button" data-id="'.$row->id.'"><i class="fa fa-trash"></i></a>'; 
            
                                    return $btn;
                            })->filter(function ($instance) use ($request) {
                            if ($request->get('search') != "") {
                                 $instance->where(function($w) use($request){
                                    $search = $request->get('search');
                                    $w->orWhere('name', 'LIKE', "%$search%");
                                });
                            }


                            if($request->get("user_type") != "")
                            {
                                 $instance->where('user_type', $request->get('user_type'));
                            }


                           
                            
                            
                        })
                            ->rawColumns(['action'])
                            ->make(true); 
                }
            
            return view('users.index');
        }catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
    }

    public function deleteUser($id)
    {
    	try
    	{
    		$user = User::findorfail($id);
    		$user->delete();

    		return response()->json('Successfully user has been deleted');
    	}catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
    }
}
