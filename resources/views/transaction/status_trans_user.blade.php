@extends('layouts.main')
@section('content')

<div class="card-body">
  <span style="color:#0285CC ; font-weight:bold ; font-size:large">Menu Status Transaksi</span><br>
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
            <th>Status Pemesanan</th>
            <th>Total Tagihan</th>
            <th><center>Aksi</center></th>
        </tr>
        </thead>
          <tbody>
            @foreach ($status_user as $index=>$x)
          <tr>
            <td>{{++$index}}</td>
            <td>#BACKIND2018{{$x->id_booking+100}}</td>
            <td>{{$x->created_at}}</td>
            <td>
              @if ($x->transaction_payment->status_transfer == 1)
                <div style="border-radius:15px; padding: 3px; background-color: #00C853; color:#ffffff">
                  <span style="margin-left:5px; font-size:9pt">Pembayaran Terkonfirmasi</span>
                </div>
              @elseif($x->transaction_payment->status_transfer == 2)
                <div style="border-radius:15px; padding: 3px; background-color: #FFD600; color:#ffffff">
                  <span style="margin-left:5px; font-size:9pt">Menunggu Pembayaran</span>
                </div>
              @elseif($x->transaction_payment->status_transfer == 3)
                <div style="border-radius:15px; padding: 3px; background-color: #D50000; color:#ffffff">
                  <span style="margin-left:5px; font-size:9pt">Usang</span>
                </div>
                @endif
            </td>
            <td>{{$x->total_cost}}</td>
            <td>
            @if ($x->transaction_payment->status_transfer == 2)
              <a href="{{'invoice_final/'.$x->id_booking}}">
                <button type="submit" class="btn btn-primary" style="font-size:9pt; color:#ffffff">Upload Bukti</button>
              </a>
              <button style="font-size:9pt" type="submit" class="btn btn-danger" data-toggle="modal" data-target="#deletePopUp{{$index}}"><i class="fa fa-fw fa-trash"></i></button>
            @elseif ($x->transaction_payment->status_transfer == 3)
              <button style="font-size:9pt" type="submit" class="btn btn-danger" data-toggle="modal" data-target="#deletePopUp{{$index}}"><i class="fa fa-fw fa-trash"></i></button>
              @else
                <div style="border-radius:3px; padding: 3px; background-color: #e0e0e0; color:#ffffff">
                  <span style="margin-left:5px; font-size:9pt">Tidak Ada Aksi</span>
                </div>
            @endif
              </td>
          </tr>

          {{-- delete modal --}}
          <div class="modal fade" id="deletePopUp{{$index}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Apakah Anda yakin untuk menghapus data tersebut ?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <form action="{{url('deleteBooking')}}" method="POST">
                    <input type="hidden" name="id_booking" value="{{$x->id_booking}}">
                    <input type="hidden" name="id_transaksi" value="{{$x->transaction_payment->id_transaksi}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-danger">Hapus</button></td>
                  </form>
                </div>
              </div>
            </div>
          </div>

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
