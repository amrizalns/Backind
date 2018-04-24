<?php

namespace App\Http\Controllers\Api;

use App\booking_detail;
use App\User;
use App\business;
use App\business_detail;
use App\transaction_payment;
use App\Mail\Invoice;
use Auth;
use Storage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiBaseController;

class ApiBookingController extends ApiBaseController
{
  public function store(Request $request)
  {
    $homestay_data = business_detail::find($request->input('homestay'));
    $tourism_data = business_detail::find($request->input('tourism'));

    $total_price = 0;
    if ($request->input('tourism') && $request->input('homestay')) {
      $total_price = $request->input('total_ticket') * ($homestay_data->business_price + $tourism_data->business_price);
    }else if ($request->input('tourism')) {
      $total_price = $request->input('total_ticket') * ($tourism_data->business_price);
    }else if ($request->input('homestay')) {
      $total_price = $request->input('total_ticket') * ($homestay_data->business_price);
    }

    if ($request->input('tourism')) {
      //$tourism = $tourism_data->business_price;
      $duedate = date("Y-m-d H:i:s", strtotime('+10 hours'));

      $id_booking = booking_detail::create([
        'id_tourism' => $request->input('tourism'),
        'id_homestay' => $request->input('homestay'),
        'id_user' => Auth::user()->id_user,
        'checkin' => $request->input('checkin'),
        'checkout' => $request->input('checkout'),
        'checkin_tourism' => $request->input('checkin_tourism'),
        'total_ticket' => $request->input('total_ticket'),
        'total_cost' => $total_price,
        'duedate' => $duedate

      ]);

    }else{

      // $homestay = $homestay_data->business_price;
      $duedate = date("Y-m-d H:i:s", strtotime('+10 hours'));

      $id_booking = booking_detail::create([
        'id_homestay' => $request->input('homestay'),
        'id_user' => Auth::user()->id_user,
        'checkin' => $request->input('checkin'),
        'checkout' => $request->input('checkout'),
        'checkin_tourism' => $request->input('checkin_tourism'),
        'total_ticket' => $request->input('total_ticket'),
        'total_cost' => $total_price,
        'duedate' => $duedate
      ]);
    }

    transaction_payment::create([
      'id_booking' => $id_booking->id_booking
    ]);

    if ($id_booking->save()) {
      return $this->baseResponse(false, 'berhasil', null);
    } else {
      return $this->baseResponse(true, 'gagal membuat booking', null);
    }
    //return response()->json($id_booking);
    //return redirect(route('invoice', ['booking_detail'=>$id_booking]));
  }

  public function updateCost(booking_detail $booking_detail)
  {
    $total_cost = $booking_detail->total_cost - ($booking_detail->id_booking+100);
    $booking_detail->total_cost = $total_cost;
    $hasil = ['id_booking'=>$booking_detail];

    if ($booking_detail->save()) {
      return $this->baseResponse(false, 'berhasil', $hasil);
    } else {
      return $this->baseResponse(true, 'gagal membuat booking', $hasil);
    }

    //Mail::to('infobackind@gmail.com')->send(new Invoice($booking_detail));

    //return redirect(route('invoice_final',['id_booking'=>$booking_detail]));
  }
}
