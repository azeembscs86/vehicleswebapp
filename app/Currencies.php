<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currencies extends Model
{
    protected $table = 'camp_currency';
    protected $primaryKey = 'id';
    protected $fillable   = ['currency_code','currency_symbol'];   
    protected $currency_code;
    protected $currency_symbol;
    protected $created_at;
    protected $updated_at;
    public $timestamps = false; // for false updated_at and created_at
    
    public function equipment() {
        return $this->hasOne('\App\Equipments','id');
        }
        
    public function service() {
        return $this->hasOne('\App\AdditionalServices','id');
        } 
        
    public function vehicle() {
        return $this->hasOne('\App\Vehicles','id');
        } 
    
    public function season() {
        return $this->hasOne('\App\Seasons','id');
        }     
        
}
