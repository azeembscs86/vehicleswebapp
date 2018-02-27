<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdditionalServices extends Model
{
    protected $table = 'camp_additional_services';
    protected $primaryKey = 'id';
    protected $fillable   = ['currency_id','name','amount','service_charges'];  
    protected $currency_id;
    protected $name;
    protected $amount;
    protected $service_charges;
    protected $created_at;
    protected $updated_at;
    public $timestamps = false; // for false updated_at and created_at
    
    public function currency() {
        return $this->belongsTo('App\Currencies','currency_id');
    }
}
