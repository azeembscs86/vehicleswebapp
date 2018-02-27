<?php

namespace App\Http\Controllers\Admin\Companies;
use DB;
use Redirect;
use Auth;
use App\User;
use App\Companies;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CompaniesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //--------------------list of all the companies-------------------- 
   public function index()
   {
       $companies = Companies::latest('id', 'desc')->get();           
       return view('admin.companies.index',array('page_title'=>"Admin Dashboard Companies",'companies'=>$companies));
       
   }
   
   //---------------------add new company----------------------------
   public function addCompany(Request $request)
   {
       if($request->get('company_name')) {      
           $company = Companies::where('company_name' , '=', $request->get('company_name'))->first();  //--get coupon by coupon code--//
          if($company==NULL  OR $company->company_name!=$request->get('company_name'))
          {    
            if($request->file('img_path'))
            {
                $image = $request->file('img_path');            
                $name = time().'.'.$image->getClientOriginalExtension();
                $image_path ="uploads/companies/".$name;                
                $companies = new Companies();
                $companies->company_name  = $request->input('company_name');        
                $companies->company_insurance  = $request->input('company_insurance');   
                $companies->company_image      = $image_path;
                $companies->created_at         = date("Y-m-d H:i:s");
                $companies->updated_at         = date("Y-m-d H:i:s");
                $companies->save();
                $destinationPath = public_path('/uploads/companies');   
                $image->move($destinationPath, $name);
                return Redirect::back()->withMessage('Comapny Successfuly Created.');   
            }else
            {
                $companies = new Companies();
                $companies->company_name  = $request->input('company_name');        
                $companies->company_insurance  = $request->input('company_insurance');                   
                $companies->created_at         = date("Y-m-d H:i:s");
                $companies->updated_at         = date("Y-m-d H:i:s");
                $companies->save();
                return Redirect::back()->withMessage('Comapny Successfuly Created.');   
            }                   
            }else
            {                    
               return Redirect::back()->withMessage('Error occured Company Already Exists!'); 
            }
        }
       
   }
   
   //----------------------update update Company-----------------------
   public function updateCompany(Request $request)
   {
       $companies = Companies::find($request->input('company_id'));  
            $image  = $request->file('img_path');   
            if($image)
            {
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/companies');   
            $image_path ="uploads/companies/".$name; 
            $companies->company_name  = $request->input('company_name'); 
            $companies->company_insurance  = $request->input('company_insurance'); 
            $companies->img_path      = $image_path;
            $companies->updated_at     = date("Y-m-d H:i:s");
            $companies->save();
            $image->move($destinationPath, $name);
           return Redirect::back()->withMessage('Company Successfuly Updated.');
        }else {
            $companies->company_name  = $request->input('company_name'); 
            $companies->company_insurance  = $request->input('company_insurance'); 
            $companies->img_path      = $request->input("logo_image");
            $companies->updated_at     = date("Y-m-d H:i:s");
            $companies->save();            
            return Redirect::back()->withMessage('Company Successfuly Updated.');
        }
        
   }
   
   //---------------------delete Company-------------------------------
   public function destroy($company_id)
   {
         $companies = Companies::find($company_id);   
         $companies->delete();     
         return Redirect::back()->withMessage('Company Successfuly deleted.'); 
   }
}
