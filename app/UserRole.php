<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = 'user_roles';
    protected $primaryKey = 'role_id';
    protected $fillable   = ['role_id','name'];
    protected $role_id = 1;
    protected $name;
    protected $created_at;
    protected $updated_at;
    public $timestamps = false; // for false updated_at and created_at
    
    public function user() {
      return $this->hasMany('\App\UserRole','role_id');
    }
}
