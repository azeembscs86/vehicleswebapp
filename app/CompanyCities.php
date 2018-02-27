<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyCities extends Model
{    
    protected $table = 'camp_company_cities';
    protected $primaryKey = 'id';
    protected $fillable   = ['city_id','company_id'];   
    protected $city_id;
    protected $company_id;
    protected $created_at;
    protected $updated_at;
    public $timestamps = false; // for false updated_at and created_at
    
    //----------------relationship with Company--------------------------
    public function companiescities() 
    {
      return $this->belongsTo('App\Companies');
    } 
    
    //----------------relationship with Cities--------------------------
    public function citiescompanies() 
    {
      return $this->belongsTo('App\Cities');
    } 
    
}
