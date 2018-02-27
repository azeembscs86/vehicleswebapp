<?php
namespace App\Http\Controllers\Admin\Additionalservices;
use DB;
use Redirect;
use Auth;
use App\User;
use App\Currencies;
use App\AdditionalServices;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdditionalServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //--------------------list of all the Additional Services-------------------- 
   public function index()
   {
       $services = AdditionalServices::OrderBy('id', 'desc')->get();
       $currencies = Currencies::OrderBy('id','desc')->get();
       return view('admin.additionalservice.index',array('page_title'=>"Admin Dashboard Services",'services'=>$services,'currencies'=>$currencies));
   }
   
   //---------------------add new Additional Services ----------------------------
   public function addServices(Request $request)
   {
       if($request->get('service_name')) {      
           $service = AdditionalServices::where('name' , '=', $request->get('service_name'))->first();  //--get coupon by coupon code--//
          if($service==NULL  OR $service->name!=$request->get('service_name'))
          {    
            $service = new AdditionalServices();
            $service->currency_id  = $request->input('currency_id');
            $service->name  = $request->input('service_name');        
            $service->amount  = $request->input('amount');  
            $service->descp  = $request->input('description');  
            $service->service_charges  = $request->input('service_charges');  
            $service->created_at      = date("Y-m-d H:i:s");
            $service->updated_at     = date("Y-m-d H:i:s");
            $service->save();
            return Redirect::back()->withMessage('Additional Service Successfuly Created.'); 
          }else
          {                    
            return Redirect::back()->withMessage('Error occured Category Name Already Exists!'); 
          }
        }
   }
   
   //----------------------update update AdditionalServices-----------------------
   public function updateServices(Request $request)
   {
       $service = AdditionalServices::find($request->input('service_id'));
        if($service)
        {            
            $service->currency_id  = $request->input('currency_id');
            $service->name  = $request->input('service_name');        
            $service->amount  = $request->input('amount');          
            $service->descp  = $request->input('description');  
            $service->service_charges  = $request->input('service_charges'); 
            $service->updated_at     = date("Y-m-d H:i:s");
            $service->save();
           return Redirect::back()->withMessage('Additional Service Successfuly Updated.');
        }else
        {
           return Redirect::back()->withMessage('Error Occured Try again later.'); 
        }
   }
   
   //---------------------delete AdditionalServices-------------------------------
   public function destroy($additional_service_id)
   {
         $service = AdditionalServices::find($additional_service_id);   
         $service->delete();     
         return Redirect::back()->withMessage('Additional Service Successfuly deleted.'); 
   }
   
}
