<?php

namespace App\Http\Controllers;

use App\transaction_payment;
use App\booking_detail;
use App\business;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Storage;

class TransactionPaymentController extends Controller
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

    public function index_spAdmin()
    {
      return view('transaction/status_trans_spadmin',['status_spadmin'=>booking_detail::all()]);
    }

    public function index_user()
    {
      $data = booking_detail::where('id_user',Auth::user()->id_user)->with(['transaction_payment'])->get();
      // $data = Auth::user()->business()->with(['booking_tourism','booking_homestay'])->get();

      // return $data;
      return view('transaction/status_trans_user',['status_user'=>$data]);
    }
    public function invoice_final(booking_detail $id_booking)
    {
      return view('transaction/payment_method', ['booking_detail'=>$id_booking]);
    }

    public function eticket(){
      // $newquery = booking_detail::where('id_user',Auth::user()->id_user)->with('transaction_payment')->get();

      $paid = transaction_payment::where('status_transfer',1)->with('booking_detail')->whereHas('booking_detail',function($query){
        $query->where('id_user',Auth::user()->id_user);
      });
      $wait = transaction_payment::where('status_transfer',2)->with('booking_detail')->whereHas('booking_detail',function($query){
        $query->where('id_user',Auth::user()->id_user);
      });
      $exp = transaction_payment::where('status_transfer',3)->with('booking_detail')->whereHas('booking_detail',function($query){
        $query->where('id_user',Auth::user()->id_user);
      });
      return view('transaction/ticket', [
        'paid' =>$paid->get(),
        'wait' => $wait->get(),
        'exp' =>$exp->get()

        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\transaction_payment  $transaction_payment
     * @return \Illuminate\Http\Response
     */
    public function show(transaction_payment $transaction_payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\transaction_payment  $transaction_payment
     * @return \Illuminate\Http\Response
     */
    public function edit(transaction_payment $transaction_payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\transaction_payment  $transaction_payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, transaction_payment $transaction_payment)
    {
      // if($request->bukti_transfer){
      //   $path = $request->bukti_transfer->store('transaction','public');
      // }else {
      //   $path = '';
      // }
      //
      // $transaction_payment->tgl_transfer = date("Y-m-d H:i:s", strtotime('+7 hours'));
      // $transaction_payment->bukti_transfer = $path;
      // $transaction_payment->save();
      //
      return redirect(route('status_trans_user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\transaction_payment  $transaction_payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(transaction_payment $transaction_payment)
    {
        //
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
      $transaction_payment->save();

      alert()->success('Bukti Transfer berhasil diubah', 'Selamat')->persistent('Tutup');
      return redirect(route('invoice_final',['id_booking'=>$request->id_transaksi]));
    }

    public function editStatusTransaksi(Request $request , transaction_payment $id_transaksi)
    {
      $id_transaksi->status_transfer= $request->input('status');
      $id_transaksi->save();
      alert()->success('Status transaksi berhasil diubah', 'Selamat')->persistent('Tutup');
      return redirect(route('status_trans_spadmin'));
    }

    public function deleteBooking(Request $request)
    {
      $booking_detail = booking_detail::where('id_booking', $request->id_booking)->delete();
      $transaction_payment = transaction_payment::where('id_transaksi', $request->id_transaksi)->delete();

      alert()->success('Data berhasil dihapus', 'Selamat')->persistent('Tutup');
      return redirect('status_trans_user');
    }

    public function deleteBookingSpAdmin(Request $request)
    {
      $booking_detail = booking_detail::where('id_booking', $request->id_booking)->delete();
      $transaction_payment = transaction_payment::where('id_transaksi', $request->id_transaksi)->delete();

      alert()->success('Data berhasil dihapus', 'Selamat')->persistent('Tutup');
      return redirect('status_trans_spadmin');
    }

    public function printPaidTicket($id)
    {
      $paid = transaction_payment::where('status_transfer',1)->with('booking_detail')->whereHas('booking_detail',function($query) use($id){
        $query->where('id_user',Auth::user()->id_user)->where('id_booking', $id);
      });
      return view('print/printPaidTicket', [
        'paid' =>$paid->get()
        ]);
    }

    public function printWaitTicket($id)
    {
      $wait = transaction_payment::where('status_transfer',2)->with('booking_detail')->whereHas('booking_detail',function($query) use($id){
        $query->where('id_user',Auth::user()->id_user)->where('id_booking', $id);
      });
      return view('print/printWaitTicket', [
        'wait' =>$wait->get()
        ]);
    }
    public function printExpTicket($id)
    {
      $exp = transaction_payment::where('status_transfer',3)->with('booking_detail')->whereHas('booking_detail',function($query) use($id){
        $query->where('id_user',Auth::user()->id_user)->where('id_booking', $id);
      });
      return view('print/printExpTicket', [
        'exp' =>$exp->get()
        ]);
    }
}
