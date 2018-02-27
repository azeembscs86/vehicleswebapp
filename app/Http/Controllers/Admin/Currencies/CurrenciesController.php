<?php

namespace App\Http\Controllers\Admin\Currencies;

use DB;
use Redirect;
use Auth;
use App\User;
use App\Currencies;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CurrenciesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
   //--------------------list of all the currency-------------------- 
   public function index()
   {
       $currencies = Currencies::latest('id', 'desc')->get();
       return view('admin.currencies.index',array('page_title'=>"Admin Dashboard Currencies",'currencies'=>$currencies));
   }
   
   //---------------------add new currency----------------------------
   public function addCurrency(Request $request)
   {
       if($request->get('currency_code')) {      
           $currency = Currencies::where('currency_code' , '=', $request->get('currency_code'))->first();  //--get coupon by coupon code--//
          if($currency==NULL  OR $currency->currency_code !=$request->get('currency_code'))
          {    
            $currency = new Currencies();
            $currency->currency_code  = $request->input('currency_code');  
            $currency->currency_symbol  = $request->input('currency_symbol');  
            $currency->created_at      = date("Y-m-d H:i:s");
            $currency->updated_at     = date("Y-m-d H:i:s");
            $currency->save();
            return Redirect::back()->withMessage('Equipment Successfuly Created.'); 
          }else
          {                    
            return Redirect::back()->withMessage('Error occured Category Name Already Exists!'); 
          }
        }
   }
   
   //----------------------update update currency-----------------------
   public function updateCurrency(Request $request)
   {
       $currency = Currencies::find($request->input('currency_code_id'));
        if($currency)
        {            
            $currency->currency_code  = $request->input('currency_code');  
            $currency->currency_symbol  = $request->input('currency_symbol');     
            $currency->updated_at     = date("Y-m-d H:i:s");
            $currency->save();
           return Redirect::back()->withMessage('Currency Successfuly Updated.');
        }else
        {
           return Redirect::back()->withMessage('Error Occured Try again later.'); 
        }
   }
   
   //---------------------delete currency-------------------------------
   public function destroy($currency_id)
   {
       $currency = Currencies::find($currency_id);   
       $currency->delete();     
       return Redirect::back()->withMessage('Currency Successfuly deleted.');
   }
}
