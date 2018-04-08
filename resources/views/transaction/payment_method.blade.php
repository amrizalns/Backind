@extends('layouts.main')
@section('content')

  <div class="card-body">
    <span style="color:#0285CC ; font-weight:bold ; font-size:large">Menu Transaksi Pemesanan</span><br>
    <span style="color:#27607F; font-size:small">Backind Administrator - Nikmati segala kenyamanan dan kemudahan transaksi disini.</span>
    <hr>
  </div>
  <div class="container-fluid">
    <div class="col-lg">
        <div class="card mb-3" style="padding:5%">
          <div class="form-group col-lg-10" style="font-size: small ;padding-left:15%">
            <table width="100%" style="text-align: left;">
              <tr>
                <td colspan="4" style="text-align:center">
                  <label style="color:#616161;font-size:small;">Hai {{ Auth::user()->name }}, jumlah tagihan anda sebesar :</label><br>
                  <label style="color:#039BE5;"><h1><strong>Rp. {{number_format($booking_detail->total_cost)}}</strong></h1></label>
                </td>
              </tr>
              <tr>
                <td colspan="4" style="padding-bottom:20px; text-align:center" valign="top">
                  <label style="color:#616161; width:80%;font-size:small;">Mohon melakukan pembayaran untuk mengakhiri transaksi sebelum, </label><br>
                  <strong><label style="color:#C62828; font-size:medium;">{{$booking_detail->duedate}}</label></strong>
                </td>
              </tr>

              <tr>
                <td>
                  <label style="color:#616161; width:80%;font-size:small;">Status Pembayaran</label>
                </td>
                <td> : </td>
                <td colspan="2">
                  @if ($booking_detail->transaction_payment->status_transfer == 2)
                    <label style="color:#FFC107; width:80%;font-size:large;"><strong> Menunggu Pembayaran</strong></label>
                  @elseif ($booking_detail->transaction_payment->status_transfer == 1)
                      <label style="color:#4CAF50; width:80%;font-size:large;"><strong> Telah dibayar</strong></label>

                  @endif
                </td>
              </tr>
              <form method="POST" action="{{route('uploadBukti')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">
                <input type="hidden" name="id_transaksi" value="{{$booking_detail->transaction_payment->id_transaksi}}">
              <tr>
                <td>
                  <label style="color:#616161; width:80%;font-size:small;">Unggah bukti transfer</label>
                </td>
                <td> : </td>
                <td>
                  <script type="text/javascript">
                      function bukti(input) {
                          if (input.files && input.files[0]) {
                              var reader = new FileReader();

                              reader.onload = function (e) {
                                  $('#bukti_transfer').attr('src', e.target.result);
                              }

                              reader.readAsDataURL(input.files[0]);
                          }
                      }
                    </script>
                    <input type="file" name="bukti_transfer" onchange="bukti(this);" value="">
                </td>
                <td>
                  <button type="submit" name="button" class="btn btn-primary btn-block" style="font-size:small">
                    Unggah
                  </button>
                </td>
              </tr>
              <tr>
                  <td valign="top">
                    <label style="color:#616161; width:80%;font-size:small;">Bukti transfer</label>
                  </td>
                  <td valign="top"> : </td>
                  <td colspan="2">
                    <img id="bukti_transfer" src="{{asset('storage/'.$booking_detail->transaction_payment->bukti_transfer)}}" alt="  Bukti Transfer" style="max-width:300px; max-height:500px; border: 1px solid #ddd; border-radius: 4px; padding: 5px"/>
                  </td>
              </tr>
            </form>
            </table>
            <br>
            <table width="100%">
              <tr>
                <td width="33.3%">
                  <a href="#" class="btn btn-danger btn-block" style="font-size:small; color:#ffffff;">
                    Batalkan Transaksi
                  </a>
                </td>
                <td width="33.3%">
                  <a href="{{route('index')}}" class="btn btn-warning btn-block" style="font-size:small; color:#ffffff">
                    Nanti
                  </a>
                </td>
                <td width="33.3%">
                  <a href="{{route('payment_conf',['transaction_payment'=>$booking_detail->transaction_payment->id_transaksi])}}" class="btn btn-primary btn-block" style="font-size:small">
                    Selesai
                  </a>
                </td>
              </tr>
            </table>
          </div>
        </div>
    </div>
  </div>
@endsection
