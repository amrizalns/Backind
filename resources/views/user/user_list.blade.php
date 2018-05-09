@extends('layouts.main')
@section('content')

<div class="card-body">
  <span style="color:#0285CC ; font-weight:bold ; font-size:large">Menu Data Pengguna</span><br>
  <span style="color:#27607F; font-size:small">Backind Administrator</span>
  <hr>
</div>
<div class="container-fluid">
  <div class="col-lg">
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i>
        <span style="font-size:small">Data Pengguna</span>
      </div>
    <div class="card-body" style="font-size: small">
    <div class="table-responsive" style="font-size: small">

      <table class="table table-bordered" id="dataTable" cellspacing="0" style="font-size: small">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Nomer Telepon</th>
            <th>Status Pengguna</th>
            <th><center>Aksi</center></th>
        </tr>
        </thead>
          <tbody>
        @foreach ($users as $index=>$data)
          <tr>
            <td>{{++$index}}</td>
            <td>{{$data->name}}</td>
            <td>{{$data->email}}</td>
            <td>{{$data->address}}</td>
            <td>{{$data->phone_number}}</td>
            <td>{{$data->roles->status}}</td>
            <td>
                <table>
                    <tr>
                        <td>
                            <button type="submit" class="btn btn-info"><i class="fa fa-fw fa-eye"></i></button>
                        </td>
                        <td>
                            <a href="userEdit/{{$data->id_user}}">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-pencil"></i></button>
                            </a>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#deletePopUp"><i class="fa fa-fw fa-trash"></i></button>
                        </td>
                      </tr>
                  </table>
              </td>
          </tr>

          <!-- Delete Modal -->
          <div class="modal fade" id="deletePopUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Delete item</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Are you sure to delete this item ?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <form action="userDelete" method="POST">
                    <input type="hidden" name="id" value="{{$data->id_user}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-danger">Delete</button></td>
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
