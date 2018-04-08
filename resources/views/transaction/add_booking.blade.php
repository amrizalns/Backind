@extends('layouts.main')
@section('content')

  <div class="card-body">
    <span style="color:#0285CC ; font-weight:bold ; font-size:large">Menu Transaksi Pemesanan</span><br>
    <span style="color:#27607F; font-size:small">Backind Administrator - Nikmati segala kenyamanan dan kemudahan transaksi disini.</span>
    <hr>
  </div>
  <div class="container-fluid">
    <div class="col-lg">
      <div class="card-body" align="center" style="margin-bottom:10px">
        <span style="color:#0285CC ; font-weight:bold ; font-size:large;">Keuntungan Transaksi di Backind</span><br>
      </div>
      <div class="container-fluid" style="margin-bottom:70px">
        <div class="col-lg">
            <table>
              <tr>
                <td>
                  <table width="400px" style="margin-left:50px">
                    <tr>
                      <td rowspan="2">
                        <img src="{{asset('padlock.svg')}}" width="150px" style="padding:30px">
                      </td>
                      <td>
                        <span style="color:#4D6E7F ; font-weight:bold ; font-size:medium">Keamanan Transaksi</span><br>
                      </td>
                    </tr>
                    <tr>
                      <td valign="top">
                        <span style="color:#27607F; font-size:small; ">
                          Kamu tidak perlu khawatir tidak mendapatkan bukti transaksi, karena
                          status transaksi beserta e-tiket akan langsung dikirimkan ke email kamu.
                        </span>
                      </td>
                    </tr>
                  </table>
                </td>
                <td>
                  <table width="400px" style="margin-left:50px">
                    <tr>
                      <td rowspan="2">
                        <img src="{{asset('cash.svg')}}" width="150px" style=" padding:30px">
                      </td>
                      <td>
                        <span style="color:#4D6E7F ; font-weight:bold ; font-size:medium">Pilihan Pembayaran</span><br>
                      </td>
                    </tr>
                    <tr>
                      <td valign="top">
                        <span style="color:#27607F; font-size:small">
                          Banyak pilihan Bank untuk melakukan pembayaran transaksi yang sudah kamu lakukan,
                          lebih mudah dan cepat dengan berbagai pilihan metode pembayaran.
                        </span>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
            <table>
              <tr>
                <td height="30px">
                </td>
              </tr>
            </table>
            <table>
              <tr>
                <td>
                  <table width="400px" style="margin-left:50px">
                    <tr>
                      <td rowspan="2">
                        <img src="{{asset('queue.svg')}}" width="150px" style="padding:30px">
                      </td>
                      <td>
                        <span style="color:#4D6E7F ; font-weight:bold ; font-size:medium">Tidak Perlu Mengantri</span><br>
                      </td>
                    </tr>
                    <tr>
                      <td valign="top">
                        <span style="color:#27607F; font-size:small; ">
                          Dapatkan tiket wisata dan booking homestay dengan cepat tanpa harus mengantri,
                          pesan dimanapun dan kapanpun menggunakan Backind.
                        </span>
                      </td>
                    </tr>
                  </table>
                </td>
                <td>
                  <table width="400px" style="margin-left:50px">
                    <tr>
                      <td rowspan="2">
                        <img src="{{asset('calendar.svg')}}" width="150px" style=" padding:30px">
                      </td>
                      <td>
                        <span style="color:#4D6E7F ; font-weight:bold ; font-size:medium">Reservasi Jauh Hari</span><br>
                      </td>
                    </tr>
                    <tr>
                      <td valign="top">
                        <span style="color:#27607F; font-size:small">
                          Persiapkan rencana liburanmu jauh jauh hari, kini di Backind bisa pesan tiket dan
                          booking homestay mulai dari 90 hari sebelum tiba waktu liburanmu, berlaku untuk semua tiket wisata dan homestay.
                        </span>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
        </div>
      </div>

      <div class="card mb-3" style="background-color:#fafafa; border-radius:10px; border:0px">
        {{-- <div class="card-header" style="font-size: small">
          <i class="fa fa-paperclip"></i>
          Detail Pemesan
        </div> --}}
        <!--Form Pemesan-->
        <div class="card-body" style="font-size: small">
          <div class="form-group col-lg-6" style="font-size: small">
            <table style="width:200%; text-align: left;">
              <tr>
                <td>
                  <label style="font-size: small">Nama</label>
                </td>
                <td>
                  <label style="font-size: small"> : </label>
                </td>
                <td colspan="6">
                  <input readonly style="font-size: small" id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" disabled/>
                </td>
              </tr>
              <tr>
                <td colspan="6" style="height:10px"></td>
              </tr>
              <tr>
                <td>
                  <label style="font-size: small">Email</label>
                </td>
                <td>
                  <label style="font-size: small"> : </label>
                </td>
                <td>
                  <input readonly style="font-size: small" id="email" type="text" class="form-control" name="email" value="{{ Auth::user()->email }}" disabled/>                  </td>
                <td style="width:5%">
                </td>
                <td>
                  <label style="font-size: small">No Telepon/Handphone</label>
                </td>
                <td>
                  <label style="font-size: small"> : </label>
                </td>
                <td>
                  <input readonly style="font-size: small" id="phone_number" type="text" class="form-control" name="phone_number" value="{{ Auth::user()->phone_number }}" disabled/>
                </td>
              </tr>
              <tr>
                <td colspan="7" align="right">
                  <br>
                  <label style="font-size: small"> Data anda sudah benar ? </label>
                  <a href="#">
                    <label style="font-size: small"> ubah data. </label>
                  </a>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>

      <div class="card mb-3" style="background-color:#fafafa; border-radius:10px; border:0px">
        {{-- <div class="card-header" style="font-size: small">
          <i class="fa fa-paperclip"></i>
          Detail Transaksi
        </div> --}}
        <!--Form Transaksi-->
        <div class="card-body" style="font-size: small">
          <form method="POST" action="{{ route('list_booking')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
              <div class="form-group col-lg-12" style="font-size: small">
                <div class="row">
                  <div class="col-lg-5">
                    <label style="font-size: small">Tanggal Masuk </label>
                  </div>
                  <div class="col-lg-1">
                    <label style="font-size: small"> : </label>
                  </div>
                  <div class="col-lg-6">
                    <input style="font-size: small" id="checkin" type="date" class="form-control" name="checkin" value="" />
                  </div>
                </div>
                <div class="row" style="margin-top:1%">
                  <div class="col-lg-5">
                    <label style="font-size: small">Tanggal Keluar </label>
                  </div>
                  <div class="col-lg-1">
                    <label style="font-size: small"> : </label>
                  </div>
                  <div class="col-lg-6">
                    <input style="font-size: small" id="checkout" type="date" class="form-control" name="checkout" value="" />
                  </div>
                </div>
                <div class="row" style="margin-top:1%">
                  <div class="col-lg-5">
                    <label style="font-size: small">Homestay</label>
                  </div>
                  <div class="col-lg-1">
                    <label style="font-size: small"> : </label>
                  </div>
                  <div class="col-lg-6">
                    <select style="font-size: small" id="homestay" type="text" class="form-control" name="homestay" value=""/>
                        <option value="" disabled selected>pilih salah satu . . . </option>
                      @foreach ($homestay as $data)
                        @if ($data->business_status == 1)
                        <option value="{{$data->id_business}}">{{$data->business_details->business_name}}</option>
                        @else
                        <option value=""><i>not found</i></option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row" style="margin-top:1%; padding:0.5%; background-color:#F5F5F5">
                  <div class="col-lg-6" style="margin-top:1%">
                    <script type="text/javascript">
                        function ShowHideDiv(chkPassport) {
                            var dvPassport = document.getElementById("dvPassport");
                            dvPassport.style.display = chkPassport.checked ? "block" : "none";
                        }
                    </script>
                    <label for="chkPassport">
                        <input type="checkbox" id="chkPassport" onclick="ShowHideDiv(this)" />
                        <label style="font-style:italic; margin-left:10px">
                          Ingin Pesan Tiket Wisata ?
                        </label>
                    </label>
                  </div>
                </div>

                <div style="display: none" id="dvPassport">
                  <hr>
                <div class="row" style="margin-top:1%;">
                  <div class="col-lg-5">
                    <label style="font-size: small">Wisata</label>
                  </div>
                  <div class="col-lg-1">
                    <label style="font-size: small"> : </label>
                  </div>
                  <div class="col-lg-6">
                    <select style="font-size: small" id="tourism" type="text" class="form-control" name="tourism" value=""/>
                        <option value="" disabled selected>pilih salah satu . . . </option>
                      @foreach ($tourism as $data)
                        @if ($data->business_status == 1)
                          <option value="{{$data->id_business}}">{{$data->business_details->business_name}}</option>
                          @else
                          <option value=""><i>not found</i></option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row" style="margin-top:1%">
                  <div class="col-lg-5">
                    <label style="font-size: small">Tanggal Berkunjung</label>
                  </div>
                  <div class="col-lg-1">
                    <label style="font-size: small"> : </label>
                  </div>
                  <div class="col-lg-6">
                    <input style="font-size: small" id="checkin_tourism" type="date" class="form-control" name="checkin_tourism" value="" />
                  </div>
                </div>
                <hr>
                </div>

                <div class="row" style="margin-top:1%">
                  <div class="col-lg-5">
                    <label style="font-size: small">Jumlah Orang</label>
                  </div>
                  <div class="col-lg-1">
                    <label style="font-size: small"> : </label>
                  </div>
                  <div class="col-lg-6">
                    <select required style="font-size: small" id="total_ticket" type="text" class="form-control" name="total_ticket" value=""/>
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                    </select>
                  </div>
                </div>
              </div>
              <div>
                <button type="submit" class="btn btn-primary btn-block" style="font-size:small">
                  Lanjutkan transaksi
                </button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
