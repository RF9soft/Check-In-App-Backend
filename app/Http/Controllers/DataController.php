<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Checkin;

class DataController extends Controller
{
    public function checkinLists(Request $request)
    {
    	try
    	{
    		 if($request->ajax())  
            {  
                $data = Checkin::select('*');

                    return Datatables::of($data)
                            ->addIndexColumn()

                            ->addColumn('name', function($row){

                                return $row->user->name;
                            })

                            ->addColumn('email', function($row){

                                return $row->user->email;
                            })

                            ->addColumn('phone', function($row){

                                return $row->user->phone;
                            })
                           
                        ->addColumn('action', function($row){

                                $btn = '';
                                

                                

                                  $btn .= ' <a href="#" class="btn btn-danger btn-sm delete-user action-button" data-id="'.$row->id.'"><i class="fa fa-trash"></i></a>'; 
            
                                    return $btn;
                            })
                            ->rawColumns(['action','name','phone','email'])
                            ->make(true); 
                }
            
            return view('checkins.index');
    	}catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
    }
}
