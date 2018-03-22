@extends('layouts.main')

@section('content')
  <div class="card-body">
    <div class="form group col-lg-12">
      <div class="row">
        <div class="col-lg-7">
          <label style="color:#0285CC ; font-weight:bold ; font-size:25pt">
            Bagaimana anda mengelola usaha yang anda miliki saat ini ?
            <br>
            . . . . .
          </label>
          <br>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-8">
          <label style="color:#27607F; font-size:small">
            Backind membantu anda untuk memudahkan pengelolaan bisnis yang anda miliki saat ini,
            dari pengelolaan data usaha, perancangan strategi usaha hingga pengelolaan laporan usaha kini dapat anda kendalikan
            hanya dari satu aplikasi.
            <br>
            <br>
          </label>

          @if (Auth::user()->id_roles == 5)
            <form class="" action="#" method="post">
              <a href=""><button class="btn btn-primary" style=" font-size:small;">Bergabung bersama Backind</button></a>
            </form>
          @endif
          @if (Auth::user()->id_roles == 2)
            <form class="" action="#" method="post">
              <a href=""><button class="btn btn-warning" style=" font-size:small;" disabled>Hai mitra Backind !</button></a>
            </form>
          @endif
        </div>
      </div>

    </div>
    <hr style="margin-top:2.5%">
  </div>

  <div class="container-fluid">
        <!-- Icon Cards -->
        {{-- <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">
                  26 New Messages!
                </div>
              </div>
              <a href="#" class="card-footer text-white clearfix small z-1">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-list"></i>
                </div>
                <div class="mr-5">
                  11 New Tasks!
                </div>
              </div>
              <a href="#" class="card-footer text-white clearfix small z-1">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5">
                  123 New Orders!
                </div>
              </div>
              <a href="#" class="card-footer text-white clearfix small z-1">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-support"></i>
                </div>
                <div class="mr-5">
                  13 New Tickets!
                </div>
              </div>
              <a href="#" class="card-footer text-white clearfix small z-1">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div> --}}

        <!-- Area Chart Example -->
        {{-- <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-area-chart"></i>
            User Register Chart
          </div>
          <div class="card-body">
            <canvas id="myAreaChart" width="100%" height="30"></canvas>
          </div>
          <div class="card-footer small text-muted">
            Updated yesterday at 11:59 PM
          </div>
        </div> --}}

        <div class="row">
          <div class="col-lg-8">
            <label style="color:#27607F; font-size:small; margin-left:20px">
              Backind membantu anda untuk memudahkan pengelolaan bisnis yang anda miliki saat ini,
              dari pengelolaan data usaha, perancangan strategi usaha hingga pengelolaan laporan usaha kini dapat anda kendalikan
              hanya dari satu aplikasi.

              Penyajian data merupakan salah satu kegiatan dalam pembuatan laporan hasil penelitan yang telah dilakukan agar
              dapat dipahami dan dianalisis sesuai dengan tujuan yang diinginkan. Data yang disajikan harus sederhana dan jelas agar muda dibaca.
              Penyajian data juga dimaksudkan agar para pengamat dapat dengan mudah memahami apa yang kita sajikan untuk selanjutnya dilakukan
              penilaian atau perbandingan, dan lain-lain.
              <br>
              <br>
            </label>
            <label style="color:#27607F; font-size:small; margin-left:20px">
              Penyajian data merupakan salah satu kegiatan dalam pembuatan laporan hasil penelitan yang telah dilakukan agar
              dapat dipahami dan dianalisis sesuai dengan tujuan yang diinginkan. Data yang disajikan harus sederhana dan jelas agar muda dibaca.
              Penyajian data juga dimaksudkan agar para pengamat dapat dengan mudah memahami apa yang kita sajikan untuk selanjutnya dilakukan
              penilaian atau perbandingan, dan lain-lain. Penyajian data merupakan salah satu kegiatan dalam pembuatan laporan hasil penelitan yang telah dilakukan agar
              dapat dipahami dan dianalisis sesuai dengan tujuan yang diinginkan. Data yang disajikan harus sederhana dan jelas agar muda dibaca.
              Penyajian data juga dimaksudkan agar para pengamat dapat dengan mudah memahami apa yang kita sajikan untuk selanjutnya dilakukan
              penilaian atau perbandingan, dan lain-lain.
              <br>
              <br>
            </label>
            <!-- Example Bar Chart Card -->
            {{-- <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-bar-chart"></i>
                Revenue Bar Chart
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-8 my-auto">
                    <canvas id="myBarChart" width="100%" height="68%"></canvas>
                  </div>
                  <div class="col-sm-4 text-center my-auto">
                    <div class="h4 mb-0 text-primary">$34,693</div>
                    <div class="small text-muted">YTD Revenue</div>
                    <hr>
                    <div class="h4 mb-0 text-warning">$18,474</div>
                    <div class="small text-muted">YTD Expenses</div>
                    <hr>
                    <div class="h4 mb-0 text-success">$16,219</div>
                    <div class="small text-muted">YTD Margin</div>
                  </div>
                </div>
              </div>
              <div class="card-footer small text-muted">
                Updated yesterday at 11:59 PM
              </div>
            </div> --}}
          </div>

          <div class="col-lg-4">
            <!-- Example Pie Chart Card -->
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-pie-chart"></i>
                <label style="font-size:small">Persentase Usaha</label>
              </div>
              <div class="card-body">
                <input type="hidden" value="{{count($homestayData)}}" id="homestay" >
                <input type="hidden" value="{{count($tourismData)}}" id="tourism" >
                <canvas id="myPieChart" width="100%" height="100%"></canvas>
              </div>
              <div class="card-footer small text-muted">
                <label style="font-size:small">Updated yesterday at 11:59 PM</label>
              </div>
            </div>
          </div>

          <div class="col-lg">

          </div>
    </div>
  </div>
      <!-- /.container-fluid -->
@endsection
