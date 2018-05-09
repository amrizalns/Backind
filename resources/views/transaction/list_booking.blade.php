@extends('layouts.main')
@section('content')

  <div class="card-body">
    <span style="color:#0285CC ; font-weight:bold ; font-size:large">Menu Transaksi Pemesanan</span><br>
    <span style="color:#27607F; font-size:small">Backind Administrator - Nikmati segala kenyamanan dan kemudahan transaksi disini.</span>
    <hr>
  </div>
  <div class="container-fluid">
    <div class="col-lg">
      <form method="POST" action="" enctype="multipart/form-data">
        {{ csrf_field() }}
      <div class="card mb-3" style="padding:5%">
        <div class="form-group col-lg-10" style="font-size: small ;padding-left:15%">
          <table width="100%" style="text-align: left;">
            <tr>
              <td colspan="3" style="padding-bottom:20px">
                <span style="color:#0285CC ; font-weight:bold"><h1>TAGIHAN</h1></span>
                <span style="color:#0285CC ; font-size:small;">
                  Nomor Tagihan.  #BACKIND2018{{$id_booking->id_booking+100}}
                </span>
              </td>
            </tr>
            <tr>
              <td colspan="3" bgcolor="#FAFAFA" height="20px"></td>
            </tr>
            <tr>
              <td valign="top" bgcolor="#FAFAFA" style="padding-left:10px">
                <label style="font-size: small">Pemesan</label>
              </td>
              <td valign="top" bgcolor="#FAFAFA" >
                <label style="font-size: small"> : </label>
              </td>
              <td valign="top" bgcolor="#FAFAFA" >
                  <label style="font-size: small">{{ Auth::user()->name }}</label>
              </td>
            </tr>
            <tr>
              <td valign="top" bgcolor="#FAFAFA" style="padding-left:10px">
                <label style="font-size: small">Email</label>
              </td>
              <td valign="top" bgcolor="#FAFAFA" >
                <label style="font-size: small"> : </label>
              </td>
              <td valign="top" bgcolor="#FAFAFA" >
                  <label style="font-size: small">{{ Auth::user()->email }}</label>
              </td>
            </tr>
            <tr>
              <td valign="top" bgcolor="#FAFAFA" style="padding-left:10px">
                <label style="font-size: small">No Telepon/Handphone</label>
              </td>
              <td valign="top" bgcolor="#FAFAFA" >
                <label style="font-size: small"> : </label>
              </td>
              <td valign="top" bgcolor="#FAFAFA" >
                  <label style="font-size: small">{{ Auth::user()->phone_number }}</label>
              </td>
            </tr>
            <tr>
              <td valign="top" bgcolor="#FAFAFA" style="padding-left:10px">
                <label style="font-size: small">Tiket Homestay</label>
              </td>
              <td valign="top" bgcolor="#FAFAFA" >
                <label style="font-size: small"> : </label>
              </td>
              <td valign="top" bgcolor="#FAFAFA" >
                @if ($id_booking->id_homestay)
                  <label style="font-size: small">{{$id_booking->homestay->business_details->business_name}}</label>
                @else
                  <label style="font-size: small"> - </label>
                @endif
              </td>
            </tr>
            <tr>
              <td valign="top" bgcolor="#FAFAFA" style="padding-left:10px">
                <label style="font-size: small">Check in - Check out</label>
              </td>
              <td valign="top" bgcolor="#FAFAFA" >
                <label style="font-size: small"> : </label>
              </td>
              <td valign="top" bgcolor="#FAFAFA" >
                @if ($id_booking->id_homestay)
                  <label style="font-size: small">{{$id_booking->checkin}}</label>
                  -
                  <label style="font-size: small">{{$id_booking->checkout}}</label>
                @else
                  <label style="font-size: small"> - </label>
                @endif
              </td>
            </tr>
            <tr>
              <td colspan="3">
                <hr>
              </td>
            </tr>
            <tr>
              <td valign="top" bgcolor="#FAFAFA" style="padding-left:10px">
                <label style="font-size: small">Tiket Wisata</label>
              </td>
              <td valign="top" bgcolor="#FAFAFA" >
                <label style="font-size: small"> : </label>
              </td>
              <td valign="top" bgcolor="#FAFAFA" >
                @if ($id_booking->id_tourism)
                  <label style="font-size: small">{{$id_booking->tourism->business_details->business_name}}</label><br>
                @else
                  <label style="font-size: small"> - </label>
                @endif
              </td>
            </tr>
            <tr>
              <td valign="top" bgcolor="#FAFAFA" style="padding-left:10px">
                <label style="font-size: small">Tgl Berlaku Tiket Wisata</label>
              </td>
              <td valign="top" bgcolor="#FAFAFA" >
                <label style="font-size: small"> : </label>
              </td>
              <td valign="top" bgcolor="#FAFAFA" >
                @if ($id_booking->id_tourism)
                  <label style="font-size: small">{{$id_booking->checkin_tourism}}</label>
                @else
                  <label style="font-size: small"> - </label>
                @endif
              </td>
            </tr>
            <tr>
              <td valign="top" style="padding-left:10px" bgcolor="#FAFAFA" >
                <label style="font-size: small">Jumlah Tiket</label>
              </td>
              <td valign="top" bgcolor="#FAFAFA" >
                <label style="font-size: small"> : </label>
              </td>
              <td valign="top" bgcolor="#FAFAFA" >
                <label style="font-size: small">( {{$id_booking->total_ticket}} )</label>
                tiket
              </td>
            </tr>
            <tr>
              <td colspan="3" >
                <hr>
              </td>
            </tr>
            <tr>
              <td valign="top" bgcolor="#EEEEEE" style="padding-left:10px">
                <label style="font-size: small">Harga Homestay</label>
              </td>
              <td valign="top" bgcolor="#EEEEEE" >
                <label style="font-size: small"> : </label>
              </td>
              <td valign="top" bgcolor="#EEEEEE" style="text-align: right; padding-right:10px">
                @if ($id_booking->id_homestay)
                  <label style="font-size: small">Rp. {{number_format($id_booking->homestay->business_details->business_price)}}</label>
                  @else
                    <label style="font-size: small"> - </label>
                @endif
              </td>
            </tr>
            <tr>
              <td valign="top" bgcolor="#EEEEEE" style="padding-left:10px">
                <label style="font-size: small">Harga Tiket Wisata</label>
              </td>
              <td valign="top" bgcolor="#EEEEEE" >
                <label style="font-size: small"> : </label>
              </td>
              <td valign="top" bgcolor="#EEEEEE" style="text-align: right; padding-right:10px">
                @if ($id_booking->id_tourism)
                  <label style="font-size: small">Rp. {{number_format($id_booking->tourism->business_details->business_price)}}</label>
                @else
                  <label style="font-size: small"> - </label>
                @endif
              </td>
            </tr>
            <tr>
              <td valign="top" bgcolor="#EEEEEE" style="padding-left:10px">
                <label style="font-size: small">Total Harga Tiket</label>
              </td>
              <td valign="top" bgcolor="#EEEEEE" >
                <label style="font-size: small"> : </label>
              </td>
              <td valign="top" bgcolor="#EEEEEE" style="text-align: right; padding-right:10px">
                <label style="font-size: small">Rp. {{number_format($id_booking->total_cost)}}</label>
              </td>
            </tr>
            <tr>
              <td valign="top" bgcolor="#EEEEEE" style="padding-left:10px">
                <label style="font-size: small">Kode Unik Transaksi</label>
              </td>
              <td valign="top" bgcolor="#EEEEEE" >
                <label style="font-size: small"> : </label>
              </td>
              <td valign="top" bgcolor="#EEEEEE" style="text-align: right; padding-right:10px">
                <label style="font-size: small">(+) Rp. {{$id_booking->id_booking+100}}</label>
              </td>
            </tr>
            <tr>
              <td valign="top" bgcolor="#E0E0E0" style="padding-left:10px">
                <label style="font-size: small"><strong>Total Pembayaran</strong></label>
              </td>
              <td valign="top" bgcolor="#E0E0E0">
                <label style="font-size: small"><strong> : </strong></label>
              </td>
              <td valign="top" style="text-align: right; padding-right:10px" bgcolor="#E0E0E0">
                <label style="font-size: large; color:#039BE5"><strong>Rp. {{number_format($id_booking->total_cost + ($id_booking->id_booking+100))}}</strong></label>
              </td>
            </tr>
            <tr>
              <td>
                <img src="{{asset('exclamation-mark.svg')}}" width="180px" style=" padding:55px">
              </td>
              <td colspan="2" style="padding-left:10px; padding-right:10px">
                <label style="font-size: small; color:#D32F2F">
                  Pastikan anda membayar total biaya pemesanan berdasarkan dengan <strong>jumlah Total Pembayaran</strong>,
                  segala kesalahan transfer dana saat bertransaksi merupakan tanggung jawab bagi pemesan tiket.</label>
              </td>
            </tr>
          </table>
      </div>
      <div style="padding-top:20px">
        <table width="100%">
          <tr>
            <td>
              <a href="#" class="btn btn-warning btn-block" style="font-size:small; color:#FFFFFF;">
                Batalkan Transaksi
              </a>
            </td>
            <td width="2%"></td>
            <td>
              <a href="{{route('update_cost',['booking_detail'=>$id_booking])}}" class="btn btn-primary btn-block" style="font-size:small">
                Lanjutkan Pembayaran
              </a>
            </td>
          </tr>
        </table>
      </div>
      </form>
    </div>
  </div>
@endsection
