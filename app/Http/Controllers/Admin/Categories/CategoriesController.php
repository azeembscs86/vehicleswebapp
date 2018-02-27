<?php

namespace App\Http\Controllers\Admin\Categories;
use DB;
use Redirect;
use Auth;
use App\User;
use App\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

//--------------------list of all the Categories-------------------- 
   public function index()
   {
       $categories = Categories::OrderBy('id', 'desc')->get();           
       return view('admin.categories.index',array('page_title'=>"Admin Dashboard Categories",'categories'=>$categories));
   }
   
   //---------------------add new Category----------------------------
   public function addCategory(Request $request)
   {
       if($request->get('category_name')) {      
           $category = Categories::where('category_name' , '=', $request->get('category_name'))->first();  //--get coupon by coupon code--//
          if($category==NULL  OR $category->category_name!=$request->get('category_name'))
          {    
            $category = new Categories();
            $category->category_name  = $request->input('category_name');        
            $category->created_at      = date("Y-m-d H:i:s");
            $category->updated_at     = date("Y-m-d H:i:s");
            $category->save();
            return Redirect::back()->withMessage('Category Successfuly Created.'); 
          }else
          {                    
            return Redirect::back()->withMessage('Error occured Category Name Already Exists!'); 
          }
        }
   }
   
   //----------------------update update Category-----------------------
   public function updateCategory(Request $request)
   {
       $category = Categories::find($request->input('city_id'));
        if($category)
        {            
            $category->category_name  = $request->input('category_name');        
            $category->updated_at     = date("Y-m-d H:i:s");
            $category->save();
           return Redirect::back()->withMessage('Category Successfuly Updated.');
        }else
        {
           return Redirect::back()->withMessage('Error Occured Try again later.'); 
        }
   }
   
   //---------------------delete Category-------------------------------
   public function destroy($city_id)
   {
         $category = Categories::find($city_id);   
         $category->delete();     
         return Redirect::back()->withMessage('Category Successfuly deleted.'); 
   }
   
   
}
