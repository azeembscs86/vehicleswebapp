<?php

namespace App\Http\Controllers\Admin\Vehicles;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Cities;
use App\Companies;
use App\Seasons;
use App\SeasonRates;
use App\Vehicles;
use App\Currencies;
use App\Categories;
use App\Inclusions;
use App\Equipments;
use App\AdditionalServices;
use App\SeasonsPrices;
use App\VehicleEquipmentPrices;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VehiclesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //-----------------------list of all vehicles--------------------------
    public function index()
    {
        $vehicles = Vehicles::OrderBy('id','desc')->get();
        return view('admin.vehicles.index',array('page_title'=>"Admin Dashboard Vehicles",'vehicles'=>$vehicles)); 
    }
    //---------------------------view vehicle detail-----------------------
    public function viewVehicle($vehicle_id)
    {
       $vehicle = Vehicles::find($vehicle_id);
       return view('admin.vehicles.viewvehicle',array('page_title'=>"Admin Dashboard Vehicles",'vehicle'=>$vehicle));
    }
    //-------------------------create New Vehicle Form--------------------
    public function createVehichle()
    {
        $cities    = Cities::OrderBy('id','desc')->get();
        $currencies   = Currencies::OrderBy('id','desc')->get();
        $categories   = Categories::OrderBy('id','desc')->get();
        $inclusion    = Inclusions::OrderBy('id','desc')->get();
        $equiments    = Equipments::OrderBy('id','desc')->get();
        $services     = AdditionalServices::OrderBy('id','desc')->get();
        return view('admin.vehicles.create',array('page_title'=>"Admin Dashboard Create Vehicles",'cities'=>$cities,'currencies'=>$currencies,'categories'=>$categories,'inclusions'=>$inclusion,'equiments'=>$equiments,'services'=>$services));
    }
    //------------------------save vehicle in database-------------------
    public function create(Request $request)
    {   
        $vehicle = new Vehicles();        
            $uploadfiles_name = $request->input("uploadfiles_name");
            $remove_file_arr = explode(",",$uploadfiles_name);
            if ( Input::hasFile('sample_logos') ):
            $file = Input::file();
                for ($j=0; $j < count($file['sample_logos']); $j++) { 
                    $sample_images_name_arr[] = $file['sample_logos'][$j]->getClientOriginalName();
                } 
            if(count($remove_file_arr) > 0){
              for ($i=0; $i < count($file['sample_logos']) ; $i++) {
                   $sample_images_name = $file['sample_logos'][$i]->getClientOriginalName();
                   if(in_array($sample_images_name_arr[$i], $remove_file_arr)){
                      //echo 'Delete Files '.$sample_images_name.'<br>';
                   }else{
                      $destinationPath = $file['sample_logos'][$i];  
                      $image_path ="public/uploads/vehicles/".$sample_images_name;  
                      move_uploaded_file($destinationPath, $image_path); 
                      $sample_images_arr[] = $sample_images_name;
                   }
              }
           }else{
               for ($i=0; $i < count($file['sample_logos']) ; $i++) {
                   $sample_images_name = $file['sample_logos'][$i]->getClientOriginalName();
                   $destinationPath = $file['sample_logos'][$i];  
                   $image_path ="public/uploads/vehicles/".$sample_images_name;  
                   move_uploaded_file($destinationPath, $image_path); 
                   $sample_images_arr[] = $sample_images_name;
               }
           }
      endif;
          if($request->file('vehicle_pdf'))
          {
           $image1 = $request->file('vehicle_pdf');            
           $name1 = time().'.'.$image1->getClientOriginalExtension();
           $image_path1 ="uploads/vehicles-pdf/".$name1;             
           $vehicle->v_name             = $request->input('vehicle_title');
           $vehicle->company_id         = $request->input('company_id');
           $vehicle->city_id            = $request->input('city_id');
           $vehicle->season_id          = $request->input('season_id');           
           $vehicle->v_person           = $request->input('suitable_for');
           $vehicle->v_age              = $request->input('vehicle_age');
           $vehicle->v_type             = $request->input('vehicle_type');
           $vehicle->v_engine           = $request->input('engine_size');
           $vehicle->v_toll_fee         = $request->input('toll_fee');
           $vehicle->v_dep_fee          = $request->input('deployment_fee');
           $vehicle->currency_id        = $request->input('currency_id');
           $vehicle->category_id        = $request->input('category') ? implode(",",$request->input('category')) :'' ;
           $vehicle->equipments         = $request->input('equipment') ? implode(",",$request->input('equipment')) :'' ;
           $vehicle->service_id         = $request->input('service') ? implode(",",$request->input('service')) :'' ;
           $vehicle->inclusion_id       = $request->input('inclusion') ? implode(",",$request->input('inclusion')):'';
           $vehicle->status             = 1;
           $vehicle->is_featured         = $request->input('is_featued');         
           $vehicle->created_at         = date("Y-m-d H:i:s");
           $vehicle->updated_at         = date("Y-m-d H:i:s");
           $vehicle->v_images           = Input::hasFile('sample_logos') ? implode(",",$sample_images_arr) : '';
           $vehicle->vehicle_pdf        = $request->file('vehicle_pdf') ? $image_path1 : '';
           $vehicle->save();
           $destinationPath1 = public_path('/uploads/vehicles-pdf');   
           $image1->move($destinationPath1, $name1);
           return redirect('admin/vehicles')->withMessage('Vehicle Successfully Added');
          }else
          {         
           $vehicle->v_name             = $request->input('vehicle_title');
           $vehicle->company_id         = $request->input('company_id');
           $vehicle->city_id            = $request->input('city_id');
           $vehicle->season_id          = $request->input('season_id');           
           $vehicle->v_person           = $request->input('suitable_for');
           $vehicle->v_age              = $request->input('vehicle_age');
           $vehicle->v_type             = $request->input('vehicle_type');
           $vehicle->v_engine           = $request->input('engine_size');
           $vehicle->v_toll_fee         = $request->input('toll_fee');
           $vehicle->v_dep_fee          = $request->input('deployment_fee');
           $vehicle->currency_id        = $request->input('currency_id');
           $vehicle->category_id        = $request->input('category') ? implode(",",$request->input('category')) :'' ;
           $vehicle->equipments         = $request->input('equipment') ? implode(",",$request->input('equipment')) :'' ;
           $vehicle->service_id         = $request->input('service') ? implode(",",$request->input('service')) :'' ;
           $vehicle->inclusion_id       = $request->input('inclusion') ? implode(",",$request->input('inclusion')):'';
           $vehicle->status             = 1;
           $vehicle->is_featured         = $request->input('is_featued');         
           $vehicle->created_at         = date("Y-m-d H:i:s");
           $vehicle->updated_at         = date("Y-m-d H:i:s");
           $vehicle->v_images           = Input::hasFile('sample_logos') ? implode(",",$sample_images_arr) : '';
           $vehicle->vehicle_pdf        = Null;
           $vehicle->save();
           return redirect('admin/vehicles')->withMessage('Vehicle Successfully Added');
          }
       
        
    }
    
    //--------------------update season form----------------------------
    public function updateVehicle($vehicle_id)
    {
        $vehicle      = Vehicles::find($vehicle_id);
        $cities       = Cities::OrderBy('id','desc')->get();
        $companies    = Companies::OrderBy('id','desc')->get();
        $seasons      = Seasons::OrderBy('id','desc')->get();
        $seasonrates  = SeasonsPrices::OrderBy('id','desc')->get();
        $currencies   = Currencies::OrderBy('id','desc')->get();
        $categories   = Categories::OrderBy('id','desc')->get();
        $inclusion    = Inclusions::OrderBy('id','desc')->get();
        $equiments    = Equipments::OrderBy('id','desc')->get();
        $services     = AdditionalServices::OrderBy('id','desc')->get();
        $vehicleimage = explode(',', $vehicle->v_images);     
        $vehicleequipment = explode(',', $vehicle->equipments);    
        $vehicleinclusion = explode(',', $vehicle->inclusion_id);
        $vehicleservices = explode(',', $vehicle->service_id);
        $vehiclecategories = explode(',', $vehicle->category_id);
        return view('admin.vehicles.edit',array('page_title'=>"Admin Dashboard Update Vehicles",'cities'=>$cities,'vehicle'=>$vehicle,'companies'=>$companies,'seasons'=>$seasons,'seasonrates'=>$seasonrates,'services'=>$services,'equiments'=>$equiments,'inclusions'=>$inclusion,'categories'=>$categories,'currencies'=>$currencies,'vehicleimages'=>$vehicleimage,'vehicleequipments'=>$vehicleequipment,'vehicleinclusions'=>$vehicleinclusion,'vehicleservices'=>$vehicleservices,'vehiclecategories'=>$vehiclecategories));
        
    }
    //---------------------save updated in database----------------------
    public function update(Request $request)
    {
       
        $vehicle      = Vehicles::find($request->input('vehicle_id'));
        if($vehicle)
        {
        $uploadfiles_name = $request->input("uploadfiles_name");
        $remove_file_arr = explode(",",$uploadfiles_name);
      if (Input::hasFile('sample_logos')){
            $file = Input::file();
           for ($j=0; $j < count($file['sample_logos']); $j++) { 
              $sample_images_name_arr[] = $file['sample_logos'][$j]->getClientOriginalName();
            } 
           if(count($remove_file_arr) > 0){
              for ($i=0; $i < count($file['sample_logos']) ; $i++) {
                   $sample_images_name = $file['sample_logos'][$i]->getClientOriginalName();
                   if(in_array($sample_images_name_arr[$i], $remove_file_arr)){
                      //echo 'Delete Files '.$sample_images_name.'<br>';
                   }else{
                      $destinationPath = $file['sample_logos'][$i];  
                      $image_path ="public/uploads/vehicles/".$sample_images_name;  
                      move_uploaded_file($destinationPath, $image_path); 
                      $sample_images_arr[] = $sample_images_name;
                   }
              }
           }else{
               for ($i=0; $i < count($file['sample_logos']) ; $i++) {
                   $sample_images_name = $file['sample_logos'][$i]->getClientOriginalName();
                   $destinationPath = $file['sample_logos'][$i];  
                   $image_path ="public/uploads/vehicles/".$sample_images_name;  
                   move_uploaded_file($destinationPath, $image_path); 
                   $sample_images_arr[] = $sample_images_name;
               }
           }
        }
        
           if($request->file('vehicle_pdf'))
           {
           $image1 = $request->file('vehicle_pdf');            
           $name1 = time().'.'.$image1->getClientOriginalExtension();
           $image_path1 ="uploads/vehicles-pdf/".$name1;      
           
           $vehicle->v_name             = $request->input('vehicle_title');
           $vehicle->company_id         = $request->input('company_id');
           $vehicle->city_id            = $request->input('city_id');
           $vehicle->season_id          = $request->input('season_id');           
           $vehicle->v_person           = $request->input('suitable_for');
           $vehicle->v_age              = $request->input('vehicle_age');
           $vehicle->v_type             = $request->input('vehicle_type');
           $vehicle->v_engine           = $request->input('engine_size');
           $vehicle->v_toll_fee         = $request->input('toll_fee');
           $vehicle->v_dep_fee          = $request->input('deployment_fee');
           $vehicle->currency_id        = $request->input('currency_id');
           $vehicle->is_featured         = $request->input('is_featued');
           $vehicle->category_id        = $request->input('category') ? implode(",",$request->input('category')) : $vehicle->category_id  ;
           $vehicle->equipments         = $request->input('equipment') ? implode(",",$request->input('equipment')) :$vehicle->equipments  ;
           $vehicle->service_id         = $request->input('service') ? implode(",",$request->input('service')) : $vehicle->service_id    ;
           $vehicle->inclusion_id       = $request->input('inclusion') ? implode(",",$request->input('inclusion')):$vehicle->inclusion_id ;
           $vehicle->updated_at         = date("Y-m-d H:i:s");
           $vehicle->v_images           = Input::hasFile('sample_logos') ? implode(",",$sample_images_arr) : $vehicle->v_images;
           $vehicle->vehicle_pdf        = $request->file('vehicle_pdf') ? $image_path1 : $vehicle->vehicle_pdf;
           $vehicle->save();
           $destinationPath1 = public_path('/uploads/vehicles-pdf');   
           $image1->move($destinationPath1, $name1);
           return redirect('admin/vehicles')->withMessage('Vehicle Successfully updated');
           }else
           {
               $vehicle->v_name             = $request->input('vehicle_title');
           $vehicle->company_id         = $request->input('company_id');
           $vehicle->city_id            = $request->input('city_id');
           $vehicle->season_id          = $request->input('season_id');           
           $vehicle->v_person           = $request->input('suitable_for');
           $vehicle->v_age              = $request->input('vehicle_age');
           $vehicle->v_type             = $request->input('vehicle_type');
           $vehicle->v_engine           = $request->input('engine_size');
           $vehicle->v_toll_fee         = $request->input('toll_fee');
           $vehicle->v_dep_fee          = $request->input('deployment_fee');
           $vehicle->currency_id        = $request->input('currency_id');
           $vehicle->is_featured         = $request->input('is_featued');
           $vehicle->category_id        = $request->input('category') ? implode(",",$request->input('category')) : $vehicle->category_id  ;
           $vehicle->equipments         = $request->input('equipment') ? implode(",",$request->input('equipment')) :$vehicle->equipments  ;
           $vehicle->service_id         = $request->input('service') ? implode(",",$request->input('service')) : $vehicle->service_id    ;
           $vehicle->inclusion_id       = $request->input('inclusion') ? implode(",",$request->input('inclusion')):$vehicle->inclusion_id ;
           $vehicle->updated_at         = date("Y-m-d H:i:s");
           $vehicle->v_images           = Input::hasFile('sample_logos') ? implode(",",$sample_images_arr) : $vehicle->v_images;
           $vehicle->vehicle_pdf        = " ";
           $vehicle->save();
           return redirect('admin/vehicles')->withMessage('Vehicle Successfully updated');
           }
        } else {
            return redirect('admin/vehicles')->withError('Vehicle does not exits');
        }
        
        
    }
    //---------------------delete vehicle--------------------------------
    public function destroy($vehicle_id)
    {
        $vehicle = Vehicles::find($vehicle_id);   
        $vehicle->delete();     
        return Redirect::back()->withMessage('Vehicle Successfuly deleted.');
    }
    
    //--------------------------get companies by city--------------------
    public function getCompaniesByCity(Request $request)
    {
        $city_id = $request->input('city_id');
        print_r($city_id);
    }
    
    //---------------------get Season by Companies----------------------
    public function getSeasonByCompanies(Request $request)
    {
        $company_id = $request->input('company_id');
        $seasons = DB::table('camp_season')            
            ->join('camp_company', 'camp_company.id', '=', 'camp_season.company_id')
            ->select('camp_season.id','camp_season.season_name','camp_season.company_id','camp_company.company_name')->where('camp_season.company_id','=',$company_id)
            ->get();   
      if($seasons)
      {
          return response()->json($seasons);
      }else
      {
          return '';
      }
        
    }
    
    //------------------------get seasons rates by season---------------
    public function getSeasonRatesBySeason(Request $request)
    {
        $season_id = $request->input('season_id');
        $seasons = DB::table('camp_season')            
            ->join('camp_season_company_rates', 'camp_season.id', '=', 'camp_season_company_rates.season_id')
            ->select('camp_season_company_rates.id','camp_season_company_rates.season_name','camp_season_company_rates.season_rate')->where('camp_season_company_rates.season_id','=',$season_id)
            ->get();   
      if($seasons)
      {
          return response()->json($seasons);
      }else
      {
          return '';
      }
    }
    
}
