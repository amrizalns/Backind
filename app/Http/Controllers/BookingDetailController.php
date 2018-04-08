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
      if (!$request->input('homestay') && !$request->input('tourism')) {
        alert()->warning('Pastikan anda memilih salah satu pesanan !', 'Opps')->persistent('Tutup');
        return redirect(route('add_trans')) ;

      }

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
        $tourism = $tourism_data->business_price;

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
        $homestay = $homestay_data->business_price;

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
      return redirect(route('invoice', ['booking_detail'=>$id_booking]));
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
      $total_cost = $booking_detail->total_cost - ($booking_detail->id_booking+100);
      $booking_detail->total_cost = $total_cost;
      $booking_detail->save();


      Mail::to('infobackind@gmail.com')->send(new Invoice($booking_detail));

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
