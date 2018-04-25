<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\booking_detail;
use App\User;
use App\business;
use App\business_detail;
use App\transaction_payment;
use Storage;
use DB;
use JWTAuth;

class ApiTransactionController extends ApiBaseController
{
  public function __construct()
  {
      $this->middleware("jwt.auth");
  }

  public function getTickerHistory()
  {
    $paid = transaction_payment::where('status_transfer',1)->with('booking_detail')->whereHas('booking_detail',function($query){
      $query->where('id_user',Auth::user()->id_user);
    });
    $wait = transaction_payment::where('status_transfer',2)->with('booking_detail')->whereHas('booking_detail',function($query){
      $query->where('id_user',Auth::user()->id_user);
    });
    $exp = transaction_payment::where('status_transfer',3)->with('booking_detail')->whereHas('booking_detail',function($query){
      $query->where('id_user',Auth::user()->id_user);
    });
      $i = 1;
      if ($i !=null) {
        return $this->baseResponse(false, 'berhasil', [$paid->get(),$wait->get(),$exp->get()]);
      } else {
        return $this->baseResponse(true, 'null', [$paid->get(),$wait->get(),$exp->get()]);
      }
  }
}
