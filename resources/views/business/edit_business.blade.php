@extends('layouts.main')
@section('content')

  <div class="card-body">
    <span style="color:#0285CC ; font-weight:bold ; font-size:large">Menu Edit Usaha {{$menu->status}}</span><br>
    <span style="color:#27607F; font-size:small">Backind Administrator</span>
    <hr>
  </div>
  <div class="container-fluid">
    <div class="col-lg">
      <div class="card mb-3">
        <div class="card-header" style="font-size: small">
          <i class="fa fa-paperclip"></i>
          Data Usaha
        </div>
        <!--Form Register-->
        <div class="card-body" style="font-size: small">
          <form method="POST" action="{{route ('updateBusiness',['id'=>$business_details->id_business_details, 'id_menu' => $menu->id_menu])}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put">
            <div class="form-group col-lg-12" style="font-size: small">
              <div class="row form-group {{ $errors->has('Business name') ? ' has-error' : '' }}">
                <div class="col-lg-2">
                  <label style="font-size: small">Pengelola</label>
                </div>
                <div class="col-lg-0">
                  <label style="font-size: small"> : </label>
                </div>
                <div class="col-lg-3">
                  <label style="font-size: small">{{ Auth::user()->name }}</label>
                </div>
              </div>
              <div class="row form-group {{ $errors->has('Business icon') ? ' has-error' : '' }}">
                <div class="col-lg-2">
                  <label style="font-size: small">Logo Usaha</label>
                </div>
                <div class="col-lg-0">
                  <label style="font-size: small"> : </label>
                </div>
                <div class="col-lg-3">
                  <input type="file" name="bus_pict" value="{{$business_details->business_profile_pict}}" multiple id="gallery-photo-add"></input>
                  @if ($errors->has('bus_pict'))
                    @foreach ($errors->get('bus_pict') as $message)
                      <span class="help-block" style="color:#D32F2F">
                        <strong>{{ $message }}</strong>
                      </span>
                    @endforeach
                  @endif
                </div>
              </div>
              <hr>
            </div>

            <div class="form-group col-lg-12" style="font-size: small">
              <div class="row">
                <div class="col-lg-6">
                  <div class="row form-group {{ $errors->has('Business name') ? ' has-error' : '' }}">
                    <div class="col-lg-4">
                      <label for="name" style="font-size: small">Nama Usaha</label>
                    </div>
                    <div class="col-lg-0">
                      <label for="name" style="font-size: small">:</label>
                    </div>
                    <div class="col-lg-7">
                      <input style="font-size: small" id="name" type="text" class="form-control" name="name" value="{{$business_details->business_name}}" placeholder="Masukkan nama bisnis anda"required autofocus>
                      @if ($errors->has('name'))
                        @foreach ($errors->get('name') as $message)
                          <span class="help-block" style="color:#D32F2F">
                            <strong>{{ $message }}</strong>
                          </span>
                        @endforeach
                      @endif
                    </div>
                  </div>
                  <div class="row form-group {{ $errors->has('Business email') ? ' has-error' : '' }}">
                    <div class="col-lg-4">
                      <label for="name" style="font-size: small">Email Usaha</label>
                    </div>
                    <div class="col-lg-0">
                      <label for="name" style="font-size: small">:</label>
                    </div>
                    <div class="col-lg-7">
                      <input style="font-size: small" id="email" type="email" class="form-control" name="email" value="{{$business_details->business_email}}" placeholder="Masukkan email bisnis anda" required>
                      @if ($errors->has('email'))
                        @foreach ($errors->get('email') as $message)
                          <span class="help-block" style="color:#D32F2F">
                            <strong>{{ $message }}</strong>
                          </span>
                        @endforeach
                      @endif
                    </div>
                  </div>

                  <div class="form-group gllpLatlonPicker">
                  <div class="row form-group {{ $errors->has('Business address') ? ' has-error' : '' }}">
                    <div class="col-lg-4">
                      <label for="name" style="font-size: small">Alamat Usaha</label>
                    </div>
                    <div class="col-lg-0">
                      <label for="name" style="font-size: small">:</label>
                    </div>
                    <div class="col-lg-7">
                      <input style="font-size: small" type="text" class="form-control gllpSearchField" name="address" placeholder="Masukkan alamat" value="{{$business_details->business_address}}">
                    </div>
                  </div>
                  <div class="row form-group {{ $errors->has('Business address') ? ' has-error' : '' }}">
                    <div class="col-lg-4">
                      <label for="name" style="font-size: small"></label>
                    </div>
                    <div class="col-lg-0">
                      <label for="name" style="font-size: small"></label>
                    </div>
                    <div class="col-lg-7">
                      <input style="font-size: small ; margin-left:59%" type="button" class="btn-info gllpSearchButton" value="Cari Koordinat">
                    </div>
                  </div>
                  <div class="row form-group {{ $errors->has('Business address') ? ' has-error' : '' }}">
                    <div class="col-lg-12">
                      <div class="gllpMap col-lg-11" style="font-size" >Google Maps</div>
                      <input type="hidden" class="gllpZoom" value="4"/>
                    </div>
                  </div>
                  <div class="row form-group {{ $errors->has('Business lat') ? ' has-error' : '' }}">
                    <div class="col-lg-4">
                      <label for="name" style="font-size: small">Latitude</label>
                    </div>
                    <div class="col-lg-0">
                      <label for="name" style="font-size: small">:</label>
                    </div>
                    <div class="col-lg-7">
                      <input readonly style="font-size: small" type="text" id="latShow" name="lat" class="gllpLatitude form-control" placeholder="Latitude" required value="{{$business_details->business_lat}}"/>
                      @if ($errors->has('lat'))
                        @foreach ($errors->get('lat') as $message)
                          <span class="help-block" style="color:#D32F2F">
                            <strong>{{ $message }}</strong>
                          </span>
                        @endforeach
                      @endif
                    </div>
                  </div>
                  <div class="row form-group {{ $errors->has('Business lang') ? ' has-error' : '' }}">
                    <div class="col-lg-4">
                      <label for="name" style="font-size: small">Longitude</label>
                    </div>
                    <div class="col-lg-0">
                      <label for="name" style="font-size: small">:</label>
                    </div>
                    <div class="col-lg-7">
                      <input readonly style="font-size: small" type="text" id="lngShow" name="lang" class="gllpLongitude form-control" placeholder="Longitude" required value="{{$business_details->business_lang}}"/>
                      @if ($errors->has('lang'))
                        @foreach ($errors->get('lang') as $message)
                          <span class="help-block" style="color:#D32F2F">
                            <strong>{{ $message }}</strong>
                          </span>
                        @endforeach
                      @endif
                    </div>
                  </div>
                  </div>
              </div>

                <div class="col-lg-6">
                  <div class="row form-group {{ $errors->has('Business phone') ? ' has-error' : '' }}">
                    <div class="col-lg-4">
                      <label for="name" style="font-size: small">Nomer Telefon</label>
                    </div>
                    <div class="col-lg-0">
                      <label for="name" style="font-size: small">:</label>
                    </div>
                    <div class="col-lg-7">
                      <input style="font-size: small" id="phone_number" type="number" class="form-control" min="0" minlength="10" maxlength="13" name="phone" value="{{$business_details->business_phone}}" placeholder="Masukkan no telefon bisnis anda "required autofocus>
                      @if ($errors->has('phone'))
                        @foreach ($errors->get('phone') as $message)
                          <span class="help-block" style="color:#D32F2F">
                            <strong>{{ $message }}</strong>
                          </span>
                        @endforeach
                      @endif
                    </div>
                  </div>
                  <div class="row form-group {{ $errors->has('Business open') ? ' has-error' : '' }}">
                    <div class="col-lg-4">
                      <label for="name" style="font-size: small">Jam Buka</label>
                    </div>
                    <div class="col-lg-0">
                      <label for="name" style="font-size: small">:</label>
                    </div>
                    <div class="col-lg-7">
                      <input style="font-size: small" id="open" type="time" class="form-control" name="open" value="{{$business_details->business_open_time}}" placeholder="Waktu Operasional" required autofocus>
                    </div>
                  </div>
                  <div class="row form-group {{ $errors->has('Business close') ? ' has-error' : '' }}">
                    <div class="col-lg-4">
                      <label for="name" style="font-size: small">Jam Tutup</label>
                    </div>
                    <div class="col-lg-0">
                      <label for="name" style="font-size: small">:</label>
                    </div>
                    <div class="col-lg-7">
                      <input style="font-size: small" id="close" type="time" class="form-control" name="close" value="{{$business_details->business_close_time}}" placeholder="Waktu Operasional" required autofocus>
                    </div>
                  </div>
                  <div class="row form-group {{ $errors->has('Range price') ? ' has-error' : '' }}">
                    <div class="col-lg-4">
                      <label for="name" style="font-size: small">Harga Tiket</label>
                    </div>
                    <div class="col-lg-0">
                      <label for="name" style="font-size: small">:</label>
                    </div>
                    <div class="col-lg-7">
                      <input style="font-size: small" id="price" type="number" class="form-control" min="0" minlength="5" maxlength="7" name="price" value="{{$business_details->business_price}}" placeholder="(IDR) rentang harga tiket" required autofocus>
                      @if ($errors->has('price'))
                        @foreach ($errors->get('price') as $message)
                          <span class="help-block" style="color:#D32F2F">
                            <strong>{{ $message }}</strong>
                          </span>
                        @endforeach
                      @endif
                    </div>
                  </div>
                  @if($menu->id_menu == 2 )
                  <div class="row form-group {{ $errors->has('Business status') ? ' has-error' : '' }}">
                    <div class="col-lg-4">
                      <label for="name" style="font-size: small">Status Usaha</label>
                    </div>
                    <div class="col-lg-0">
                      <label for="name" style="font-size: small">:</label>
                    </div>
                    <div class="col-lg-7">
                      <input type="radio" name="condition" value="1">Tersedia</input>
                      <input type="radio" name="condition" value="2">Tidak Tersedia</input>
                    </div>
                  </div>
                @endif
                <div class="row form-group {{ $errors->has('Business status') ? ' has-error' : '' }}">
                  <div class="col-lg-4">
                    <label for="name" style="font-size: small">Deskripsi Usaha</label>
                  </div>
                  <div class="col-lg-0">
                    <label for="name" style="font-size: small">:</label>
                  </div>
                  <div class="col-lg-7">
                    <textarea rows="13"style="font-size: small" id="desc" type="text" class="form-control" maxlength="500" name="desc" value=""required autofocus>{{$business_details->business_desc}}</textarea>
                    @if ($errors->has('desc'))
                      @foreach ($errors->get('desc') as $message)
                        <span class="help-block" style="color:#D32F2F">
                          <strong>{{ $message }}</strong>
                        </span>
                      @endforeach
                    @endif
                  </div>
                </div>
                </div>

              </div>
            </div>

            <hr>
            <div class="form-group col-lg-12" style="font-size: small">
            <div class="row form-group {{ $errors->has('Business assignment') ? ' has-error' : '' }}">
              <div class="col-lg-1">
                <input id="checkBox" type="checkbox" style="transform: scale(1.5);"></input>
              </div>
              <div class="col-lg-11">
                <label style="color:#9e9e9e">
                  Menyatakan	bahwa	 semua data data	 usaha	 yang	 diisikan	 sebagai	 syarat	 pendaftaran
                  adalah	benar. Apabila	dikemudian	hari	diketahui	bahwa	data	usaha	tersebut	tidak
                  benar,	 maka	 kami	 siap	 menerima	 konsekuensi	 pembatalan	 sebagai	 mitra usaha startup Backind.
                </label>
              </div>
            </div>
          </div>
            <div>
              <button type="submit" class="btn btn-primary btn-block" style="font-size:small">
                Ubah data
              </button>
            </div>
          </form>
        </div>
      </div>
      <hr>
      <div class="card mb-3">
        <div class="card-header" style="font-size: small">
          <i class="fa fa-paperclip"></i>
          Gambar Usaha
        </div>
        <!--Form Register-->
        <div class="card-body" style="font-size: small">
            <script type="text/javascript">
                function img1(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $('#img').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(input.files[0]);
                    }
                }
                function img2(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $('#imgg').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(input.files[0]);
                    }
                }
                function img3(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $('#imggg').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(input.files[0]);
                    }
                }
            </script>
            <div class="form-group col-lg-12" style="font-size: small">
              <hr>
              <label style="font-size:small"><b>Detail Gambar</b>
                <br><label style="font-size:small; color:#F44336"><i>(* ubah 3 gambar untuk memberikan gambaran kepada calon pemesan usaha dari usaha yang sedang anda kelola *)</i></label>
              </label>
              <hr>
              <div class="row form-group {{ $errors->has('Business image') ? ' has-error' : '' }}">
              <div class="col-lg-4">

              <form method="POST" action="{{route ('updateDetailImage',['id'=>$business_details->id_business_details])}}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <input type="hidden" name="_method" value="put">
                <input type='file' name="img" onchange="img1(this);"/>
                @if ($business_details->pictures[0])
                  <input type="hidden" name="id_img" value="{{$business_details->pictures[0]->id_business_pictures}}">
                  @if ($errors->has('img'))
                    @foreach ($errors->get('img') as $message)
                      <span class="help-block" style="color:#D32F2F">
                        <strong>{{ $message }}</strong>
                      </span>
                    @endforeach
                  @endif
                @endif
                @if ($business_details->pictures[1])
                  <input type="hidden" name="id_imgg" value="{{$business_details->pictures[1]->id_business_pictures}}">
                  @if ($errors->has('imgg'))
                    @foreach ($errors->get('imgg') as $message)
                      <span class="help-block" style="color:#D32F2F">
                        <strong>{{ $message }}</strong>
                      </span>
                    @endforeach
                  @endif
                @endif
                @if ($business_details->pictures[2])
                  <input type="hidden" name="id_imggg" value="{{$business_details->pictures[2]->id_business_pictures}}">
                  @if ($errors->has('imggg'))
                    @foreach ($errors->get('imggg') as $message)
                      <span class="help-block" style="color:#D32F2F">
                        <strong>{{ $message }}</strong>
                      </span>
                    @endforeach
                  @endif
                @endif
                <img id="img" src="#" alt="  Gambar 1" style="max-width:300px; max-height:200px; border: 1px solid #ddd; border-radius: 4px; padding: 5px; margin-top:10px"/>
              </div>
              <div class="col-lg-4">
                <input type='file' name="imgg" onchange="img2(this);"/>
                <img id="imgg" src="#" alt="  Gambar 2" style="max-width:300px; max-height:200px; border: 1px solid #ddd; border-radius: 4px; padding: 5px; margin-top:10px"/>
              </div>
              <div class="col-lg-4">
                <input type='file' name="imggg" onchange="img3(this);"/>
                <img id="imggg" src="#" alt="  Gambar 3" style="max-width:300px; max-height:200px; border: 1px solid #ddd; border-radius: 4px; padding: 5px; margin-top:10px"/>
              </div>
              <button type="submit" class="btn btn-warning btn-block" style="font-size:small; margin-top:10px">
                Ubah Detail Gambar
              </button>
                </form>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <br>
@endsection
