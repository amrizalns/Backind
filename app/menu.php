<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    protected $primaryKey = 'id_menu';
    protected $fillable=[
      'status'
    ];

    public function business(){
        return $this->hasMany(business::class, 'id_menu');
    }
    public function business_picture(){
        return $this->hasMany(business_picture::class, 'id_menu');
    }
}
