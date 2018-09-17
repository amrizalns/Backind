<?php

namespace App\Http\Controllers;

use App\booking_detail;
use App\User;
use App\business;
use Auth;
use App\business_detail;
use App\transaction_payment;
use App\Mail\Invoice;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class BookingDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
         $this->middleware('auth');
     }

    public function index()
    {
        $user = User::all();
        $tourism = business::where('id_menu', 1)->get();
        $homestay = business::where('id_menu', 2)->get();
        return view('transaction/add_booking', ['users'=>$user, 'tourism'=>$tourism, 'homestay'=>$homestay]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if ($request->input('id_homestay')) {
        $this->validate($request, [
            'checkin' => 'required',
            'checkout' => 'required'
        ]);
      }
      if ($request->input('id_tourism')) {
        $this->validate($request, [
            'checkin_tourism' => 'required'
        ]);
      }
      if (!$request->input('id_homestay') && !$request->input('id_tourism')) {
        alert()->warning('Pastikan anda memilih salah satu pesanan !', 'Opps')->persistent('Tutup');
        return redirect(route('add_trans')) ;
      }

      if ($request->input('total_ticket')==0) {
        alert()->warning('Pastikan anda jumlah tiket yang di pesan , minimal 1 tiket !', 'Opps')->persistent('Tutup');
        return redirect(route('add_trans')) ;
      }

      $homestay_data = business_detail::find($request->input('id_homestay'));
      $tourism_data = business_detail::find($request->input('id_tourism'));
      $checkBooking = booking_detail::where('id_homestay', $request->input('id_homestay'))->get();

      $stringToDateReqCheckin = date("Y-m-d", strtotime($request->input('checkin')));
      $stringToDateReqCheckout = date("Y-m-d", strtotime($request->input('checkout')));
      $hasilKurang = strtotime($request->input('checkout')) - strtotime($request->input('checkin'));
      $total_kurang =  round($hasilKurang / (60 * 60 * 24));
      $total_price = 0;

      // pesan homestay dan wisata
      if ($request->input('id_tourism') && $request->input('id_homestay')) {
        $total_price = $total_kurang * ($homestay_data->business_price + $tourism_data->business_price);
      }else if ($request->input('id_tourism')) {
        $total_price = $total_kurang * ($tourism_data->business_price);
      }else if ($request->input('id_homestay')) {
        $total_price = $total_kurang * ($homestay_data->business_price);
      }

      $id_booking = null;
      if($stringToDateReqCheckin == $stringToDateReqCheckout){
          alert()->warning('Tanggal tidak boleh sama, minimal 1 malam !', 'Opps')->persistent('Tutup');
      }

      if ($request->input('id_tourism') && $request->input('id_homestay')) {
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
            alert()->warning('Homestay sudah terisi / status blm exp, silahkan pilih di tanggal lain !', 'Opps')->persistent('Tutup');
          }
        }
        $id_booking = booking_detail::create([
          'id_tourism' => $request->input('id_tourism'),
          'id_homestay' => $request->input('id_homestay'),
          'id_user' => Auth::user()->id_user,
          'checkin' => $request->input('checkin'),
          'checkout' => $request->input('checkout'),
          'checkin_tourism' => $request->input('checkin_tourism'),
          'total_ticket' => $request->input('total_ticket'),
          'total_cost' => $total_price,
          'duedate' => $duedate

        ]);

      // pesan wisata
      }elseif ($request->input('id_tourism')){
        // $homestay = $homestay_data->business_price;
        $duedate = date("Y-m-d H:i:s", strtotime('+10 hours'));
        $id_booking = booking_detail::create([
          'id_tourism' => $request->input('id_tourism'),
          'id_user' => Auth::user()->id_user,
          'checkin' => $request->input('checkin'),
          'checkout' => $request->input('checkout'),
          'checkin_tourism' => $request->input('checkin_tourism'),
          'total_ticket' => $request->input('total_ticket'),
          'total_cost' => $total_price,
          'duedate' => $duedate
        ]);

        // pesan homestay
      }elseif ($request->input('id_homestay')){
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
            alert()->warning('Homestay sudah terisi / status blm exp, silahkan pilih di tanggal lain !', 'Opps')->persistent('Tutup');
          }
        }
        $id_booking = booking_detail::create([
          'id_homestay' => $request->input('id_homestay'),
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
        return redirect(route('invoice', ['booking_detail'=>$id_booking]));
      } else {
        alert()->warning('Gagal Membuat Booking !', 'Opps')->persistent('Tutup');
      }
    }

    public function invoice(booking_detail $booking_detail)
    {
      return view('transaction/list_booking', ['id_booking'=>$booking_detail]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\booking_detail  $booking_detail
     * @return \Illuminate\Http\Response
     */
    public function show(booking_detail $booking_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\booking_detail  $booking_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(booking_detail $booking_detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\booking_detail  $booking_detail
     * @return \Illuminate\Http\Response
     */
    public function update(booking_detail $booking_detail)
    {
      $total_cost = $booking_detail->total_cost + ($booking_detail->id_booking+100);
      $booking_detail->total_cost = $total_cost;
      $booking_detail->save();


      Mail::to(Auth::user()->email)->send(new Invoice($booking_detail));

      return redirect(route('invoice_final',['id_booking'=>$booking_detail]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\booking_detail  $booking_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(booking_detail $booking_detail)
    {
        //
    }
}
