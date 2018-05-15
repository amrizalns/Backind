@extends('layouts.main')
@section('content')

  <div class="card-body">
    <span style="color:#0285CC ; font-weight:bold ; font-size:large">Menu Edit Profile</span><br>
    <span style="color:#27607F; font-size:small">Backind Administrator</span>
    <hr>
  </div>

  <div class="container-fluid">
    <div class="col-lg">
        <!--Form Register-->
        <form action="{{ route('userProfileEdit') }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="{{$users->id_user}}">
            <div class="form-group {{ $errors->has('Business name') ? ' has-error' : '' }}">
              <table>
                <tr>
                  <td>
                    <img src="{{url('storage/'.Auth::user()->avatar)}}" class="img-responsive" style="width:200px; height:200px; border-radius:50%; object-fit:cover; margin-right:30px; margin-bottom:30px" >
                  </td>
                  <td></td>
                  <td><input style="font-size:small" id="avatar" type="file" class="form-control" name="avatar"></td>
                </tr>
                <tr>
                  <td>
                    <label style="font-size: small">Nama</label>
                  </td>
                  <td><label style="font-size: small"> : </label></td>
                  <td><input style="font-size:small" id="name" type="text" class="form-control" name="name" value="{{$users->name}}"></td>
                </tr>
                <tr>
                  <td>
                    <label style="font-size: small">Email</label>
                  </td>
                  <td><label style="font-size: small"> : </label></td>
                  <td><input style="font-size:small" id="email" type="text" class="form-control" name="email" value="{{$users->email}}">
                    {{-- @if ($errors->has('email'))
                      @foreach ($errors->get('email') as $message)
                        <span class="help-block" style="color:#D32F2F; font-size:small">
                          <strong>{{ $message }}</strong>
                        </span>
                      @endforeach
                    @endif --}}
                  </td>

                </tr>
                {{-- <tr>
                  <td>
                    <label style="font-size: small">Password</label>
                  </td>
                  <td><label style="font-size: small"> : </label></td>
                  <td><input style="font-size:small" id="password" type="password" class="form-control" name="password" value="{{$users->password}}"></td>
                </tr> --}}
                <tr>
                  <td>
                    <label style="font-size: small">Alamat</label>
                  </td>
                  <td><label style="font-size: small"> : </label></td>
                  <td><input style="font-size:small" id="address" type="text" class="form-control" name="address" value="{{$users->address}}"></td>
                </tr>
                <tr>
                  <td>
                    <label style="font-size: small">No Telefon</label>
                  </td>
                  <td><label style="font-size: small"> : </label></td>
                  <td><input style="font-size:small" id="phone_number" type="text" class="form-control" name="phone_number" value="{{$users->phone_number}}"></td>
                </tr>

                <tr >
                  <td></td>
                  <td></td>
                  <td class="float-right">
                    <br>
                    <button type="submit" class="btn btn-primary" style="font-size:small">
                        Simpan
                    </button>
                    <a href="{{ URL::to('/') }}" />
                    <button type="button" class="btn btn-danger" style="font-size:small">
                        Batal
                    </button>
                  </a>
                  </td>
                </tr>
              </table>
              <br>
              {{ csrf_field() }}
          </form>
        </div>
    </div>
  </div>
  <br>
@endsection
