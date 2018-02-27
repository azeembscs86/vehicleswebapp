<?php

namespace App\Http\Controllers\Admin\CitiesCompanies;
use App\Companies;
use App\Cities;
use App\CompanyCities;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CitiesCompaniesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
        
    }//--------------------list of all the companies with Cities-------------------- 
   public function index()
   {
       $citycompany = DB::table('camp_company_cities')
            ->join('camp_city', 'camp_city.id', '=', 'camp_company_cities.city_id')
            ->join('camp_company', 'camp_company.id', '=', 'camp_company_cities.company_id')
            ->select('camp_company_cities.id','camp_company_cities.city_id','camp_company_cities.company_id', 'camp_city.city_name', 'camp_company.company_name')
            ->get();   
       $cities      = Cities::OrderBy('id', 'desc')->get();
       $companies   = Companies::OrderBy('id', 'desc')->get();
       return view('admin.citiescompanies.index',array('page_title'=>"Admin Dashboard City Company",'citycompanys'=>$citycompany,'cities'=>$cities,'companies'=>$companies));
   }
   
   //----------------------create City companies---------------------
   public function create(Request $request)
   {   
       foreach ($request->input('company_id') as $names)
       {                  
          $company=array(
            'city_id'            => $request->input('city_id') ,
            'company_id'         => $names,
            'created_at'         => date("Y-m-d H:i:s"),
            'updated_at'         => date("Y-m-d H:i:s"),             
        );
           $citycompany = new CompanyCities($company); 
           $citycompany->save();       
       } 
        
        
       return Redirect::back()->withMessage('Citiy Company Successfuly Added.'); 
   }
   
   //----------------------update city companies---------------------
   public function update(Request $request)
   {
       $citycompany = CompanyCities::find($request->input('city_company_id')); 
       if($citycompany)
       {
         foreach ($request->input('company_id') as $names)
         { 
           $citycompany->city_id  = $request->input('city_id');  
           $citycompany->company_id  = $names;                            
           $citycompany->updated_at     = date("Y-m-d H:i:s");         
           $citycompany->save();
         }
           
            return Redirect::back()->withMessage('Citiy Company Successfuly update.');
       } else {
           return Redirect::back()->withMessage('Citiy Company does not exits.'); 
       }
       
   }
   
   //---------------------delete city companies----------------------
   public function destroy($city_company_id)
   {
       $citycompany = CompanyCities::find($city_company_id);   
       $citycompany->delete();     
       return Redirect::back()->withMessage('Citiy Company Successfuly deleted.'); 
   }
           
   
   
   
   
}
