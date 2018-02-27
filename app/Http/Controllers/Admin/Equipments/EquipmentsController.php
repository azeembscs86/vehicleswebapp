<?php

namespace App\Http\Controllers\Admin\Equipments;
use DB;
use Redirect;
use Auth;
use App\User;
use App\Currencies;
use App\Equipments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EquipmentsController extends Controller
{    
   public function __construct()
   {
        $this->middleware('auth');
   }
 
   //--------------------list of all the Equipment-------------------- 
   public function index()
   {
       $equipment  = Equipments::OrderBy('id', 'desc')->get();  
       $currencies = Currencies::OrderBy('id','desc')->get();
       return view('admin.equipments.index',array('page_title'=>"Admin Dashboard Equipments",'equipments'=>$equipment,'currencies'=>$currencies));
   }
   
   //---------------------add new Equipment----------------------------
   public function addEquipment(Request $request)
   {
       if($request->get('equipment_name')) {      
           $equipment = Equipments::where('name' , '=', $request->get('equipment_name'))->first();  //--get coupon by coupon code--//
          if($equipment==NULL  OR $equipment->name !=$request->get('equipment_name'))
          {    
            $equipment = new Equipments();
            $equipment->currency_id  = $request->input('currency_id');
            $equipment->name  = $request->input('equipment_name');  
            $equipment->amount  = $request->input('amount');  
            $equipment->equipment_charges  = $request->input('euipment_charges');
            $equipment->descp  = $request->input('description');
            $equipment->created_at      = date("Y-m-d H:i:s");
            $equipment->updated_at     = date("Y-m-d H:i:s");
            $equipment->save();
            return Redirect::back()->withMessage('Equipment Successfuly Created.'); 
          }else
          {                    
            return Redirect::back()->withMessage('Error occured Category Name Already Exists!'); 
          }
        }
   }
   
   //----------------------update update Equipment-----------------------
   public function updateEquipment(Request $request)
   {
       $equipment = Equipments::find($request->input('equipment_id'));
        if($equipment)
        {   
            $equipment->currency_id  = $request->input('currency_id');
            $equipment->name  = $request->input('equipment_name');  
            $equipment->amount  = $request->input('amount');       
            $equipment->equipment_charges  = $request->input('euipment_charges');
            $equipment->descp  = $request->input('description');
            $equipment->updated_at     = date("Y-m-d H:i:s");
            $equipment->save();
           return Redirect::back()->withMessage('Equipment Successfuly Updated.');
        }else
        {
           return Redirect::back()->withMessage('Error Occured Try again later.'); 
        }
   }
   
   //---------------------delete Equipment-------------------------------
   public function destroy($equipment_id)
   {
       $category = Equipments::find($equipment_id);   
       $category->delete();     
       return Redirect::back()->withMessage('Equipment Successfuly deleted.'); 
   }
}
