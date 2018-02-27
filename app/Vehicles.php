<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    protected $table = 'camp_vechicle';
    protected $primaryKey = 'id';
    protected $company_id;
    protected $city_id;
    protected $season_id;
    protected $season_rate_id;
    protected $v_name;
    protected $v_person;
    protected $v_age;
    protected $v_type;
    protected $v_engine;
    protected $v_toll_fee;
    protected $v_dep_fee;
    protected $currency_id;
    protected $category_id;
    protected $equipments;
    protected $service_id;
    protected $inclusion_id;
    protected $v_images;
    protected $vehicle_pdf;
    protected $status;
    protected $is_featued;    
    protected $created_at;
    protected $updated_at;
    public $timestamps = false; // for false updated_at and created_at
    
    
    //----------------relationship with Company--------------------------
    public function company() 
    {
      return $this->belongsTo('App\Companies');
    } 
    
    //----------------relationship with Cities--------------------------
    public function city() 
    {
      return $this->belongsTo('App\Cities');
    }
    
    //----------------relationship with seasons--------------------------
    public function season() 
    {
      return $this->belongsTo('App\Seasons');
    }
    
    //----------------relationship with seasons--------------------------
    public function seasonrate() 
    {
      return $this->belongsTo('App\SeasonRates');
    }
    
    
    //------------------------------one to many relationship with Cites---------------------
    public function order() {
        return $this->hasMany('\App\BookingOrders','id');
   }
   
   //------------------------------one to one relationship with Cites---------------------
   public function currency() {
        return $this->belongsTo('App\Currencies','currency_id');
    }
}
