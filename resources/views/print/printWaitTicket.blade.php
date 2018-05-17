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
  @foreach ($wait as $index=>$data)
  <div class="col-lg-12">
    <table width="100%">
      <tr>
        <td width="70%">
          <table>
            <tr>
              <td><label style="font-size:12pt"><b>RECEIPT</b></label></td>
            </tr>
            <tr>
              <td><label style="font-size:small">Booking ID : #BACKIND2018{{$data->booking_detail->id_booking+100}}</label></td>
            </tr>
            <tr>
              <td><label style="font-size:small">Booking Date : {{$data->booking_detail->created_at}}</label></td>
            </tr>
          </table>
        </td>
        <td>
          <img src="{{asset('backind_blue.png')}}" style="width:100%;">
          <br>
          <label class="pull-right" style="font-size:20pt ; color:#bdbdbd"><b>E-Ticket</b></label>
        </td>
      </tr>
    </table>
    <hr>
      <table width="100%">
        <tr>
          <td>
            <span style="color:#000000;font-size:12pt"><strong>Customer Details</strong></span>
            <br>
            <br>
              <table width="100%">
                <tr>
                  <td><span style="color:#000000;font-size:small">Name</span></td>
                  <td><span style="color:#000000;font-size:small">:</span></td>
                  <td><span style="color:#000000;font-size:small">{{$data->booking_detail->user->name}}</span></td>
                </tr>
                <tr>
                  <td><span style="color:#000000;font-size:small">Email</span></td>
                  <td><span style="color:#000000;font-size:small">:</span></td>
                  <td><span style="color:#000000;font-size:small">{{$data->booking_detail->user->email}}</span></td>
                </tr>
                <tr>
                  <td><span style="color:#000000;font-size:small">Phone</span></td>
                  <td><span style="color:#000000;font-size:small">:</span></td>
                  <td><span style="color:#000000;font-size:small">{{$data->booking_detail->user->phone_number}}</span></td>
                </tr>
              </table>
          </td>
          <td valign="top">
            <span style="color:#000000;font-size:12pt"><strong>Destination Details</strong></span>
            <br>
            <br>
              <table width="100%">
                <tr>
                  <td><span style="color:#000000;font-size:small">Homestay</span></td>
                  <td><span style="color:#000000;font-size:small">:</span></td>
                  <td><span style="color:#000000;font-size:small">{{$data->booking_detail->homestay->business_details->business_name}}</span></td>
                </tr>
                <tr>
                  <td><span style="color:#000000;font-size:small">Tourism</span></td>
                  <td><span style="color:#000000;font-size:small">:</span></td>
                  <td><span style="color:#000000;font-size:small">
                    @if ($data->booking_detail->checkin_tourism != null)
                          <span style="color:#000000;font-size:small">{{$data->booking_detail->tourism->business_details->business_name}}</span>
                        @else
                          <span style="color:#000000;font-size:small"> - </span>
                    @endif
                  </span></td>
                </tr>
              </table>
          </td>
        </tr>
      </table>
      <hr>
      <span style="color:#000000;font-size:12pt"><strong>Purchase Details</strong></span>
      <br>
      <br>
      <table width="100%" border="1">
        <thead align="center" style="background-color:#eeeeee">
          <td><span style="color:#000000;font-size:small ;padding:10px">No</span</td>
          <td><span style="color:#000000;font-size:small ;padding:10px">Destination</span></td>
          <td><span style="color:#000000;font-size:small ;padding:10px">Total per unit</span></td>
        </thead>
        <tbody>
            <td valign="top" align="center" style="padding:10px"><span style="color:#000000;font-size:small">1.</span></td>
            <td style="padding:10px">
              <span style="color:#000000;font-size:small">
                {{$data->booking_detail->homestay->business_details->business_name}}<br>
                @if ($data->booking_detail->checkin_tourism != null)
                  {{$data->booking_detail->tourism->business_details->business_name}}
                  @else
                    <span> - </span>
                @endif
              </span>
            </td>
            <td align="right" style="padding:10px">
              <span style="color:#000000;font-size:small">
                Rp.{{number_format($data->booking_detail->homestay->business_details->business_price)}}<br>
                @if ($data->booking_detail->checkin_tourism != null)
                  Rp.{{number_format($data->booking_detail->tourism->business_details->business_price)}}
                  @else
                    <span> - </span>
                @endif
              </span>
            </td>

        </tbody>
        <tbody align="right">
          <tr>
            <td colspan="2" style="padding:10px">
              <span style="color:#000000;font-size:small"> Total </span>
            </td>
            <td style="padding:10px">
              <span style="color:#000000;font-size:small">
                @if ($data->booking_detail->checkin_tourism != null)
                  Rp.{{number_format($data->booking_detail->homestay->business_details->business_price + $data->booking_detail->tourism->business_details->business_price)}}
                  @else
                    Rp.{{number_format($data->booking_detail->homestay->business_details->business_price)}}
                @endif

              </span>
            </td>
          </tr>
          <tr>
            <td colspan="2" style="padding:10px">
              <span style="color:#000000;font-size:small"> Administration Fee (-)</span>
            </td>
            <td style="padding:10px">
              <span style="color:#000000;font-size:small">
                -Rp.{{$data->booking_detail->id_booking+100}}
              </span>
            </td>
          </tr>
          <tr>
            <td colspan="2" style="background-color:#eeeeee ;padding:10px">
              <span style="color:#000000;font-size:small"> Payment Amount</span>
            </td>
            <td style="background-color:#eeeeee ;padding:10px">
              <span style="color:#000000;font-size:small">
                <strong>Rp.{{number_format($data->booking_detail->total_cost)}}</strong>
              </span>
            </td>
          </tr>
        </tbody>
      </table>
    @endforeach
  <br>
  <br>
  <div class="col-lg-12; divHeader">
      <button onclick="history.back()" style="font-size:small" class="btn btn-primary">Kembali</button>
  </div>
  <div class="col-lg-12">

  </div>
  <div class="col-lg-12">
    <div class="divFooter">
      <table width="100%">
        <tr>
          <td align="left">
            <img src="{{asset('wait.png')}}" style="width:35%">
          </td>
        </tr>
      </table>
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
