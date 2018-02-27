<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $table = 'camp_company';
    protected $primaryKey = 'id';
    protected $fillable   = ['company_name'];   
    protected $company_name;
    protected $company_insurance;
    protected $img_path;
    protected $created_at;
    protected $updated_at;
    public $timestamps = false; // for false updated_at and created_at
    
    
    //------------------------------one to many relationship with Seasons---------------------
    public function season() {
        return $this->hasMany('\App\Seasons','id');
   }
   
   //------------------------------one to many relationship with Cites---------------------
    public function companycity() {
        return $this->hasMany('\App\CompanyCities','id');
   }
}
