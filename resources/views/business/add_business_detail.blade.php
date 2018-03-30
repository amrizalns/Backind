@extends('layouts.main')
@section('content')

  <div class="card-body">
    <span style="color:#0285CC ; font-weight:bold ; font-size:large">Menu Tambah Usaha {{$menu->status}}</span><br>
    <span style="color:#27607F; font-size:small">Backind Administrator</span>
    <hr>
  </div>
  <div class="container-fluid">
    <div class="col-lg">
      <div class="card mb-3" style="background-color:#fafafa; border-radius:10px; border:0px">
        {{-- <div class="card-header" style="font-size: small">
          <i class="fa fa-paperclip"></i>
          Masukkan Data Usaha
        </div> --}}
        <!--Form Register-->
        <div class="card-body" style="font-size: small">
          <form method="POST" action="{{route ('insertBusiness',['id'=>$menu->id_menu])}}" enctype="multipart/form-data">
            {{ csrf_field() }}
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
              <div class="row form-group {{ $errors->has('Business city') ? ' has-error' : '' }}">
                <div class="col-lg-2">
                  <label style="font-size: small">Daerah Usaha</label>
                </div>
                <div class="col-lg-0">
                  <label style="font-size: small"> : </label>
                </div>
                <div class="col-lg-3">
                  <select class="" name="city">
                    @foreach ($city as $data)
                      <option value="{{$data->id_city}}">{{ $data->city}}</option>
                    @endforeach
                  </select>
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
                  <input type="file" name="bus_pict" id="gallery-photo-add"></input>
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
                      <input style="font-size: small" id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Masukkan nama bisnis anda"required autofocus>
                      @if ($errors->has('name'))
                        <span class="help-block">
                          <strong>{{ $errors->first('name') }}</strong>
                        </span>
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
                      <input style="font-size: small" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Masukkan email bisnis anda" required>

                      @if ($errors->has('email'))
                        <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                        </span>
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
                      <input style="font-size: small" type="text" class="form-control gllpSearchField" name="address" placeholder="Masukkan alamat">
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
                      <input readonly style="font-size: small" type="text" id="latShow" name="lat" class="gllpLatitude form-control" placeholder="Latitude" required/>
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
                      <input readonly style="font-size: small" type="text" id="lngShow" name="lang" class="gllpLongitude form-control" placeholder="Longitude" required/>
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
                      <input style="font-size: small" id="phone_number" type="number" class="form-control" name="phone" value="{{ old('phone_number') }}" placeholder="Masukkan no telefon bisnis anda "required autofocus>
                      @if ($errors->has('phone'))
                        <span class="help-block">
                          <strong>{{ $errors->first('phone') }}</strong>
                        </span>
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
                      <input style="font-size: small" id="open" type="time" class="form-control" name="open" value="" placeholder="Waktu Operasional" required autofocus>
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
                      <input style="font-size: small" id="close" type="time" class="form-control" name="close" value="" placeholder="Waktu Operasional" required autofocus>
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
                      <input style="font-size: small" id="price" type="number" class="form-control" name="price" value="" placeholder="(IDR) rentang harga tiket" required autofocus>
                      @if ($errors->has('price'))
                        <span class="help-block">
                          <strong>{{ $errors->first('price') }}</strong>
                        </span>
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
                    <textarea rows="13"style="font-size: small" id="desc" type="text" class="form-control" name="desc" value="" placeholder="Masukkan Deskripsi Bisnis ( maksimal 500 huruf )"required autofocus></textarea>
                  </div>
                </div>
                </div>

              </div>
            </div>
            {{-- Input detail image --}}
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
                <br><label style="font-size:small; color:#F44336">
                <i>
                  (* masukkan 3 gambar untuk memberikan gambaran kepada calon pemesan usaha dari usaha yang sedang anda kelola *)<br>
                  (* gambar 1 wajib diisi*)
                </i></label>
              </label>
              <hr>
              <div class="row form-group {{ $errors->has('Business image') ? ' has-error' : '' }}">
              <div class="col-lg-4">
                <input type='file' name="img" onchange="img1(this);" required/>
              </div>
              <div class="col-lg-4">
                <input type='file' name="imgg" onchange="img2(this);"/>
              </div>
              <div class="col-lg-4">
                <input type='file' name="imggg" onchange="img3(this);"/>
              </div>
              </div>
            </div>
            <div class="form-group col-lg-12" style="font-size: small" >
              <div class="row form-group {{ $errors->has('Business image') ? ' has-error' : '' }}" style="height:250px">
              <div class="col-lg-4">
                <img id="img" src="#" alt="  Gambar 1" style="max-width:300px; max-height:200px; border: 1px solid #ddd; border-radius: 4px; padding: 5px"/>
              </div>
              <div class="col-lg-4">
                <img id="imgg" src="#" alt="  Gambar 2" style="max-width:300px; max-height:200px; border: 1px solid #ddd; border-radius: 4px; padding: 5px"/>
              </div>
              <div class="col-lg-4">
                <img id="imggg" src="#" alt="  Gambar 3" style="max-width:300px; max-height:200px; border: 1px solid #ddd; border-radius: 4px; padding: 5px"/>
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
                Tambah data
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <br>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  {{-- <script type="text/javascript">
      $(function() {
      // Multiple images preview in browser
      var imagesPreview = function(input, placeToInsertImagePreview) {

          if (input.files) {
              var filesAmount = input.files.length;

              for (i = 0; i < filesAmount; i++) {
                  var reader = new FileReader();

                  reader.onload = function(event) {
                      $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                  }

                  reader.readAsDataURL(input.files[i]);
              }
          }

      };

      $('#gallery-photo-add').on('change', function() {
          imagesPreview(this, 'div.gallery');
      });
    });
  </script> --}}
@endsection
