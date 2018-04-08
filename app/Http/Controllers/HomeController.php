<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\business;
use App\menu;
use Alert;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $businessTourism = business::where('id_menu', 1)->get();
        $businessHomestay = business::where('id_menu', 2)->get();
        Alert::success('Hi, '.Auth::user()->name.' selamat datang di Backind, platform pencarian tempat wisata dan pengelolaan usaha sektor pariwisata yang belum pernah ada sebelumnya.', 'Selamat Datang')->autoclose(3000);
        return view('home',[
          'tourismData' => $businessTourism,
          'homestayData' => $businessHomestay
        ]);
    }

    public function pagenotfound()
    {
      return view ('errors.404');
    }

}
