<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
  protected $primaryKey='id_city';
  protected $fillable=[
    'city'
  ];

  public function business(){
      return $this->hasMany(business::class, 'id_city');
  }
}
