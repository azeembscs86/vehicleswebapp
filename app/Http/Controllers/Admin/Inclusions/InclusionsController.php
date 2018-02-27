<?php

namespace App\Http\Controllers\Admin\Inclusions;
use Redirect;
use Auth;
use App\Inclusions;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class InclusionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //--------------------list of all the inclusions-------------------- 
   public function index()
   {
       $inclusions = Inclusions::latest('id', 'desc')->get();           
       return view('admin.inclusions.index',array('page_title'=>"Admin Dashboard Inclusions",'inclusions'=>$inclusions));
   }
   
   //---------------------add new inclusions----------------------------
   public function addInclusions(Request $request)
   {
       if($request->get('inclusion_name')) {      
           $inclusions = Inclusions::where('name' , '=', $request->get('inclusion_name'))->first();  //--get coupon by coupon code--//
          if($inclusions==NULL  OR $inclusions->name!=$request->get('inclusion_name'))
          {    
            $inclusions = new Inclusions();
            $inclusions->name  = $request->input('inclusion_name');   
            $inclusions->descp  = $request->input('description');   
            $inclusions->created_at      = date("Y-m-d H:i:s");
            $inclusions->updated_at     = date("Y-m-d H:i:s");
            $inclusions->save();
            return Redirect::back()->withMessage('Inclusion Successfuly Created.'); 
          }else
          {                    
            return Redirect::back()->withMessage('Error occured Inclusion Name Already Exists!'); 
          }
        }
   }
   
   //----------------------update update inclusions-----------------------
   public function updateInclusion(Request $request)
   {
       $inclusions = Inclusions::find($request->input('inclusion_id'));
        if($inclusions)
        {            
            $inclusions->name  = $request->input('inclusion_name'); 
            $inclusions->descp  = $request->input('description');   
            $inclusions->updated_at     = date("Y-m-d H:i:s");
            $inclusions->save();
           return Redirect::back()->withMessage('Inclusion Successfuly Updated.');
        }else
        {
           return Redirect::back()->withMessage('Error Occured Try again later.'); 
        }
   }
   
   //---------------------delete inclusions-------------------------------
   public function destroy($inclusion_id)
   {
         $inclusion = Inclusions::find($inclusion_id);   
         $inclusion->delete();     
         return Redirect::back()->withMessage('Inclusions Successfuly deleted.'); 
   }
}
