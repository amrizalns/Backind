<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="description" content="">
  <meta name="author" content="">
  <title>Daftar Akun</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body style="background-color:#0091EA">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">
        Daftar Akun
      </div>
    </div>

    <div class="card card-register mx-auto mt-5">
      <div class="card-body">
        <form method="POST" action="{{ route('register') }}">
          {{ csrf_field() }}
        <div class="form-group col-lg-12" style="font-size: small">
          <div class="row">
            {{-- -------------- --}}
            <div class="col-lg-6">
              <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" style="font-size:small">Nama</label>
                <input style="font-size:small" id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="masukkan nama lengkap"required autofocus>
                @if ($errors->has('name'))
                  @foreach ($errors->get('name') as $message)
                    <span class="help-block" style="color:#D32F2F; font-size:small">
                      <strong>{{ $message }}</strong>
                    </span>
                  @endforeach
                @endif
              </div>
              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" style="font-size:small">Alamat Email</label>
                <input style="font-size:small" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="masukkan email" required>
                @if ($errors->has('email'))
                  @foreach ($errors->get('email') as $message)
                    <span class="help-block" style="color:#D32F2F; font-size:small">
                      <strong>{{ $message }}</strong>
                    </span>
                  @endforeach
                @endif
              </div>
              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label style="font-size:small" for="password">Kata Sandi</label>
                <input style="font-size:small" id="password" type="password" class="form-control" name="password" placeholder="masukkan kata sandi" required>
                <label style="font-size:7pt; color:#D32F2F; float:right"><i>*) masukkan kata sandi minimal 6 karakter</i></label>
                @if ($errors->has('password'))
                  @foreach ($errors->get('password') as $message)
                    <span class="help-block" style="color:#D32F2F; font-size:small">
                      <strong>{{ $message }}</strong>
                    </span>
                  @endforeach
                @endif
              </div>
              <div class="form-group" >
                <label style="font-size:small" for="password-confirm" >Ulangi Kata Sandi</label>
                <input style="font-size:small" id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="ulangi kata sandi" required>
              </div>
            </div>

            <div class="col-lg-0">

            </div>

            <div class="col-lg-6">
              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label style="font-size:small" for="name">Alamat</label>
                <input style="font-size:small" id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="masukkan alamat" required autofocus>
                @if ($errors->has('address'))
                  @foreach ($errors->get('address') as $message)
                    <span class="help-block" style="color:#D32F2F; font-size:small">
                      <strong>{{ $message }}</strong>
                    </span>
                  @endforeach
                @endif
              </div>
              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label style="font-size:small" for="phone_number">Nomer Telepon</label>
                <input style="font-size:small" id="phone_number" type="number" class="form-control" name="phone_number" min="0" minlength="10" maxlength="13" value="{{ old('phone_number') }}" placeholder="masukkan nomer telepon"required autofocus>
                @if ($errors->has('phone_number'))
                  @foreach ($errors->get('phone_number') as $message)
                    <span class="help-block" style="color:#D32F2F; font-size:small">
                      <strong>{{ $message }}</strong>
                    </span>
                  @endforeach
                @endif
              </div>
            </div>

            <div class="col-lg-12">
              <hr>
              <button type="submit" class="btn btn-primary btn-block" style="font-size:small">
                Daftar
              </button>
            </div>
          </div>
        </form>
        </div>

        <div class="text-center">
        <a class="d-block small mt-3" href="/" style="font-size:small">Halaman <i>Login</i></a>
        </div>

    </div>
  </div>
</div>
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/popper/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- Include jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
$(document).ready(function(){
  var date_input=$('input[name="dateOfBirth"]'); //our date input has the name "date"
  var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
  date_input.datepicker({
    format: 'yyyy-mm-dd',
    container: container,
    todayHighlight: true,
    autoclose: true,
  })
})
</script>

</body>

</html>
