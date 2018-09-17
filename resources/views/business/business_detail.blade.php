@extends('layouts.main')
@section('content')

<div class="card-body">
  <span style="color:#0285CC ; font-weight:bold ; font-size:large">Menu Usaha {{$menu->status}} Terdaftar</span><br>
  <span style="color:#27607F; font-size:small">Backind Administrator</span>
  <hr>
</div>
<div class="container-fluid" style="margin-bottom:30px">
  <div class="col-lg">
      <table>
        <tr>
          <td>
            <table width="400px" style="margin-left:50px">
              <tr>
                <td rowspan="2">
                  <img src="{{asset('dart-board.svg')}}" width="150px" style="padding:30px">
                </td>
                <td>
                  <span style="color:#4D6E7F ; font-weight:bold ; font-size:medium">Manajemen Usaha</span><br>
                </td>
              </tr>
              <tr>
                <td valign="top">
                  <span style="color:#27607F; font-size:small; ">
                    Daftarkan usaha kamu melalui Backind, dan dapatkan kemudahan dalam mengelola usaha
                    dalam mencapai target usaha yang sudah di tentukan.
                  </span>
                </td>
              </tr>
            </table>
          </td>
          <td>
            <table width="400px" style="margin-left:50px">
              <tr>
                <td rowspan="2">
                  <img src="{{asset('pie-chart.svg')}}" width="150px" style=" padding:30px">
                </td>
                <td>
                  <span style="color:#4D6E7F ; font-weight:bold ; font-size:medium">Statistik Usaha</span><br>
                </td>
              </tr>
              <tr>
                <td valign="top">
                  <span style="color:#27607F; font-size:small">
                    Kamu tidak perlu repot lagi dalam membuat laporan dan satistik usaha yang kamu miliki,
                    dengan melihat statistik langsung dalam Backind kamu dapat mendapatkan semua data
                    tentang usahamu.
                  </span>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </div>
  </div>
  <hr>
  <div class="container-fluid">
    {{-- @if(Session::has('message'))
                      <div class="alert alert-success">
                          {{ Session::get('message') }}
                      </div>
                  @endif --}}
    <div class="col-lg">
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>
          <span style="font-size:small">Data {{$menu->status}}</span>
        </div>
      <div class="card-body" style="font-size: small">
      <div class="table-responsive" style="font-size: small">

        <table class="table table-bordered" id="dataTable" cellspacing="0" style="font-size: small">
          <thead>
          <tr>
              <th>No</th>
              <th>Photo</th>
              <th>Nama Usaha</th>
              {{-- <th>Email Usaha</th> --}}
              <th>Alamat Usaha</th>
              <th>Telepon</th>
              <th>Status Usaha</th>
              <th><center>Aksi</center></th>
          </tr>
          </thead>
            <tbody>
              @foreach ($bus_list_page as $index=>$data)
            <tr>
              <td>{{++$index}}</td>
              <td><img src="{{url('storage/'.$data->business_details->business_profile_pict)}}" class="img-responsive img-squere" style="max-width:50px"></td>
              <td>{{$data->business_details->business_name}}</td>
              {{-- <td>{{$data->business_details->business_email}}</td> --}}
              <td>{{$data->business_details->business_address}}</td>
              <td>{{$data->business_details->business_phone}}</td>
              <td>@if ($data->business_status == 1)
                  <span style="font-size: small">Active</span>
                @elseif($data->business_status == 2)
                  <span style="font-size: small">Pending</span>
                @elseif($data->business_status == 3)
                    <span style="font-size: small">Deactived</span>
              @endif
              </td>
              <td>
                  <table>
                      <tr>
                          <td>
                            <a href="/businessView/{{$data->id_menu}}/{{$data->id_business_details}}">
                              <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-eye"></i></button>
                            </a>
                          </td>
                          <td>
                              <a href="/businessEdit/{{$data->id_menu}}/{{$data->id_business_details}}">
                              <button type="submit" class="btn btn-info"><i class="fa fa-fw fa-pencil"></i></button>
                              </a>
                          </td>
                          <td>
                              <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#deletePopUp{{$index}}"><i class="fa fa-fw fa-trash"></i></button>
                          </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <!-- Delete Modal -->
            <div class="modal fade" id="deletePopUp{{$index}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form action="{{url('delete')}}" method="POST">
                      <input type="hidden" name="id_business_detail" value="{{$data->id_business_details}}">
                      <input type="hidden" name="id_usaha" value="{{$id_usaha}}">
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
       <br>
       <div class="float-right">
         <a href="{{ route ('addbusiness', ['id' => $menu]) }}"><button class="btn btn-primary" style=" font-size:small;">Tambah Usaha</button></a>
       </div>
     </div>
    </div>
  </div>
  </div>
</div>
  <br>
  <!-- /.container-fluid -->
@endsection
