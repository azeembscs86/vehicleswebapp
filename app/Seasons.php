<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seasons extends Model
{
    protected $table = 'camp_season';
    protected $primaryKey = 'id';
    protected $fillable   = ['company_id','season_name','amount','currency_id','start_date','end_date'];   
    protected $company_id;
    protected $city_id;
    protected $season_name;
    protected $amount;
    protected $season_charges;
    protected $currency_id;
    protected $start_date;
    protected $end_date;
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
    
    public function currency() {
        return $this->belongsTo('App\Currencies','currency_id');
    }
    
}
