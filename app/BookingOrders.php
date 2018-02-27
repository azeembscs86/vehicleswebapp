<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingOrders extends Model
{
    protected $table = 'camp_vechicle_booking';
    protected $primaryKey = 'id';
    protected $fillable   = ['vechicle_id'];   
    protected $equipment_id;    
    protected $vehicle_id;
    protected $services;
    protected $equipments;
    protected $totl_amount;
    protected $salutation;
    protected $f_name;
    protected $l_name;
    protected $dob;
    protected $address;
    protected $post_code;
    protected $city;
    protected $country;
    protected $phone;
    protected $email;
    protected $other_contacts;
    protected $status;    
    protected $created_at;
    protected $updated_at;
    public $timestamps = false; // for false updated_at and created_at
    
    
    //----------------relationship with Company--------------------------
    public function vehicle() 
    {
      return $this->belongsTo('App\Vehicles');
    } 
}