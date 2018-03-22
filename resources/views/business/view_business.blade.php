@extends('layouts.main')
@section('content')

<div class="card-body">
  <span style="color:#0285CC ; font-weight:bold ; font-size:large">Menu Lihat {{$menu->status}}</span>
  <br>
  <span style="color:#27607F; font-size:small">Backind Administrator</span>
  <hr>
</div>

<div class="container-fluid">
  <div class="col-lg">
    <div class="form-group {{ $errors->has('Business name') ? ' has-error' : '' }}">
      <table>
        <tr>
          <td>
            <table>
                <tr>
                  <td>
                    <img src="{{url('storage/'.$business_details->business_profile_pict)}}" class="img-responsive" style="width:200px; height:200px; border-radius:3%; object-fit:cover; margin-right:30px; margin-bottom:30px" >
                  </td>
                </tr>
            </table>
          </td>
          <td>
            <table>
              <tr>
                <td style="width:1%; white-space:nowrap">
                  <label style="font-size: small">Nama usaha</label>
                </td>
                <td>
                  <label style="font-size: small; padding-left: 5px; padding-right: 5px"> : </label>
                </td>
                <td>
                  <label style="font-size:small">{{$business_details->business_name}}</td>
              </tr>
              <tr>
                <td>
                  <label style="font-size: small">Email</label>
                </td>
                <td>
                  <label style="font-size: small; padding-left: 5px; padding-right: 5px"> : </label>
                </td>
                <td>
                  <label style="font-size:small" >{{$business_details->business_email}}</label>
                </td>
              </tr>
              <tr>
                <td>
                  <label style="font-size: small">Alamat</label>
                </td>
                <td>
                  <label style="font-size: small; padding-left: 5px; padding-right: 5px"> : </label>
                </td>
                <td>
                  <label style="font-size:small" >{{$business_details->business_address}}</label>
                </td>
              </tr>
              <tr>
                <td>
                  <label style="font-size: small">No telfon</label>
                </td>
                <td>
                  <label style="font-size: small; padding-left: 5px; padding-right: 5px"> : </label>
                </td>
                <td>
                  <label style="font-size:small" >{{$business_details->business_phone}}</label>
                </td>
              </tr>
              <tr>
                <td style="width:1%; white-space:nowrap">
                  <label style="font-size: small">Rentang harga</label>
                </td>
                <td>
                  <label style="font-size: small; padding-left: 5px; padding-right: 5px"> : </label>
                </td>
                <td>
                  <label style="font-size:small" >Rp. {{$business_details->business_price}}</label>
                </td>
              </tr>
              <tr valign = top>
                <td>
                  <label style="font-size: small;">Deskripsi</label>
                </td>
                <td>
                  <label style="font-size: small; padding-left: 5px; padding-right: 5px"> : </label>
                </td>
                <td>
                  <label style="font-size:small; text-align:justify;" >{{$business_details->business_desc}}</label>
                </td>
              </tr>
              <tr valign = top>
                <td>
                  <label style="font-size: small;">Foto</label>
                </td>
                <td>
                  <label style="font-size: small; padding-left: 5px; padding-right: 5px"> : </label>
                </td>
                <td>
                  @foreach ($business_details->pictures as $img)
                      <img src="{{asset('storage/'.$img->pict_url)}}" alt="">
                  @endforeach
                </td>
              </tr>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </div>
    <div class="col-lg">
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-bar-chart"></i>
          Statistik Penjualan Tiket
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-8 my-auto">
              <canvas id="myBarChart" width="100%" height="50%"></canvas>
            </div>
            <div class="col-sm-4 text-center my-auto">
              <div class="h4 mb-0 text-primary">$34,693</div>
              <div class="small text-muted">YTD Revenue</div>
              <hr>
              <div class="h4 mb-0 text-warning">$18,474</div>
              <div class="small text-muted">YTD Expenses</div>
              <hr>
              <div class="h4 mb-0 text-success">$16,219</div>
              <div class="small text-muted">YTD Margin</div>
            </div>
          </div>
        </div>
        <div class="card-footer small text-muted">
          Updated yesterday at 11:59 PM
        </div>
      </div>
    </div>
  </div>

{{-- data table kamar --}}
@if ($menu->id_menu == 2)
  <div class="col-lg">
    <hr>
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i>
        <span style="font-size:small">Data Kamar {{$menu->status}}</span>
      </div>
    <div class="card-body" style="font-size: small">
    <div class="table-responsive" style="font-size: small">

      <table class="table table-bordered" id="dataTable" cellspacing="0" style="font-size: small">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Kamar</th>
            <th>Kapasitas Kamar</th>
            {{-- <th>Email Usaha</th> --}}
            <th>Harga Kamar</th>
            <th>Jumlah Kamar</th>
            <th>Status Kamar</th>
            <th><center>Aksi</center></th>
        </tr>
        </thead>
          <tbody>

          </tbody>
     </table>
     <br>
     <div class="float-right">
    <a href="{{ route ('addbusiness', ['id' => $menu]) }}"><button class="btn btn-primary" style=" font-size:small;">Tambah Kamar</button></a>
     </div>
   </div>
  </div>
</div>
</div>
@endif
</div>
@endsection
