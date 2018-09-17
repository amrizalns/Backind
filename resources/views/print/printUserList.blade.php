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
          <label class="pull-left" style="font-size:large; color:#bdbdbd"><b>Laporan Data Pengguna Aplikasi Backind</b></label>
          <br>
          <hr>
        </td>
      </tr>
    </table>
  </div>

  <table class="table table-bordered" id="dataTable" cellspacing="0" style="font-size: small">
    <thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Alamat</th>
        <th>Nomer Telepon</th>
        <th>Status Pengguna</th>
    </tr>
    </thead>
      <tbody>
    @foreach ($users as $index=>$data)
      <tr>
        <td>{{++$index}}</td>
        <td>{{$data->name}}</td>
        <td>{{$data->email}}</td>
        <td>{{$data->address}}</td>
        <td>{{$data->phone_number}}</td>
        <td>{{$data->roles->status}}</td>
      </tr>
    @endforeach
      </tbody>
 </table>

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
