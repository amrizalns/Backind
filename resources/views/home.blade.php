@extends('layouts.main')

@section('content')
  {{-- @if(Session::has('success'))
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
{{Session::get('success')}}
</div>
@endif --}}
  <!-- Styles -->
  <style>
  #chartdiv {
  	width		: 100%;
  	height		: 500px;
  	font-size	: 11px;
  }
  </style>

  <!-- Resources -->
  <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
  <script src="https://www.amcharts.com/lib/3/serial.js"></script>
  <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
  <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
  <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>

  <!-- Chart code -->
  <script>
  var chart = AmCharts.makeChart("chartdiv", {
      "theme": "light",
      "type": "serial",
      "dataProvider": [{
          "country": "Tempat Wisata",
          "Pending": {{count($TPending)}},
          "Aktif": {{count($TActive)}}
      }, {
          "country": "Homestay",
          "Pending": {{count($HPending)}},
          "Aktif": {{count($HActive)}}
      }],
      "valueAxes": [{
          "unit": "unit",
          "position": "left",
          "title": "Jumlah Mitra Usaha (current year)",
      }],
      "startDuration": 1,
      "graphs": [{
          "balloonText": "Jumlah Mitra [[category]] (Pending): <b>[[value]]</b>",
          "fillAlphas": 0.9,
          "lineAlpha": 0.2,
          "title": "2004",
          "type": "column",
          "valueField": "Pending"
      }, {
          "balloonText": "Jumlah Mitra [[category]] (Aktif): <b>[[value]]</b>",
          "fillAlphas": 0.9,
          "lineAlpha": 0.2,
          "title": "2005",
          "type": "column",
          "clustered":false,
          "columnWidth":0.4,
          "valueField": "Aktif"
      }],
      "plotAreaFillAlphas": 0.1,
      "categoryField": "country",
      "categoryAxis": {
          "gridPosition": "start"
      },
      "export": {
      	"enabled": true
       }

  });
  </script>


  <div class="card-body">
    <div class="form group col-lg-12">
      <div class="row">
        <div class="col-lg-7">
          <label style="color:#0285CC ; font-weight:bold ; font-size:25pt">
            Bagaimana anda mengelola usaha yang anda miliki saat ini ?
            <br>
            . . . . .
          </label>
          <br>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-8">
          <label style="color:#27607F; font-size:small">
            Backind membantu anda untuk memudahkan pengelolaan bisnis yang anda miliki saat ini,
            dari pengelolaan data usaha, perancangan strategi usaha hingga pengelolaan laporan usaha kini dapat anda kendalikan
            hanya dari satu aplikasi.
            <br>
            <br>
          </label>

          @if (Auth::user()->id_roles == 5)
            <a href="{{route('agreement')}}">
              <button class="btn btn-primary" style=" font-size:small;">Bergabung bersama Backind</button>
              </a>
          @endif
          @if (Auth::user()->id_roles == 2)
            <form class="" action="#" method="post">
              <a href=""><button class="btn btn-warning" style=" font-size:small;" disabled>Hai mitra Backind !</button></a>
            </form>
          @endif
          @if (Auth::user()->id_roles == 1)
            <form class="" action="#" method="post">
              <a href=""><button class="btn btn-danger" style=" font-size:small;" disabled>Welcome Master !</button></a>
            </form>
          @endif
        </div>
      </div>

    </div>
    <hr style="margin-top:2.5%">
  </div>
  <div class="">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-5">
        <div id="chartdiv">

        </div>
      </div>
      <div class="col-lg-7">
        <label style="color:#0285CC ; font-weight:bold ; font-size:20pt">
          Mari bergabung menjadi bagian dari backind, kelola usahamu sendiri
          <br>
          . . .
        </label>
        <label style="color:#27607F; font-size:small; margin-right:20px">
          Jumlah Mitra Usaha Backind
          <hr>
          <table width="100%">
            <tr>
              <td>Homestay</td>
              <td>:</td>
              <td>{{count($HPending)+ count($HActive)}} Unit mitra usaha</td>
            </tr>
            <tr>
              <td>Tempat Wisata</td>
              <td>:</td>
              <td>{{count($TPending)+ count($TActive)}} Unit mitra usaha</td>
            </tr>
          </table><br><br>
          Penyajian data merupakan salah satu kegiatan dalam pembuatan laporan hasil penelitan yang telah dilakukan agar
          dapat dipahami dan dianalisis sesuai dengan tujuan yang diinginkan. Data yang disajikan harus sederhana dan jelas agar muda dibaca.
          Penyajian data juga dimaksudkan agar para pengamat dapat dengan mudah memahami apa yang kita sajikan untuk selanjutnya dilakukan
          penilaian atau perbandingan, dan lain-lain.
          <br>
          <br>
        </label>
      </div>
    </div>
  </div>
  </div>

      <!-- /.container-fluid -->
@endsection
