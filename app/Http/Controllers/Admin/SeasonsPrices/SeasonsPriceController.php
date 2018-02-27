<?php
namespace App\Http\Controllers\Admin\SeasonsPrices;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\SeasonsPrices;
use Auth;
use App\Companies;
use App\Cities;
use App\Seasons;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeasonsPriceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //--------------------------------------get season rate list-------------------------------
    public function index()
    {
        $seasonrates  = SeasonsPrices::OrderBy('id','desc')->get();
        return view('admin.seasonsprices.index',array('page_title'=>"Admin Dashboard Seasons",'seasonrates'=>$seasonrates));
    }
    
    //--------------------------------------add new season rate form----------------------------
    public function addSeasonRate()
    {
        $cities    = Cities::OrderBy('id','desc')->get();
        return view('admin.seasonsprices.create',array('page_title'=>"Admin Dashboard Create Season Rates",'cities'=>$cities));
    }
    
    //-------------------------------------save season rate n database-------------------------
    public function create(Request $request)
    {
       $seasonrates = new SeasonsPrices();
       $seasonrates->city_id         = $request->input('city_id');
       $seasonrates->company_id      = $request->input('company_id');
       $seasonrates->season_id      = $request->input('season_id');
       $seasonrates->season_name     = $request->input('season_name');
       $seasonrates->start_date      = date("Y-m-d H:i:s", strtotime($request->input('start_date')));
       $seasonrates->end_date        = date("Y-m-d H:i:s", strtotime($request->input('end_date')));
       $seasonrates->season_rate     = $request->input('season_rate');
       $seasonrates->created_at      = date("Y-m-d H:i:s");
       $seasonrates->updated_at      = date("Y-m-d H:i:s");
       $seasonrates->save();
       return redirect('admin/seasons-rates')->withMessage('Season Rate Successfuly Created.');   
    }
    
    
    //--------------------------update Season form--------------------------
   public function updateSeasonRates($season_rate_id)
   {
       $seasonrates    = SeasonsPrices::find($season_rate_id);
       $cities         = Cities::OrderBy('id','desc')->get();
       $companies      = Companies::OrderBy('id','desc')->get();
       $seasons        = Seasons::OrderBy('id','desc')->get();
       return view('admin.seasonsprices.edit',array('page_title'=>"Admin Dashboard Edit Season rates",'cities'=>$cities,'companies'=>$companies,'seasonrates'=>$seasonrates,'seasons'=>$seasons));
       
   }
    
   //------------------------------update in database-------------------------
   public function update(Request $request)
   {
       $seasonrates = SeasonsPrices::find($request->input('season_rate_id'));
       if($seasonrates)
       {
           $seasonrates->city_id         = $request->input('city_id');
           $seasonrates->company_id      = $request->input('company_id');
           $seasonrates->season_id      = $request->input('season_id');
           $seasonrates->season_name     = $request->input('season_name');
           $seasonrates->start_date      = date("Y-m-d H:i:s", strtotime($request->input('start_date')));
           $seasonrates->end_date        = date("Y-m-d H:i:s", strtotime($request->input('end_date')));
           $seasonrates->season_rate     = $request->input('season_rate');
           $seasonrates->updated_at      = date("Y-m-d H:i:s");
           $seasonrates->save();
           return redirect('admin/seasons-rates')->withMessage('Season Rate Successfuly updated.');   
       }else
       {
           return redirect('admin/seasons-rates')->withErrors('Season Reate does not exists.');    
       }
       
   }
    
    
    
    
    
    //------------------------get companies by cities--------------------
   public function getCompaniesByCity(Request $request)
   {
       $city_id = $request->input('city_id');
       $companies = DB::table('camp_company_cities')
            ->join('camp_city', 'camp_city.id', '=', 'camp_company_cities.city_id')
            ->join('camp_company', 'camp_company.id', '=', 'camp_company_cities.company_id')
            ->select('camp_company_cities.id','camp_company_cities.city_id','camp_company_cities.company_id', 'camp_city.city_name', 'camp_company.company_name')->where('camp_company_cities.city_id','=',$city_id)
            ->get();   
      if($companies)
      {
          return response()->json($companies);
      }else
      {
          return '';
      }
       
       
   }
   
   
   public function getCompaniesCity(Request $request)
   {
      $city_id = $request->input('city_id');
       $companies = DB::table('camp_company_cities')
            ->join('camp_city', 'camp_city.id', '=', 'camp_company_cities.city_id')
            ->join('camp_company', 'camp_company.id', '=', 'camp_company_cities.company_id')
            ->select('camp_company_cities.id','camp_company_cities.city_id','camp_company_cities.company_id', 'camp_city.city_name', 'camp_company.company_name')->where('camp_company_cities.city_id','=',$city_id)
            ->get();   
      if($companies)
      {
          return response()->json($companies);
      }else
      {
          return '';
      }
   }
   
   
   public function getCompaniesSeasons(Request $request)
   {
       $company_id = $request->input('company_id');
       $season = DB::table('camp_season')           
            ->join('camp_company', 'camp_company.id', '=', 'camp_season.company_id')
            ->select('camp_season.id','camp_season.season_name')->where('camp_season.company_id','=',$company_id)
            ->get(); 
       if($season)
       {
          return response()->json($season);
       }else
       {
          return '';
       }
    }
}
