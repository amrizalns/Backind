<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api;
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
    $paid = transaction_payment::where('status_transfer',1)->with('booking_detail','booking_detail.tourism.business_details','booking_detail.homestay.business_details','booking_detail.user')->whereHas('booking_detail',function($query){
      $query->where('id_user',Auth::user()->id_user);
    });
    $wait = transaction_payment::where('status_transfer',2)->with('booking_detail','booking_detail.tourism.business_details','booking_detail.homestay.business_details','booking_detail.user')->whereHas('booking_detail',function($query){
      $query->where('id_user',Auth::user()->id_user);
    });
    $exp = transaction_payment::where('status_transfer',3)->with('booking_detail','booking_detail.tourism.business_details','booking_detail.homestay.business_details','booking_detail.user')->whereHas('booking_detail',function($query){
      $query->where('id_user',Auth::user()->id_user);
    });
      $i = 1;
      if ($i !=null) {
        return $this->baseResponse(false, 'berhasil', [$paid->get(),$wait->get(),$exp->get()]);
      } else {
        return $this->baseResponse(true, 'null', [$paid->get(),$wait->get(),$exp->get()]);
      }
  }

  public function uploadBukti(Request $request, transaction_payment $transaction_payment)
  {
    $this->validate($request, [
        'bukti_transfer' => 'required|mimes:png,jpg,jpeg|max:5120',
    ]);

    $transaction_payment = transaction_payment::find($request->id_transaksi);
    $path = $request->bukti_transfer->store('bukti_tf','public');

    $transaction_payment->tgl_transfer = date("Y-m-d H:i:s", strtotime('+7 hours'));
    $transaction_payment->bukti_transfer = $path;

    if ($transaction_payment->save()){
        return $this->baseResponse(false, 'berhasil', $transaction_payment);
    } else {
        return $this->baseResponse(true, 'gagal membuat review', $transaction_payment);
    }

    // return redirect(route('invoice_final',['id_booking'=>$request->id_transaksi]));
  }
}
