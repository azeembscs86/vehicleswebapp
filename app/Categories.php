<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'camp_category';
    protected $primaryKey = 'id';
    protected $fillable   = ['category_name'];   
    protected $category_name;
    protected $created_at;
    protected $updated_at;
    public $timestamps = false; // for false updated_at and created_at
}
