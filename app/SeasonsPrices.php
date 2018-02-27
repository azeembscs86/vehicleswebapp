<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeasonsPrices extends Model
{
    protected $table = 'camp_season_company_rates';
    protected $primaryKey = 'id';
    protected $fillable   = ['company_id','city_id','season_id','season_name','start_date','end_date'];   
    protected $company_id;
    protected $city_id;
    protected $season_id;
    protected $season_name;
    protected $start_date;
    protected $end_date;
    protected $created_at;
    protected $updated_at;
    public $timestamps = false; // for false updated_at and created_at
}
