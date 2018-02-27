<?php

namespace App\Http\Controllers\Admin;
use DB;
use Auth;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $user_role = Auth::user()->role_id;
        if($user_role==1)
        { 
            $cities      = \App\Cities::OrderBy('id','desc')->count();
            $comapnies     = \App\Companies::latest('id', 'asc')->count();
            $equipments    = \App\Equipments::OrderBy('id','desc')->count();
            $inclusion    = \App\Inclusions::OrderBy('id','desc')->count();
            $services = \App\AdditionalServices::latest('id', 'asc')->count();
            $seasons   = \App\Seasons::latest('id', 'asc')->count();
            $vehicles   = \App\Vehicles::latest('id', 'asc')->count();
            return view('admin.dashboard')->with('page_title', "Admin Dashboard")->with("cities",$cities)->with("comapnies",$comapnies)->with("equipments",$equipments)->with("inclusion",$inclusion)->with("services",$services)->with("seasons",$seasons)->with('vehicles',$vehicles);
         }else
        {      
            Auth::logout();
            return redirect('admin/login');
        }
        
    }
    
    public function changePassword()
    {
        $user_role = Auth::user()->user_role;
        if($user_role==1)
        {
         return view('admin.changepassword')->with('page_title', "Admin Dashboard");
        }else
        {      
            Auth::logout();
            return redirect('admin/login');
        }
    }
    
    public function resetPassword(Request $request)
    {
        $user_id = Auth::user()->id;
        $password  = bcrypt($request->input('password'));
        DB::table('users')
                   ->where('id', $user_id)->update(
                    ['password' => $password]
        );        
        Auth::logout();
        return redirect('admin/login');
    }
    
    public function adminLogout()
    {
        Auth::logout();
        return redirect('admin/login');
    }
    
    
    
}
