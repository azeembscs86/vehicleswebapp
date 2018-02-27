<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CamperPages extends Model
{
    protected $table = 'camp_pages';
    protected $primaryKey = 'id';
    protected $fillable   = ['title','meta_title','meta_tags','meta_decription','page_url','page_description'];  
    protected $title;
    protected $meta_title;
    protected $meta_tags;
    protected $meta_decription;
    protected $page_url;
    protected $page_description;
    protected $created_at;
    protected $updated_at;
    protected $status;    
    public $timestamps = false; // for false updated_at and created_at
}
