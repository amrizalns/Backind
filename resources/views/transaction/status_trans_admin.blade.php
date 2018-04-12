@extends('layouts.main')
@section('content')

<div class="card-body">
  <span style="color:#0285CC ; font-weight:bold ; font-size:large">Menu Data Transaksi</span><br>
  <span style="color:#27607F; font-size:small">Backind Administrator</span>
  <hr>
</div>
<div class="container-fluid">
  <div class="col-lg">
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i>
        <span style="font-size:small">Data Transaksi</span>
      </div>
    <div class="card-body" style="font-size: small">
    <div class="table-responsive" style="font-size: small">

      <table class="table table-bordered" id="dataTable" cellspacing="0" style="font-size: small">
        <thead>
        <tr>
            <th>No</th>
            <th>No Tagihan</th>
            <th>Waktu Pemesanan</th>
            <th>Nama Pemesan</th>
            <th>Nama Usaha</th>
            <th>Status Pemesanan</th>
            <th>Total Tagihan</th>
            <th><center>Aksi</center></th>
        </tr>
        </thead>
          <tbody>
            @foreach ($status_admin as $index=>$x)
          <tr>
            <td>{{$x}}</td>
            <td>
                <table>
                    <tr>
                        <td>
                            <button type="submit" class="btn btn-info" data-toggle="modal" data-target="#businessStatusPopUp{{$index}}" ><i class="fa fa-fw fa-pencil"></i></button>
                            </a>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#deletePopUp{{$index}}"><i class="fa fa-fw fa-trash"></i></button>
                        </td>
                      </tr>
                  </table>
              </td>
          </tr>



          @endforeach
          </tbody>
     </table>
   </div>
  </div>
</div>
</div>
<br>
<!-- /.container-fluid -->
@endsection
