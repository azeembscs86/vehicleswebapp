<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipments extends Model
{
    protected $table = 'camp_equipment';
    protected $primaryKey = 'id';
    protected $fillable   = ['currency_id','name','amount'];   
    protected $currency_id;
    protected $name;
    protected $amount;
    protected $equipment_charges;
    protected $descp;
    protected $created_at;
    protected $updated_at;
    public $timestamps = false; // for false updated_at and created_at
    
    public function currency() {
        return $this->belongsTo('App\Currencies','currency_id');
    }
}
