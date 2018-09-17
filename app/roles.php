<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    protected $primaryKey = 'id_roles';
    protected $table = 'roles';
    protected $fillable=[
      'id_roles',
      'status'
    ];

    public function user(){
      return $this->hasOne(User::class, 'id_roles');
    }
}
