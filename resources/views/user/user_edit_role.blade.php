@extends('layouts.main')
@section('content')

<div class="card-body">
  <span style="color:#0285CC ; font-weight:bold ; font-size:large">Menu Data Master / Edit Role Data</span><br>
  <span style="color:#27607F; font-size:small">Backind Administrator</span>
  <hr>
</div>
    <div style="margin-left: 50px">
        <div class="container-fluid">
            <form action="{{ URL::to('userEdit/update') }}" method="POST">
                <form action="update" method="POST">
                    <input type="hidden" name="id" value="{{$users->id_user}}">
                    <input type="hidden" name="_method" value="PUT">

                <div class="form-group" style="font-size:small">
                    <table>
                        <tr>
                            <td><label class="col-md-4 control-label">Name</label></td>
                            <td><label class="col-md-4 control-label">:</label></td>
                            <td><label class="col-md-auto" >{{$users->name}}</label></td>
                        </tr>
                        <tr>
                            <td><label class="col-md-4 control-label">Email</label></td>
                            <td><label class="col-md-4 control-label">:</label></td>
                            <td><label class="col-md-auto" >{{$users->email}}</label></td>
                        </tr>
                        <tr>
                            <td><label class="col-md-4 control-label">Role</label></td>
                            <td><label class="col-md-4 control-label">:</label></td>
                            <td><select name="roles">
                                    @foreach($status as $data)
                                        @if ($data->id_roles==$users->id_roles)
                                            <option value="{{$data->id_roles}}" selected>{{$data->status}}</option>
                                        @else
                                            <option value="{{$data->id_roles}}">{{$data->status}}</option>
                                        @endif
                                    @endforeach
                                </select></td>
                        </tr>
                    </table>
                </div>
                    <div class="form-group" style="float: right;">
                        <div>
                            <button type="submit" class="btn btn-primary" style="font-size:small">
                                Simpan
                            </button>

                            <button type="submit" class="btn btn-danger" style="font-size:small">
                                Batal
                            </button>
                        </div>
                    </div>
                    {{ csrf_field() }}
                </form>
              </form>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
