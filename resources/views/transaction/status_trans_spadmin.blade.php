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
            <th>Total Tagihan</th>
            <th>Status Pemesanan</th>
            <th>Bukti Transfer</th>
            <th><center>Aksi</center></th>
        </tr>
        </thead>
          <tbody>
            @foreach ($status_spadmin as $index=>$x)
          <tr>
            <td>{{++$index}}</td>
            <td>#BACKIND2018{{$x->id_booking+100}}</td>
            <td>{{$x->duedate}}</td>
            {{-- <td>{{$data->business_details->business_email}}</td> --}}
            <td>{{$x->user->name}}</td>
            <td>{{$x->total_cost}}</td>
            <td>@if ($x->transaction_payment->status_transfer == 1)
                <span style="font-size: small">Pembayaran Terkonfirmasi</span>
              @elseif($x->transaction_payment->status_transfer == 2)
                <span style="font-size: small">Menungu Pembayaran</span>
              @elseif($x->transaction_payment->status_transfer == 3)
                  <span style="font-size: small">Usang</span>
            @endif
            </td>

            <td>
              @if ($x->transaction_payment->bukti_transfer != null && $x->transaction_payment->status_transfer == 1)
                  <center><img src="{{asset('tick-inside-a-circle.svg')}}" alt="" style="width:30px"></center>
                @elseif ($x->transaction_payment->bukti_transfer != null && $x->transaction_payment->status_transfer == 2)
                  <center><img src="{{asset('information.svg')}}" alt="" style="width:30px"></center>
                @else
                    <center><img src="{{asset('cancel-symbol-inside-a-circle.svg')}}" alt="" style="width:30px"></center>
              @endif
            </td>
            <td>
                <table>
                    <tr>
                        <td>
                            <button type="submit" class="btn btn-info" data-toggle="modal" data-target="#transactionStatusPopUp{{$index}}" ><i class="fa fa-fw fa-pencil"></i></button>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#deletePopUp{{$index}}"><i class="fa fa-fw fa-trash"></i></button>
                        </td>
                      </tr>
                  </table>
              </td>
          </tr>

          <!-- Status Modal -->
          <div class="modal fade" id="transactionStatusPopUp{{$index}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ubah Status Transaksi</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <label> Bukti Transfer :</label>
                  <img id="bukti_transfer" src="{{asset('storage/'.$x->transaction_payment->bukti_transfer)}}" alt="  Bukti Transfer" style="max-width:200px; max-height:300px; border: 1px solid #ddd; border-radius: 4px; padding: 5px"/>
                  <form action="{{route('transactionStatus',['id_transaksi' => $x->transaction_payment->id_transaksi])}}" method="POST">
                  <label> Status Transfer :</label>
                  <select class="" name="status">
                    @if ($x->transaction_payment->status_transfer == 1)
                      <option value="1" selected>Telah dibayar</option>
                      <option value="2">Menunggu Pembayaran</option>
                      @elseif($x->transaction_payment->status_transfer == 2)
                        <option value="1">Telah dibayar</option>
                        <option value="2" selected>Menunggu Pembayaran</option>
                        @endif
                  </select>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" style="color:#FFFFFF" class="btn btn-warning">Update</button></td>
                  </form>
                </div>
              </div>
            </div>
          </div>

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
                  <form action="{{url('deleteBookingSpAdmin')}}" method="POST">
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
