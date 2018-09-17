<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class booking_detail extends Model
{
    protected $primaryKey = 'id_booking';
    protected $fillable = [
      'id_tourism',
      'id_homestay',
      'id_user',
      'checkin',
      'checkout',
      'checkin_tourism',
      'total_ticket',
      'total_cost',
      'duedate'
    ];

public function tourism(){
  return $this->belongsTo(business::class, 'id_tourism', 'id_business');
}
public function homestay(){
  return $this->belongsTo(business::class, 'id_homestay', 'id_business');
}
public function transaction_payment(){
  return $this->hasOne(transaction_payment::class, 'id_booking');
}
public function user(){
    return $this->belongsTo(User::class, 'id_user');
}
}
