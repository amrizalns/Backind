<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="description" content="">
  <meta name="author" content="">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Backind</title>
  <link rel="icon" type="image/png" href="{{asset('fav.png')}}"/>
  <!-- Bootstrap core CSS -->
  <link href= " {{ asset ('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">

  <!-- Custom fonts for this template -->
  <link href="{{ asset ('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

  <!-- Plugin CSS -->
  <link href="{{ asset ('vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="{{ asset ('css/sb-admin.css') }}" rel="stylesheet">
  <link href="{{ asset ('css/sweetalert2.min.css') }}" rel="stylesheet">
  {{--SWEETALERT--}}
  <script src="{{asset('node_modules/sweetalert2/dist/sweetalert2.min.js')}}"></script>
  <link rel="stylesheet" href="{{asset('node_modules/sweetalert2/dist/sweetalert2.min.css')}}">

  <!-- Include a polyfill for ES6 Promises (optional) for IE11 and Android browser -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  {{--END SWEETALERT--}}

  <link rel="stylesheet" type="text/css" href="{{asset('css/jquery-gmaps-latlon-picker.css')}}"/>

</head>
<style>
    @media screen {
        div.divFooter {
            display: block;
        }

        div.divHeader {
            /*position: fixed;*/
            /*bottom: 0;*/
            display: block;
        }
    }

    @media print {
        div.divFooter {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            text-align: left;
            padding-left: 30px;
            padding-right: 30px;
        }

        div.divHeader {
            /*position: fixed;*/
            /*bottom: 0;*/
            display: none;
        }
    }
</style>
<body>
{{-- {{\Carbon\Carbon::now()->format('d F Y')}} --}}
<div class="container-fluid" style="margin-top:40px">
  <div class="col-lg-12">
    <table>
      <tr>
        <td>
          <img src="{{asset('backind_blue.png')}}" style="width:25%;">
        </td>
      </tr>
      <tr>
        <td>
          <label class="pull-left" style="font-size:large; color:#bdbdbd"><b>Laporan Usaha dan Transaksi</b></label>
          <br>
          <hr>
        </td>
      </tr>
    </table>
  </div>

  <div class="col-lg-12" style="margin-top:2%">
    <table width="100%" style="color:#bdbdbd">
      <tr>
        <td><label style="font-size:small">Nama usaha</label></td>
        <td><label style="font-size:small">:</label></td>
        <td><label style="font-size:small">{{$business_details->business_name}}</label></td>
      </tr>
      <tr>
        <td><label style="font-size:small">Email usaha</label></td>
        <td><label style="font-size:small">:</label></td>
        <td><label style="font-size:small">{{$business_details->business_email}}</label></td>
      </tr>
      <tr>
        <td><label style="font-size:small">Alamat usaha</label></td>
        <td><label style="font-size:small">:</label></td>
        <td><label style="font-size:small">{{$business_details->business_address}}</label></td>
      </tr>
      <tr>
        <td><label style="font-size:small">No telefon usaha</label></td>
        <td><label style="font-size:small">:</label></td>
        <td><label style="font-size:small">{{$business_details->business_phone}}</label></td>
      </tr>
      <tr>
        <td><label style="font-size:small">Harga tiket usaha</label></td>
        <td><label style="font-size:small">:</label></td>
        <td><label style="font-size:small">Rp. {{number_format($business_details->business_price)}}</label></td>
      </tr>
    </table>
  </div>
  <div class="col-lg-12">
    <hr>
    <label for="" style="font-size:10pt; color:#bdbdbd"><b>Detail Daftar Transaksi</b></label>
    <table class="table-bordered" style="color:#bdbdbd" width="100%">
          <thead>
            <tr>
              <th><label style="font-size:small; padding:2px">No</label></th>
              <th><label style="font-size:small; padding:2px">Waktu Booking</label></th>
              <th><label style="font-size:small; padding:2px">Nama Pemesan</label></th>
              <th><label style="font-size:small; padding:2px">Checkin</label></th>
              <th><label style="font-size:small; padding:2px">Status Pemesan</label></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($booking_data as $i =>$key)
              <tr>
                <td><label style="font-size:9pt; padding:2px">{{++$i}}.</label></td>
                <td><label style="font-size:9pt; padding:2px">{{$key->created_at}}</label></td>
                <td><label style="font-size:9pt; padding:2px">{{$key->name}}</label></td>
                <td><label style="font-size:9pt; padding:2px">{{$key->checkin}}</label></td>
                <td><label style="font-size:9pt; padding:2px">
                  @if ($key->status_transfer == 1)
                  <label style="font-size:9pt">Pembayaran Terkonfirmasi</label>
                  @elseif($key->status_transfer == 2)
                  <label style="font-size:9pt">Menunggu Pembayaran</label>
                  @elseif($key->status_transfer == 3)
                  <label style="font-size:9pt">Usang</label>
                  @endif
                  </label>
                </td>
            </tr>
            @endforeach
          </tbody>
      </table>
  </div>
  <div class="col-lg-12">
    <br>
    <label class="pull-right" style="font-size:8pt; color:#bdbdbd"><i>dicetak oleh <b>{{Auth::user()->name}}</b> pada <b>{{date("d-m-Y H:i:s", strtotime('+7 hours'))}}</b></i></label>
  </div>

  <div class="col-lg-12; divHeader">
      <button onclick="history.back()" style="font-size:small" class="btn btn-primary">Kembali</button>
  </div>
  <div class="col-lg-12" style="margin-top:10%">
    <div class="divFooter">
      <hr>
      <table width="100%">
        <tr>
          <td>
            <label style="font-size:8pt; color:#EEEEEE">
              <b>Backpacker Indonesia</b><br>
              official@backind.id<br>
              JL Telekomunikasi No.1 Dayeukolot<br>
              Kabupaten Bandung
              <br>
              <br>
            </label>
          </td>

          <td>
          </td>
          <td>
            <label class="pull-right" style="font-size:8pt; color:#EEEEEE">
              Customer Service<br>
              +62&nbsp;853-346-675-69<br>
              cs@backind.id<br>
              <br>
              <br>
            </label>
          </td>
        </tr>
      </table>
    </div>
  </div>
</div>
</body>
</html>

<script>
window.print();
</script>
