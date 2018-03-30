<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\menu;
use App\business_detail;
use App\booking_detail;

class business extends Model
{
    protected $primaryKey = 'id_business';
    protected $fillable = [
      'id_menu',
      'id_business_details',
      'id_city',
      'business_status',
      'id_user'
    ];

    public function menu(){
        return $this->belongsTo('App\menu', 'id_menu','id_menu');
    }

    public function user(){
        return $this->belongsTo('App\User','id_user','id_user');
    }

    public function business_details(){
        return $this->belongsTo('App\business_detail','id_business_details','id_business_details');
    }
    public function city(){
        return $this->belongsTo('App\city','id_city','id_city');
    }
    public function booking_tourism(){
      return $this->belongsTo('App\booking_detail','id_business','id_tourism');
    }
    public function booking_homestay(){
      return $this->belongsTo('App\booking_detail','id_business','id_homestay');
    }
}
