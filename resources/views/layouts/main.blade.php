<!DOCTYPE html>
<html lang="en">

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

  <body class="fixed-nav sticky-footer bg-light" id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color:#0091EA" id="mainNav">
      <a class="" href="/">
        <img src="{{asset('backind_white.png')}}" width="120px" style="margin-left:50px">
      </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
          <li class="nav-item active" data-toggle="tooltip" title="Dashboard">
            <a class="nav-link text-center" >
              <span style="font-size: small">
                <img src="{{url('storage/'.Auth::user()->avatar)}}" class="img-responsive " style="width:200px; height:200px; border-radius:50%; object-fit:cover; padding:20px">
              </span>
            <table align="center">
              <tr>
                <td>
                  <span style="font-size: small">
                  {{ Auth::user()->name }}
                  </span>
                </td>
              </tr>
              <tr>
                <td>
                  <span style="font-size: small">
                  {{ Auth::user()->email }}
                  </span>
                </td>
              </tr>
              <tr>
                <td>
                  <a class="nav-link text-center" href="{{route('editProfileUser',['id'=>Auth::user()->id_user])}}">
                    <button style="font-size:small;" type="button" name="editprofile" class="btn btn-secondary"><i class="fa fa-fw fa-pencil"></i></button>
                  </a>
                </td>
              </tr>
            </table>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="/">
              <i class="fa fa-fw fa-dashboard"></i>
              <span class="nav-link-text" style="font-size: small">
                Beranda</span>
            </a>
          </li>
          @if (Auth::user()->id_roles == 5)
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#transaksi" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-exchange"></i>
              <span class="nav-link-text" style="font-size: small">
                Transaksi</span>
            </a>
            <ul class="sidenav-third-level collapse" id="transaksi" style="background-color:#EEEEEE">
              <li>
                <a href="{{ URL::to('add_trans') }}" style="font-size: small">Buat Transaksi</a>
              </li>
              <li>
                <a href="{{route('status_trans_user')}}" style="font-size: small">Status Transaksi</a>
              </li>
            </ul>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
            <a class="nav-link" href="{{route('eticket')}}">
              <i class="fa fa-fw fa-tags"></i>
              <span class="nav-link-text" style="font-size: small">
                E-Ticket</span>
            </a>
          </li>
        @endif
          @if (Auth::user()->id_roles == 2)
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-list-ul"></i>
              <span class="nav-link-text" style="font-size: small">
                List Usaha</span>
            </a>
            <ul class="sidenav-third-level collapse" id="collapseComponents" style="background-color:#EEEEEE">
              <li>
                <a href="{{ URL::to('businessDetail/1') }}" style="font-size: small">Usaha Wisata</a>
              </li>
              <li>
                <a href="{{ URL::to('businessDetail/2') }}" style="font-size: small">Usaha Homestay</a>
              </li>
            </ul>
          </li>
          {{-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#transaksi" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-tags"></i>
              <span class="nav-link-text" style="font-size: small">
                Status Transaksi</span>
            </a>
            <ul class="sidenav-third-level collapse" id="transaksi" style="background-color:#EEEEEE">
              <li>
                <a href="{{route('status_trans_admin')}}" style="font-size: small">Menunggu Pembayaran</a>
              </li>
              <li>
                <a href="#" style="font-size: small">Terkonfirmasi</a>
              </li>
            </ul>
          </li> --}}
        @endif
        @if (Auth::user()->id_roles == 1)
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-hdd-o"></i>
              <span class="nav-link-text" style="font-size: small">
                Data Master</span>
            </a>
            <ul class="sidenav-third-level collapse" id="collapseExamplePages" style="background-color:#EEEEEE">
              <li>
                <a href="{{ URL::to('userList') }}" style="font-size: small">Data Pengguna</a>
              </li>
              <li>
                <a href="{{ URL::to('businessList/1') }}" style="font-size: small">Data Wisata</a>
              </li>
              <li>
                <a href="{{ URL::to('businessList/2') }}" style="font-size: small">Data Homestay</a>
              </li>
            </ul>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#riwayat_transaksi" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-tags"></i>
              <span class="nav-link-text" style="font-size: small">
                Riwayat Transaksi</span>
            </a>
            <ul class="sidenav-third-level collapse" id="riwayat_transaksi" style="background-color:#EEEEEE">
              <li>
                <a href="{{route('status_trans_spadmin')}}" style="font-size: small">Semua Transaksi</a>
              </li>
              <li>
                <a href="#" style="font-size: small">Statistik Transaksi</a>
              </li>
              {{-- <li>
                <a href="#" style="font-size: small">Menunggu Pembayaran</a>
              </li>
              <li>
                <a href="#" style="font-size: small">Terkonfirmasi</a>
              </li>
              <li>
                <a href="#" style="font-size: small">Usang</a>
              </li> --}}
            </ul>
          </li>
        @endif
        <li></li>
        </ul>

        {{-- <ul class="navbar-nav sidenav-toggler">
          <li class="nav-item">
            <a class="nav-link text-center" id="sidenavToggler">
              <i class="fa fa-fw fa-angle-left"></i>
            </a>
          </li>
        </ul> --}}
        <ul class="navbar-nav ml-auto">
          {{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle mr-lg-2" href="#" id="messagesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-fw fa-envelope" style="color:#FFFFFF"></i>
              <span class="d-lg-none">Messages
                <span class="badge badge-pill badge-primary">12 New</span>
              </span>
              <span class="new-indicator text-primary d-none d-lg-block">
                <i class="fa fa-fw fa-circle"></i>
                <span class="number">12</span>
              </span>
            </a>
            <div class="dropdown-menu" aria-labelledby="messagesDropdown">
              <h6 class="dropdown-header">New Messages:</h6>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <strong>David Miller</strong>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <strong>Jane Smith</strong>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <strong>John Doe</strong>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item small" href="#">
                View all messages
              </a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle mr-lg-2" href="#" id="alertsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-fw fa-bell" style="color:#FFFFFF"></i>
              <span class="d-lg-none">Alerts
                <span class="badge badge-pill badge-warning">6 New</span>
              </span>
              <span class="new-indicator text-warning d-none d-lg-block">
                <i class="fa fa-fw fa-circle"></i>
                <span class="number">6</span>
              </span>
            </a>
            <div class="dropdown-menu" aria-labelledby="alertsDropdown">
              <h6 class="dropdown-header">New Alerts:</h6>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <span class="text-success">
                  <strong>
                    <i class="fa fa-long-arrow-up"></i>
                    Status Update</strong>
                </span>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <span class="text-danger">
                  <strong>
                    <i class="fa fa-long-arrow-down"></i>
                    Status Update</strong>
                </span>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <span class="text-success">
                  <strong>
                    <i class="fa fa-long-arrow-up"></i>
                    Status Update</strong>
                </span>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item small" href="#">
                View all alerts
              </a>
            </div>
          </li> --}}
          <!-- <li class="nav-item">
            <form class="form-inline my-2 my-lg-0 mr-lg-2">
              <div class="input-group">
                <input type="text" class="form-control" style="font-size: small" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-primary" type="button">
                    <i class="fa fa-search"></i>
                  </button>
                </span>
              </div>
            </form>
          </li> -->
              <li class="nav-item" >
                  <a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModal">
                  <i class="fa fa-fw fa-sign-out" style="color:#FFFFFF"></i>
                  <span style="font-size: small; color:#FFFFFF">Keluar</span>
                  </a>
              </li>
          </ul>
        </ul>
      </div>
    </nav>

    <div class="content-wrapper">

      @yield('content')

    </div>
    <!-- /.content-wrapper -->

    <footer class="sticky-footer" style="background-color:#0091EA">
      <div class="container">
        <div class="text-center">
          <small style="color:#FFFFFF">&copy; Backpacker Indonesia 2018</small>
        </div>
      </div>
    </footer>

    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <!-- Logout Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Untuk Keluar?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="font-size:small">
            Pilih "Keluar" jika anda ingin keluar dan mengakhiri <i>session</i> saat ini.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-size:small">Batal</button>
            <a class="btn btn-danger" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();" style="font-size:small">
                Keluar
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ asset ('vendor/jquery/jquery.min.js') }}"></script>
    <!--sweetalert--->
    @include('sweet::alert')
    <script type="text/javascript" src="{{ asset ('vendor/popper/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset ('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Plugin JavaScript -->
    <script type="text/javascript" src="{{ asset ('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset ('vendor/chart.js/Chart.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset ('vendor/datatables/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset ('vendor/datatables/dataTables.bootstrap4.js') }}"></script>

    <!-- Custom scripts for this template -->
    <script type="text/javascript" src="{{ asset ('js/sb-admin.js') }}"></script>
    <!--time picker-->


    <script>
    $(document).ready(function () {
      $(".gllpLatlonPicker").each(function () {
        $obj = $(document).gMapsLatLonPicker();

        $obj.params.strings.markerText = "Drag this Marker (example edit)";

        $obj.params.displayError = function (message) {
          console.log("MAPS ERROR: " + message); // instead of alert()
        };

        $obj.init($(this));
      });
    });
    </script>
    <script src="{{asset ('js/jquery-gmaps-latlon-picker.js')}}"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNCLpP1-MDxBA1drkMHCAUhRrKL-LzZls"></script>
    <script>
    $.gMapsLatLonPickerNoAutoInit = 1;
    </script>

  </body>

</html>
