@extends('layouts.main')
@section('content')

  <div class="container-fluid">
    <div class="col-lg">
          <div class="form-group col-lg-12" style="font-size: small">
            <div class="row">
              <div class="col-lg-12" style="box-shadow: 3px 4px 1px #EEEEEE;border-radius:7px; background-color: #00B0FF; margin-top:20px; padding:25px" >
                <div class="row">
                  <div class="col-lg-4" align="center">
                    <img src="{{asset('tickets.svg')}}" alt="" width="120px">
                  </div>
                  <div class="col-lg-7">
                    <div class="row">
                      <span style="color:#ffffff;"><h4><strong>E-Ticket History</strong></h4></span>
                        <br>
                        <span style="color:#ffffff; font-size:small">

                          E-ticket history menampung semua riwatat tiket yang pernah anda pesan sebelumnya
                          semua tiket dari riwayat transaksi anda tersimpan disini,
                          anda tidak perlu khawatir untuk kehilangan tiket.
                          <br>Hilang tiket ? cek disini dan cetak kembali !
                        </span>
                    </div>
                  </div>
                  <div class="col-lg-1"></div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                @foreach ($paid as $index=>$data)
                <div class="col-lg-12" style="box-shadow: 3px 4px 5px #EEEEEE;border-radius:7px; background-color: #fafafa; margin-top:20px; padding:25px" >
                <div class="row">
                  <div class="col-lg-12">
                    <span style="color:#000000;"><h5><strong>#BACKIND2018{{$data->booking_detail->id_booking+100}}</strong></h5></span>
                  </div>
                  <div class="col-lg-12" style="background-color: #f5f5f5; margin-top:10px; margin-bottom:10px; padding:10px">
                    @if ($data->booking_detail->id_homestay == !null)
                    <span style="color:#424242;font-size:11pt"><strong>Nama Homestay : {{$data->booking_detail->homestay->business_details->business_name}}</strong></span>

                    <div class="row" style="margin-top:10px">
                      <div class="col-lg-6">
                        <span style="color:#757575;"><strong>TANGGAL MASUK</strong></span>
                      </div>
                      <div class="col-lg-6">
                        <span style="color:#757575;"><strong>TANGGAL KELUAR</strong></span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <span style="color:#757575;">{{date($data->booking_detail->checkin)}}</span>
                      </div>
                      <div class="col-lg-6">
                        <span style="color:#757575;">{{date($data->booking_detail->checkout)}}</span>
                      </div>
                    </div>
                  @endif
                    @if ($data->booking_detail->id_tourism == !null)
                    <hr>
                    <span style="color:#424242; font-size:11pt"><strong>Nama Wisata : {{$data->booking_detail->tourism->business_details->business_name}}</strong></span>
                    <div class="row" style="margin-top:10px">
                      <div class="col-lg-12">
                        <span style="color:#757575;"><strong>TANGGAL BERLAKU TIKET WISATA </strong></span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <span style="color:#757575;">{{date($data->booking_detail->checkin_tourism)}}</span>
                      </div>
                    </div>
                    @endif
                  </div>
                  <div class="col-lg-12">
                    <div style="border-radius:15px; padding: 3px; background-color: #00C853; color:#ffffff">
                      <span style="margin-left:15px">E-TICKET ISSUED</span>
                    </div>
                  </div>
                    <div class="col-lg-12" style="margin-top:10px">
                      <div class="row">
                        <div class="col-lg-8"></div>
                        <div class="col-lg-4">
                          <button style="font-size:small; width:100%" type="submit" class="btn btn-info" data-toggle="modal" data-target="#wait{{$index}}" >
                            Detail
                          </button>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
              <div class="modal fade" id="wait{{$index}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header" style="background-color: #00B0FF;">
                      <h6 class="modal-title" id="exampleModalLabel" style="color:#ffffff"></h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="row">
                              <div class="col-lg-8">
                              </div>
                              <div class="col-lg-4">
                                  <img src="{{asset('backind_blue.png')}}" width="100px" style="">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-12">
                                <span style="color:#000000;font-size:small"><strong>Receipt</strong></span>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-12">
                                <span style="color:#000000;font-size:10px">Nomor Transaksi : #BACKIND2018{{$data->booking_detail->id_booking+100}}</span>
                              </div>
                            </div>
                            <hr>
                            </div>
                            <div class="col-lg-6">
                            <div class="col-lg-12">
                              <div class="row">
                                <div class="col-lg-12">
                                  <span style="color:#000000;font-size:small"><strong>Customer Details</strong></span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-4">
                                  <span style="color:#000000;font-size:10px">Name</span>
                                </div>
                                <div class="col-lg-0">
                                  <span style="color:#000000;font-size:10px">:</span>
                                </div>
                                <div class="col-lg-6">
                                  <span style="color:#000000;font-size:10px">{{$data->booking_detail->user->name}}</span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-4">
                                  <span style="color:#000000;font-size:10px">Email</span>
                                </div>
                                <div class="col-lg-0">
                                  <span style="color:#000000;font-size:10px">:</span>
                                </div>
                                <div class="col-lg-6">
                                  <span style="color:#000000;font-size:10px">{{$data->booking_detail->user->email}}</span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-4">
                                  <span style="color:#000000;font-size:10px">Phone</span>
                                </div>
                                <div class="col-lg-0">
                                  <span style="color:#000000;font-size:10px">:</span>
                                </div>
                                <div class="col-lg-6">
                                  <span style="color:#000000;font-size:10px">{{$data->booking_detail->user->phone_number}}</span>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6">
                          <div class="col-lg-12">
                            <div class="row">
                              <div class="col-lg-12">
                                <span style="color:#000000;font-size:small"><strong>Destination Details</strong></span>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-4">
                                <span style="color:#000000;font-size:10px">Homestay</span>
                              </div>
                              <div class="col-lg-0">
                                <span style="color:#000000;font-size:10px">:</span>
                              </div>
                              <div class="col-lg-6">
                                @if ($data->booking_detail->id_homestay != null)
                                <span style="color:#000000;font-size:10px">{{$data->booking_detail->homestay->business_details->business_name}}</span>
                                @else
                                  <span style="color:#000000;font-size:10px"> - </span>
                                @endif
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-4">
                                <span style="color:#000000;font-size:10px">Tourism</span>
                              </div>
                              <div class="col-lg-0">
                                <span style="color:#000000;font-size:10px">:</span>
                              </div>
                              <div class="col-lg-6">
                                @if ($data->booking_detail->id_tourism != null)
                                      <span style="color:#000000;font-size:10px">{{$data->booking_detail->tourism->business_details->business_name}}</span>
                                    @else
                                      <span style="color:#000000;font-size:10px"> - </span>
                                @endif
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <hr>
                        </div>
                        <div class="col-lg-12">
                        <div class="col-lg-12">
                          <div class="row">
                            <div class="col-lg-12">
                              <span style="color:#000000;font-size:small"><strong>Purchase Details</strong></span>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <table width="100%">
                                <thead align="center" style="background-color:#eeeeee">
                                  <td><span style="color:#000000;font-size:small">No</span</td>
                                  <td><span style="color:#000000;font-size:small">Destination</span></td>
                                  <td><span style="color:#000000;font-size:small">Total per unit</span></td>
                                </thead>
                                <tbody>
                                    <td valign="top" align="center"><span style="color:#000000;font-size:10px">1.</span></td>
                                    <td>
                                      <span style="color:#000000;font-size:10px">
                                        @if ($data->booking_detail->id_homestay != null && $data->booking_detail->id_tourism != null)
                                        {{$data->booking_detail->homestay->business_details->business_name}}<br>
                                        {{$data->booking_detail->tourism->business_details->business_name}}
                                        @elseif($data->booking_detail->id_tourism != null)
                                        {{$data->booking_detail->tourism->business_details->business_name}}
                                        @elseif($data->booking_detail->id_homestay != null)
                                            {{$data->booking_detail->homestay->business_details->business_name}}
                                        @endif
                                      </span>
                                    </td>
                                    <td align="right">
                                      <span style="color:#000000;font-size:10px">
                                        @if ($data->booking_detail->id_homestay != null && $data->booking_detail->id_tourism != null)
                                        Rp.{{number_format($data->booking_detail->homestay->business_details->business_price)}}<br>
                                        Rp.{{number_format($data->booking_detail->tourism->business_details->business_price)}}
                                        @elseif($data->booking_detail->id_tourism != null)
                                          Rp.{{number_format($data->booking_detail->tourism->business_details->business_price)}}
                                        @elseif($data->booking_detail->id_homestay != null)
                                            Rp.{{number_format($data->booking_detail->homestay->business_details->business_price)}}
                                        @endif
                                      </span>
                                    </td>

                                </tbody>
                                <tbody align="right">
                                  <tr>
                                    <td colspan="2">
                                      <span style="color:#000000;font-size:10px"> Total </span>
                                    </td>
                                    <td>
                                      <span style="color:#000000;font-size:10px">
                                      @if ($data->booking_detail->id_tourism != null && $data->booking_detail->id_homestay != null)
                                          Rp.{{number_format($data->booking_detail->homestay->business_details->business_price + $data->booking_detail->tourism->business_details->business_price)}}
                                      @elseif ($data->booking_detail->id_tourism != null)
                                        Rp.{{number_format($data->booking_detail->tourism->business_details->business_price)}}
                                      @elseif ($data->booking_detail->id_homestay != null)
                                          Rp.{{number_format($data->booking_detail->homestay->business_details->business_price)}}
                                        @endif
                                      </span>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="2">
                                      <span style="color:#000000;font-size:10px"> Administration Fee (+)</span>
                                    </td>
                                    <td>
                                      <span style="color:#000000;font-size:10px">
                                        +Rp.{{$data->booking_detail->id_booking+100}}
                                      </span>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" style="background-color:#eeeeee">
                                      <span style="color:#000000;font-size:10px"> Payment Amount</span>
                                    </td>
                                    <td style="background-color:#eeeeee">
                                      <span style="color:#000000;font-size:10px">
                                        <strong>Rp.{{number_format($data->booking_detail->total_cost)}}</strong>
                                      </span>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal" style="color:#FFFFFF; font-size:small">Cancel</button>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" style="color:#FFFFFF; font-size:small" class="btn btn-info">Kirim ulang ke email</button></td>

                        <a href="{{route('printPaidTicket',['id'=> $data->booking_detail->id_booking])}}">
                        <button type="submit" style="color:#FFFFFF; font-size:small" class="btn btn-primary">Cetak</button></td>
                        </a>

                      </form>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
              </div>

              {{-- wait section --}}
              <div class="col-lg-4">
                @foreach ($wait as $index=>$data)
                <div class="col-lg-12" style="box-shadow: 3px 4px 5px #EEEEEE;border-radius:7px; background-color: #fafafa; margin-top:20px; padding:25px" >
                <div class="row">
                  <div class="col-lg-12">
                    <span style="color:#000000;"><h5><strong>#BACKIND2018{{$data->booking_detail->id_booking+100}}</strong></h5></span>
                  </div>
                  <div class="col-lg-12" style="background-color: #f5f5f5; margin-top:10px; margin-bottom:10px; padding:10px">
                    @if ($data->booking_detail->id_homestay == !null)
                    <span style="color:#424242;font-size:11pt"><strong>Nama Homestay : {{$data->booking_detail->homestay->business_details->business_name}}</strong></span>

                    <div class="row" style="margin-top:10px">
                      <div class="col-lg-6">
                        <span style="color:#757575;"><strong>TANGGAL MASUK</strong></span>
                      </div>
                      <div class="col-lg-6">
                        <span style="color:#757575;"><strong>TANGGAL KELUAR</strong></span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <span style="color:#757575;">{{date($data->booking_detail->checkin)}}</span>
                      </div>
                      <div class="col-lg-6">
                        <span style="color:#757575;">{{date($data->booking_detail->checkout)}}</span>
                      </div>
                    </div>
                  @endif
                    @if ($data->booking_detail->id_tourism == !null)
                    <hr>
                    <span style="color:#424242; font-size:11pt"><strong>Nama Wisata : {{$data->booking_detail->tourism->business_details->business_name}}</strong></span>
                    <div class="row" style="margin-top:10px">
                      <div class="col-lg-12">
                        <span style="color:#757575;"><strong>TANGGAL BERLAKU TIKET WISATA </strong></span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <span style="color:#757575;">{{date($data->booking_detail->checkin_tourism)}}</span>
                      </div>
                    </div>
                    @endif
                  </div>
                  <div class="col-lg-12">
                    <div style="border-radius:15px; padding: 3px; background-color: #FFD600; color:#ffffff">
                      <span style="margin-left:15px">WAITING PAYMENT</span>
                    </div>
                  </div>
                    <div class="col-lg-12" style="margin-top:10px">
                      <div class="row">
                        <div class="col-lg-8"></div>
                        <div class="col-lg-4">
                          <button style="font-size:small; width:100%" type="submit" class="btn btn-info" data-toggle="modal" data-target="#wait{{$index}}" >
                            Detail
                          </button>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
              <div class="modal fade" id="wait{{$index}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header" style="background-color: #00B0FF;">
                      <h6 class="modal-title" id="exampleModalLabel" style="color:#ffffff"></h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="row">
                              <div class="col-lg-8">
                              </div>
                              <div class="col-lg-4">
                                  <img src="{{asset('backind_blue.png')}}" width="100px" style="">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-12">
                                <span style="color:#000000;font-size:small"><strong>Receipt</strong></span>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-12">
                                <span style="color:#000000;font-size:10px">Nomor Transaksi : #BACKIND2018{{$data->booking_detail->id_booking+100}}</span>
                              </div>
                            </div>
                            <hr>
                            </div>
                            <div class="col-lg-6">
                            <div class="col-lg-12">
                              <div class="row">
                                <div class="col-lg-12">
                                  <span style="color:#000000;font-size:small"><strong>Customer Details</strong></span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-4">
                                  <span style="color:#000000;font-size:10px">Name</span>
                                </div>
                                <div class="col-lg-0">
                                  <span style="color:#000000;font-size:10px">:</span>
                                </div>
                                <div class="col-lg-6">
                                  <span style="color:#000000;font-size:10px">{{$data->booking_detail->user->name}}</span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-4">
                                  <span style="color:#000000;font-size:10px">Email</span>
                                </div>
                                <div class="col-lg-0">
                                  <span style="color:#000000;font-size:10px">:</span>
                                </div>
                                <div class="col-lg-6">
                                  <span style="color:#000000;font-size:10px">{{$data->booking_detail->user->email}}</span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-4">
                                  <span style="color:#000000;font-size:10px">Phone</span>
                                </div>
                                <div class="col-lg-0">
                                  <span style="color:#000000;font-size:10px">:</span>
                                </div>
                                <div class="col-lg-6">
                                  <span style="color:#000000;font-size:10px">{{$data->booking_detail->user->phone_number}}</span>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6">
                          <div class="col-lg-12">
                            <div class="row">
                              <div class="col-lg-12">
                                <span style="color:#000000;font-size:small"><strong>Destination Details</strong></span>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-4">
                                <span style="color:#000000;font-size:10px">Homestay</span>
                              </div>
                              <div class="col-lg-0">
                                <span style="color:#000000;font-size:10px">:</span>
                              </div>
                              <div class="col-lg-6">
                                @if ($data->booking_detail->id_homestay != null)
                                <span style="color:#000000;font-size:10px">{{$data->booking_detail->homestay->business_details->business_name}}</span>
                                @else
                                  <span style="color:#000000;font-size:10px"> - </span>
                                @endif
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-4">
                                <span style="color:#000000;font-size:10px">Tourism</span>
                              </div>
                              <div class="col-lg-0">
                                <span style="color:#000000;font-size:10px">:</span>
                              </div>
                              <div class="col-lg-6">
                                @if ($data->booking_detail->id_tourism != null)
                                      <span style="color:#000000;font-size:10px">{{$data->booking_detail->tourism->business_details->business_name}}</span>
                                    @else
                                      <span style="color:#000000;font-size:10px"> - </span>
                                @endif
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <hr>
                        </div>
                        <div class="col-lg-12">
                        <div class="col-lg-12">
                          <div class="row">
                            <div class="col-lg-12">
                              <span style="color:#000000;font-size:small"><strong>Purchase Details</strong></span>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <table width="100%">
                                <thead align="center" style="background-color:#eeeeee">
                                  <td><span style="color:#000000;font-size:small">No</span</td>
                                  <td><span style="color:#000000;font-size:small">Destination</span></td>
                                  <td><span style="color:#000000;font-size:small">Total per unit</span></td>
                                </thead>
                                <tbody>
                                    <td valign="top" align="center"><span style="color:#000000;font-size:10px">1.</span></td>
                                    <td>
                                      <span style="color:#000000;font-size:10px">
                                        @if ($data->booking_detail->id_homestay != null && $data->booking_detail->id_tourism != null)
                                        {{$data->booking_detail->homestay->business_details->business_name}}<br>
                                        {{$data->booking_detail->tourism->business_details->business_name}}
                                        @elseif($data->booking_detail->id_tourism != null)
                                        {{$data->booking_detail->tourism->business_details->business_name}}
                                        @elseif($data->booking_detail->id_homestay != null)
                                            {{$data->booking_detail->homestay->business_details->business_name}}
                                        @endif
                                      </span>
                                    </td>
                                    <td align="right">
                                      <span style="color:#000000;font-size:10px">
                                        @if ($data->booking_detail->id_homestay != null && $data->booking_detail->id_tourism != null)
                                        Rp.{{number_format($data->booking_detail->homestay->business_details->business_price)}}<br>
                                        Rp.{{number_format($data->booking_detail->tourism->business_details->business_price)}}
                                        @elseif($data->booking_detail->id_tourism != null)
                                          Rp.{{number_format($data->booking_detail->tourism->business_details->business_price)}}
                                        @elseif($data->booking_detail->id_homestay != null)
                                            Rp.{{number_format($data->booking_detail->homestay->business_details->business_price)}}
                                        @endif
                                      </span>
                                    </td>

                                </tbody>
                                <tbody align="right">
                                  <tr>
                                    <td colspan="2">
                                      <span style="color:#000000;font-size:10px"> Total </span>
                                    </td>
                                    <td>
                                      <span style="color:#000000;font-size:10px">
                                      @if ($data->booking_detail->id_tourism != null && $data->booking_detail->id_homestay != null)
                                          Rp.{{number_format($data->booking_detail->homestay->business_details->business_price + $data->booking_detail->tourism->business_details->business_price)}}
                                      @elseif ($data->booking_detail->id_tourism != null)
                                        Rp.{{number_format($data->booking_detail->tourism->business_details->business_price)}}
                                      @elseif ($data->booking_detail->id_homestay != null)
                                          Rp.{{number_format($data->booking_detail->homestay->business_details->business_price)}}
                                        @endif
                                      </span>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="2">
                                      <span style="color:#000000;font-size:10px"> Administration Fee (+)</span>
                                    </td>
                                    <td>
                                      <span style="color:#000000;font-size:10px">
                                        +Rp.{{$data->booking_detail->id_booking+100}}
                                      </span>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" style="background-color:#eeeeee">
                                      <span style="color:#000000;font-size:10px"> Payment Amount</span>
                                    </td>
                                    <td style="background-color:#eeeeee">
                                      <span style="color:#000000;font-size:10px">
                                        <strong>Rp.{{number_format($data->booking_detail->total_cost)}}</strong>
                                      </span>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal" style="color:#FFFFFF; font-size:small">Cancel</button>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" style="color:#FFFFFF; font-size:small" class="btn btn-info">Kirim ulang ke email</button></td>

                        <a href="{{route('printWaitTicket',['id'=> $data->booking_detail->id_booking])}}">
                        <button type="submit" style="color:#FFFFFF; font-size:small" class="btn btn-primary">Cetak</button></td>
                        </a>

                      </form>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
              </div>

              {{-- expired section --}}
              <div class="col-lg-4">
                @foreach ($exp as $index=>$data)
                <div class="col-lg-12" style="box-shadow: 3px 4px 5px #EEEEEE;border-radius:7px; background-color: #fafafa; margin-top:20px; padding:25px" >
                <div class="row">
                  <div class="col-lg-12">
                    <span style="color:#000000;"><h5><strong>#BACKIND2018{{$data->booking_detail->id_booking+100}}</strong></h5></span>
                  </div>
                  <div class="col-lg-12" style="background-color: #f5f5f5; margin-top:10px; margin-bottom:10px; padding:10px">
                    @if ($data->booking_detail->id_homestay == !null)
                    <span style="color:#424242;font-size:11pt"><strong>Nama Homestay : {{$data->booking_detail->homestay->business_details->business_name}}</strong></span>

                    <div class="row" style="margin-top:10px">
                      <div class="col-lg-6">
                        <span style="color:#757575;"><strong>TANGGAL MASUK</strong></span>
                      </div>
                      <div class="col-lg-6">
                        <span style="color:#757575;"><strong>TANGGAL KELUAR</strong></span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <span style="color:#757575;">{{date($data->booking_detail->checkin)}}</span>
                      </div>
                      <div class="col-lg-6">
                        <span style="color:#757575;">{{date($data->booking_detail->checkout)}}</span>
                      </div>
                    </div>
                  @endif
                    @if ($data->booking_detail->id_tourism == !null)
                    <hr>
                    <span style="color:#424242; font-size:11pt"><strong>Nama Wisata : {{$data->booking_detail->tourism->business_details->business_name}}</strong></span>
                    <div class="row" style="margin-top:10px">
                      <div class="col-lg-12">
                        <span style="color:#757575;"><strong>TANGGAL BERLAKU TIKET WISATA </strong></span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <span style="color:#757575;">{{date($data->booking_detail->checkin_tourism)}}</span>
                      </div>
                    </div>
                    @endif
                  </div>
                  <div class="col-lg-12">
                    <div style="border-radius:15px; padding: 3px; background-color: #D50000; color:#ffffff">
                      <span style="margin-left:15px">EXPIRED</span>
                    </div>
                  </div>
                    <div class="col-lg-12" style="margin-top:10px">
                      <div class="row">
                        <div class="col-lg-8"></div>
                        <div class="col-lg-4">
                          <button style="font-size:small; width:100%" type="submit" class="btn btn-info" data-toggle="modal" data-target="#wait{{$index}}" >
                            Detail
                          </button>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
              <div class="modal fade" id="wait{{$index}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header" style="background-color: #00B0FF;">
                      <h6 class="modal-title" id="exampleModalLabel" style="color:#ffffff"></h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="row">
                              <div class="col-lg-8">
                              </div>
                              <div class="col-lg-4">
                                  <img src="{{asset('backind_blue.png')}}" width="100px" style="">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-12">
                                <span style="color:#000000;font-size:small"><strong>Receipt</strong></span>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-12">
                                <span style="color:#000000;font-size:10px">Nomor Transaksi : #BACKIND2018{{$data->booking_detail->id_booking+100}}</span>
                              </div>
                            </div>
                            <hr>
                            </div>
                            <div class="col-lg-6">
                            <div class="col-lg-12">
                              <div class="row">
                                <div class="col-lg-12">
                                  <span style="color:#000000;font-size:small"><strong>Customer Details</strong></span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-4">
                                  <span style="color:#000000;font-size:10px">Name</span>
                                </div>
                                <div class="col-lg-0">
                                  <span style="color:#000000;font-size:10px">:</span>
                                </div>
                                <div class="col-lg-6">
                                  <span style="color:#000000;font-size:10px">{{$data->booking_detail->user->name}}</span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-4">
                                  <span style="color:#000000;font-size:10px">Email</span>
                                </div>
                                <div class="col-lg-0">
                                  <span style="color:#000000;font-size:10px">:</span>
                                </div>
                                <div class="col-lg-6">
                                  <span style="color:#000000;font-size:10px">{{$data->booking_detail->user->email}}</span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-4">
                                  <span style="color:#000000;font-size:10px">Phone</span>
                                </div>
                                <div class="col-lg-0">
                                  <span style="color:#000000;font-size:10px">:</span>
                                </div>
                                <div class="col-lg-6">
                                  <span style="color:#000000;font-size:10px">{{$data->booking_detail->user->phone_number}}</span>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6">
                          <div class="col-lg-12">
                            <div class="row">
                              <div class="col-lg-12">
                                <span style="color:#000000;font-size:small"><strong>Destination Details</strong></span>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-4">
                                <span style="color:#000000;font-size:10px">Homestay</span>
                              </div>
                              <div class="col-lg-0">
                                <span style="color:#000000;font-size:10px">:</span>
                              </div>
                              <div class="col-lg-6">
                                @if ($data->booking_detail->id_homestay != null)
                                <span style="color:#000000;font-size:10px">{{$data->booking_detail->homestay->business_details->business_name}}</span>
                                @else
                                  <span style="color:#000000;font-size:10px"> - </span>
                                @endif
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-4">
                                <span style="color:#000000;font-size:10px">Tourism</span>
                              </div>
                              <div class="col-lg-0">
                                <span style="color:#000000;font-size:10px">:</span>
                              </div>
                              <div class="col-lg-6">
                                @if ($data->booking_detail->id_tourism != null)
                                      <span style="color:#000000;font-size:10px">{{$data->booking_detail->tourism->business_details->business_name}}</span>
                                    @else
                                      <span style="color:#000000;font-size:10px"> - </span>
                                @endif
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <hr>
                        </div>
                        <div class="col-lg-12">
                        <div class="col-lg-12">
                          <div class="row">
                            <div class="col-lg-12">
                              <span style="color:#000000;font-size:small"><strong>Purchase Details</strong></span>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <table width="100%">
                                <thead align="center" style="background-color:#eeeeee">
                                  <td><span style="color:#000000;font-size:small">No</span</td>
                                  <td><span style="color:#000000;font-size:small">Destination</span></td>
                                  <td><span style="color:#000000;font-size:small">Total per unit</span></td>
                                </thead>
                                <tbody>
                                    <td valign="top" align="center"><span style="color:#000000;font-size:10px">1.</span></td>
                                    <td>
                                      <span style="color:#000000;font-size:10px">
                                        @if ($data->booking_detail->id_homestay != null && $data->booking_detail->id_tourism != null)
                                        {{$data->booking_detail->homestay->business_details->business_name}}<br>
                                        {{$data->booking_detail->tourism->business_details->business_name}}
                                        @elseif($data->booking_detail->id_tourism != null)
                                        {{$data->booking_detail->tourism->business_details->business_name}}
                                        @elseif($data->booking_detail->id_homestay != null)
                                            {{$data->booking_detail->homestay->business_details->business_name}}
                                        @endif
                                      </span>
                                    </td>
                                    <td align="right">
                                      <span style="color:#000000;font-size:10px">
                                        @if ($data->booking_detail->id_homestay != null && $data->booking_detail->id_tourism != null)
                                        Rp.{{number_format($data->booking_detail->homestay->business_details->business_price)}}<br>
                                        Rp.{{number_format($data->booking_detail->tourism->business_details->business_price)}}
                                        @elseif($data->booking_detail->id_tourism != null)
                                          Rp.{{number_format($data->booking_detail->tourism->business_details->business_price)}}
                                        @elseif($data->booking_detail->id_homestay != null)
                                            Rp.{{number_format($data->booking_detail->homestay->business_details->business_price)}}
                                        @endif
                                      </span>
                                    </td>

                                </tbody>
                                <tbody align="right">
                                  <tr>
                                    <td colspan="2">
                                      <span style="color:#000000;font-size:10px"> Total </span>
                                    </td>
                                    <td>
                                      <span style="color:#000000;font-size:10px">
                                      @if ($data->booking_detail->id_tourism != null && $data->booking_detail->id_homestay != null)
                                          Rp.{{number_format($data->booking_detail->homestay->business_details->business_price + $data->booking_detail->tourism->business_details->business_price)}}
                                      @elseif ($data->booking_detail->id_tourism != null)
                                        Rp.{{number_format($data->booking_detail->tourism->business_details->business_price)}}
                                      @elseif ($data->booking_detail->id_homestay != null)
                                          Rp.{{number_format($data->booking_detail->homestay->business_details->business_price)}}
                                        @endif
                                      </span>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="2">
                                      <span style="color:#000000;font-size:10px"> Administration Fee (+)</span>
                                    </td>
                                    <td>
                                      <span style="color:#000000;font-size:10px">
                                        +Rp.{{$data->booking_detail->id_booking+100}}
                                      </span>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" style="background-color:#eeeeee">
                                      <span style="color:#000000;font-size:10px"> Payment Amount</span>
                                    </td>
                                    <td style="background-color:#eeeeee">
                                      <span style="color:#000000;font-size:10px">
                                        <strong>Rp.{{number_format($data->booking_detail->total_cost)}}</strong>
                                      </span>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal" style="color:#FFFFFF; font-size:small">Cancel</button>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" style="color:#FFFFFF; font-size:small" class="btn btn-info">Kirim ulang ke email</button></td>

                        <a href="{{route('printExpTicket',['id'=> $data->booking_detail->id_booking])}}">
                        <button type="submit" style="color:#FFFFFF; font-size:small" class="btn btn-primary">Cetak</button></td>
                        </a>

                      </form>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
              </div>

            </div>
          </div>
    </div>
  </div>
@endsection
