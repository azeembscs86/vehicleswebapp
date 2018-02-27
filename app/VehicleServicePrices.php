<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleServicePrices extends Model
{
    protected $table = 'camp_vehicle_services_prices';
    protected $primaryKey = 'id';
    protected $fillable   = ['service_id','vehicle_id','amount'];   
    protected $service_id;    
    protected $vehicle_id;
    protected $amount;    
    protected $created_at;
    protected $updated_at;
    public $timestamps = false; // for false updated_at and created_at
}
