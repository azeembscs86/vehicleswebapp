<?php

namespace App\Http\Controllers\Admin\Cities;
use DB;
use Redirect;
use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CitiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
   //--------------------list of all the cities-------------------- 
   public function index()
   {
       $cities = \App\Cities::latest('id', 'desc')->get();           
       return view('admin.cities.index',array('page_title'=>"Admin Dashboard Cities",'cities'=>$cities));
       
   }
   
   //---------------------add new city----------------------------
   public function addCity(Request $request)
   {
       if($request->get('city_name')) {      
           $city = \App\Cities::where('city_name' , '=', $request->get('city_name'))->first();  //--get coupon by coupon code--//
          if($city==NULL  OR $city->city_name!=$request->get('city_name'))
          {    
            $cities = new \App\Cities();
            $cities->city_name  = $request->input('city_name');        
            $cities->created_at      = date("Y-m-d H:i:s");
            $cities->updated_at     = date("Y-m-d H:i:s");
            $cities->save();
            return Redirect::back()->withMessage('City Successfuly Created.'); 
          }else
          {                    
            return Redirect::back()->withMessage('Error occured City Already Exists!'); 
          }
        }
   }
   
   //----------------------update update City-----------------------
   public function updateCity(Request $request)
   {
       $city = \App\Cities::find($request->input('city_id'));
        if($city)
        {            
            $city->city_name  = $request->input('city_name');        
            $city->updated_at     = date("Y-m-d H:i:s");
            $city->save();
           return Redirect::back()->withMessage('City Successfuly Updated.');
        }else
        {
           return Redirect::back()->withMessage('Error Occured Try again later.'); 
        }
   }
   
   //---------------------delete city-------------------------------
   public function destroy($city_id)
   {
         $city = \App\Cities::find($city_id);   
         $city->delete();     
         return Redirect::back()->withMessage('Citiy Successfuly deleted.'); 
   }
   
}
