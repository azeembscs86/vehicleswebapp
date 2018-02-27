<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inclusions extends Model
{
    protected $table = 'camp_inclusions';
    protected $primaryKey = 'id';
    protected $fillable   = ['name'];   
    protected $name;   
    protected $descp;
    protected $created_at;
    protected $updated_at;
    public $timestamps = false; // for false updated_at and created_at
}
