<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\business;
use App\business_detail;
use App\menu;
use App\city;
use Auth;
use Storage;

class ApiBusinessController extends Controller
{
  public function getTourism()
  {
    $tourism = business::with('business_details')->where('id_menu', 1)->get();
    return response()->json($tourism);
  }
  public function getHomestay()
  {
    $homestay = business::with('business_details')->where('id_menu', 2)->get();
    return response()->json($homestay);
  }

  public function getDetailBusiness($id, $id_business)
  {
    $menu = menu::find($id);
    if ($id == 1) {
      $business_details = business_detail::find($id_business);
      $hasil = ['business_details'=>$business_details, 'menu'=>$menu, 'id_usaha'=>$id];
      return response()->json($hasil);
    } elseif ($id == 2) {
      $business_details = business_detail::find($id_business);
      $hasil = ['business_details'=>$business_details, 'menu'=>$menu, 'id_usaha'=>$id];
      return response()->json($hasil);
    }
  }
}
