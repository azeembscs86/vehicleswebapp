<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleEquipmentPrices extends Model
{
    protected $table = 'camp_vehicle_equipment_prices';
    protected $primaryKey = 'id';
    protected $fillable   = ['equipment_id','vehicle_id','amount'];   
    protected $equipment_id;    
    protected $vehicle_id;
    protected $amount;    
    protected $created_at;
    protected $updated_at;
    public $timestamps = false; // for false updated_at and created_at
    
}
