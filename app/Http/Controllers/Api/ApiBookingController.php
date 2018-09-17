<?php

namespace App\Http\Controllers\Api;

use App\booking_detail;
use App\User;
use App\business;
use App\business_detail;
use App\transaction_payment;
use App\Mail\Invoice;
use Storage;
use JWTAuth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApiBookingController extends ApiBaseController
{

  public function __construct()
  {
      $this->middleware("jwt.auth");
  }

  public function store(Request $request)
  {
    $homestay_data = business_detail::find($request->input('homestay'));
    $tourism_data = business_detail::find($request->input('tourism'));
    $checkBooking = booking_detail::where('id_homestay', $request->input('homestay'))->get();

    $stringToDateReqCheckin = date("Y-m-d", strtotime($request->input('checkin')));
    $stringToDateReqCheckout = date("Y-m-d", strtotime($request->input('checkout')));
    $hasilKurang = strtotime($request->input('checkout')) - strtotime($request->input('checkin'));
    $total_kurang =  round($hasilKurang / (60 * 60 * 24));
    $total_price = 0;

    // pesan homestay dan wisata
    if ($request->input('tourism') && $request->input('homestay')) {
      $total_price = $total_kurang * ($homestay_data->business_price + $tourism_data->business_price);
    }else if ($request->input('tourism')) {
      $total_price = $total_kurang * ($tourism_data->business_price);
    }else if ($request->input('homestay')) {
      $total_price = $total_kurang * ($homestay_data->business_price);
    }

    $id_booking = null;
    if($stringToDateReqCheckin == $stringToDateReqCheckout){
        return $this->baseResponse(true, 'gagal', 'Tanggal tidak boleh sama, minimal 1 malam');
    }

    if ($request->input('tourism') && $request->input('homestay')) {
      //$tourism = $tourism_data->business_price;
      $duedate = date("Y-m-d H:i:s", strtotime('+10 hours'));

      for($i=0;$i<sizeof($checkBooking);$i++){
        $booking = transaction_payment::where('id_booking', $checkBooking[$i]->id_booking)->get();
        $status = $booking[0]->status_transfer;
        $dateHomestayCheckin = $checkBooking[$i]->checkin;
        $dateHomestayCheckout = $checkBooking[$i]->checkout;
        //return var_dump($checkBooking[0]->checkin);
        $convertCheckin = date("Y-m-d", strtotime($dateHomestayCheckin));
        $convertCheckout = date("Y-m-d", strtotime($dateHomestayCheckout));

        if (($stringToDateReqCheckin >= $convertCheckin) && ($stringToDateReqCheckin < $convertCheckout) && $status != 3)
        {
          return $this->baseResponse(true, 'gagal', 'Homestay sudah terisi / status blm exp, silahkan pilih di tanggal lain');
        }
      }
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

    // pesan wisata
    }elseif ($request->input('tourism')){
      // $homestay = $homestay_data->business_price;
      $duedate = date("Y-m-d H:i:s", strtotime('+10 hours'));
      $id_booking = booking_detail::create([
        'id_tourism' => $request->input('tourism'),
        'id_user' => Auth::user()->id_user,
        'checkin' => $request->input('checkin'),
        'checkout' => $request->input('checkout'),
        'checkin_tourism' => $request->input('checkin_tourism'),
        'total_ticket' => $request->input('total_ticket'),
        'total_cost' => $total_price,
        'duedate' => $duedate
      ]);

      // pesan homestay
    }elseif ($request->input('homestay')){
      $duedate = date("Y-m-d H:i:s", strtotime('+10 hours'));
      for($i=0;$i<sizeof($checkBooking);$i++){
        $booking = transaction_payment::where('id_booking', $checkBooking[$i]->id_booking)->get();
        $status = $booking[0]->status_transfer;
        $dateHomestayCheckin = $checkBooking[$i]->checkin;
        $dateHomestayCheckout = $checkBooking[$i]->checkout;
        //return var_dump($checkBooking[0]->checkin);
        $convertCheckin = date("Y-m-d", strtotime($dateHomestayCheckin));
        $convertCheckout = date("Y-m-d", strtotime($dateHomestayCheckout));

        if (($stringToDateReqCheckin >= $convertCheckin) && ($stringToDateReqCheckin < $convertCheckout) && $status != 3)
        {
          return $this->baseResponse(true, 'gagal', 'Homestay sudah terisi / status blm exp, silahkan pilih di tanggal lain');
        }
      }
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
      return $this->baseResponse(false, 'berhasil', $id_booking);
    } else {
      return $this->baseResponse(true, 'gagal membuat booking', $id_booking);
    }
    //return response()->json($id_booking);
    //return redirect(route('invoice', ['booking_detail'=>$id_booking]));
  }

  public function updateCost(booking_detail $booking_detail)
  {
    $total_cost = $booking_detail->total_cost + ($booking_detail->id_booking+100);
    $booking_detail->total_cost = $total_cost;
    $hasil = ['id_booking'=>$booking_detail];

    if ($booking_detail->save()) {
      Mail::to('infobackind@gmail.com')->send(new Invoice($booking_detail));
      return $this->baseResponse(false, 'berhasil', $hasil);
    } else {
      return $this->baseResponse(true, 'gagal update cost', $hasil);
    }
    //return redirect(route('invoice_final',['id_booking'=>$booking_detail]));
  }

  public function invoice($id)
  {
    $detail = booking_detail::with('tourism.business_details', 'homestay.business_details', 'user')->where(['id_booking'=>$id])->get();
    // $business = business::with('business_details', 'booking_tourism', 'booking_homestay');
    // $hasil = [
    //     'detail'=>$detail,
    //     'business'=>$business
    //     ];
    if ($detail!=null) {
      return $this->baseResponse(false, 'berhasil', $detail);
    } else {
      return $this->baseResponse(true, 'gagal tampil invoice', null);
    }
  }

}
