<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>Backind Administrator</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">

  </head>

  <body style="background-color:#0091EA">
    <div class="container">
      <div style="margin-top:10%; margin-bottom:2%">
        <table>
          <tr>
            <td style="text-align:center; vertical-align:middle;">
              <img src="{{asset('backind_white.png')}}" style="width:15%;">
            </td>
          </tr>
        </table>
      </div>

      <div class="card card-login mx-auto mt-1" style="margin-top:0%">
        <div class="card-body">
          <form method="POST" action="{{ route('login') }}" >
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="exampleInputEmail1" style=" font-size:small;">Alamat Email</label>
              <input type="email" id="email" class="form-control" style=" font-size:small;" name="email" value="{{ old('email') }}" required autofocus placeholder="masukkan email">
              @if ($errors->has('email'))
                  <span class="help-block" style="color:red; font-size:small">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="exampleInputPassword1" style=" font-size:small;">Kata Sandi</label>
              <input id="password" type="password" style=" font-size:small;" class="form-control" name="password" required placeholder="masukkan kata sandi">
              @if ($errors->has('password'))
                  <span class="help-block" style="color:red; font-size:small">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
            </div>

            <div class="form-group">
              <div class="form-check">
                <table>
                  <tr>
                    <td>
                      <label class="form-check-label" style=" font-size:small;">
                        <input type="checkbox" style=" font-size:small;" class="form-check-input" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        Ingat Kata Sandi
                      </label>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
            <div>
                <button type="submit" class="form-control btn btn-primary" style=" font-size:small;">
                    Masuk
                </button>
            </div>
            <div style="margin-top:10px">
              <table align="center">
                <tr>
                  <td>
                    <span style=" font-size:smaller">saya tidak memiliki akun,  </span>
                  </td>
                  <td>
                     <a href="{{ route('register') }}" style=" font-size:smaller">daftar disini</a>
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <center><a class="d-block small" href="{{ route('password.request') }}" style=" font-size:small;">Lupa Kata Sandi ?</a></center>
                  </td>
                </tr>
              </table>
            </div>
          </form>
        </div>
      </div>

      <div style="margin-top:2%;" margin-bottom:2%"">
        <table align="center">
          <tr>
            <td>
              <label style="color:#01579B; font-size:small;"><small>Copyright &copy; Backind 2018</small></label>
            </td>
          </tr>
        </table>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/popper/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

  </body>

</html>
