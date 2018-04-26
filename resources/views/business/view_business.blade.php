@extends('layouts.main')
@section('content')

<div class="card-body">
  <span style="color:#0285CC ; font-weight:bold ; font-size:large">Menu Detail Usaha {{$menu->status}}</span>
  <br>
  <span style="color:#27607F; font-size:small">Backind Administrator</span>
  <hr>
</div>

<div class="container-fluid">
    <div class="form-group col-lg-12" style="background-color:#fafafa; border-radius:10px; border:0px">
      <div class="row">
        <div class="col-lg-4" style="padding:25px">
          <img src="{{url('storage/'.$business_details->business_profile_pict)}}" class="img-responsive" style=" border: 1px solid #ddd; border-radius: 4px; padding: 5px; max-width: 250px; max-height: 200px; border-radius:3%; object-fit:cover" >
        </div>
        <div class="form-group col-lg-8" style="margin-top:25px">
          <div class="row">
            <div class="col-lg-3">
              <label style="font-size: small">Nama usaha</label>
            </div>
            <div class="col-lg-0">
              <label style="font-size: small">:</label>
            </div>
            <div class="col-lg-4">
              <label style="font-size:small">{{$business_details->business_name}}</label>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3">
              <label style="font-size: small">Email</label>
            </div>
            <div class="col-lg-0">
              <label style="font-size: small">:</label>
            </div>
            <div class="col-lg-4">
              <label style="font-size:small" >{{$business_details->business_email}}</label>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3">
              <label style="font-size: small">Alamat</label>
            </div>
            <div class="col-lg-0">
              <label style="font-size: small">:</label>
            </div>
            <div class="col-lg-4">
              <label style="font-size:small" >{{$business_details->business_address}}</label>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3">
              <label style="font-size: small">No Telefon</label>
            </div>
            <div class="col-lg-0">
              <label style="font-size: small">:</label>
            </div>
            <div class="col-lg-4">
              <label style="font-size:small" >{{$business_details->business_phone}}</label>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3">
              <label style="font-size: small">Harga Tiket</label>
            </div>
            <div class="col-lg-0">
              <label style="font-size: small">:</label>
            </div>
            <div class="col-lg-4">
              <label style="font-size:small" >Rp. {{$business_details->business_price}}</label>
            </div>
          </div>

        </div>
        </div>
      </div>
      <div class="form-group col-lg-12" style="background-color:#fafafa; border-radius:10px; border:0px">
        <div class="row">
          {{-- <div class="col-lg-12">
            <label style="font-size: small; margin-left:15px">Detail Usaha</label>
          </div> --}}
          <div class="col-lg-12" style="margin-top:15px; margin-bottom:15px">
            <div class="row">
              <div class="col-md-4">
                <div class="row">
                  <div class="col-lg-4">
                    <label style="font-size: small; margin-left:15px">Deskripsi</label>
                  </div>
                  <div class="col-lg-0">
                    <label style="font-size: small">:</label>
                  </div>
                  <div class="col-lg-7" valign="top">
                    <textarea rows="15"style="font-size: small" id="desc" type="text" class="form-control" name="desc" disabled>{{$business_details->business_desc}}</textarea>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                @foreach ($business_details->pictures as $img)
                  <style>
                    img {
                        float: left;
                    }
                  </style>
                  <img src="{{asset('storage/'.$img->pict_url)}}" style="max-width: 250px; max-height: 300px; border: 1px solid #ddd; border-radius: 4px; padding: 5px; margin-left:15px">
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="col-lg">
      <hr>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-bar-chart"></i>
          Statistik Penjualan Tiket
        </div>
        <div>
          <table>
            <thead>
              <tr>


              <th>nama</th>
              <th>statsus</th>

              <th>created_at</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($booking_data as $key)
                <tr>


                <td>{{$key->name}}</td>
                <td>{{$key->status_transfer}}</td>

                <td>{{$key->created_at}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
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


</div>
@endsection
