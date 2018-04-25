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
use DB;

class ApiBusinessController extends ApiBaseController
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

  public function getDetailBusiness($id)
  {
    $menu = menu::find($id);
    if($id == 1){
      $business_detail = business::with('business_details')->where('id_menu', 1)->get();
      $hasil = ['business_details'=>$business_detail,'menu'=> $menu, 'id_usaha'=>$id ];
      return response()->json($hasil);

    }elseif ($id == 2) {
      $business_detail = business::with('business_details')->where('id_menu', 2)->get();
      $hasil = ['business_details'=>$business_detail,'menu'=> $menu, 'id_usaha'=>$id ];
      return response()->json($hasil);
    }

    // $menu = menu::find($id);
    // if ($id == 1) {
    //   $business_details = business_detail::find($id_business);
    //   $hasil = ['business_details'=>$business_details, 'menu'=>$menu, 'id_usaha'=>$id];
    //   return response()->json($hasil);
    //
    // } elseif ($id == 2) {
    //   $business_details = business_detail::find($id_business);
    //   $hasil = ['business_details'=>$business_details, 'menu'=>$menu, 'id_usaha'=>$id];
    //   return response()->json($hasil);
    // }
  }

  public function getNearby(Request $request, $id)
  {

    $loc = business_detail::find($id);
    $lat = $loc->business_lat;
    $lang = $loc->business_lang;
    $price = $request->input('business_price');

    $nearbyloc = DB::select("
    SELECT
    (
      6371 * acos (
        cos ( radians($lat) )
        * cos( radians( business_lat ) )
        * cos( radians( business_lang  ) - radians($lang) )
        + sin ( radians($lat) )
        * sin( radians( business_lat ) )
      )
    )
    AS distance, a.id_business_details, a.business_name, a.business_price, b.id_menu
    FROM business_details a
    JOIN businesses b
    ON a.id_business_details = b.id_business_details
    WHERE a.business_price < ('$price') AND b.id_menu=2
    HAVING distance < 5
    ORDER BY distance");
    
    if ($nearbyloc!=null) {
      return $this->baseResponse(false, 'berhasil', $nearbyloc);
    } else {
      return $this->baseResponse(true, 'null', $nearbyloc);
    }

  }

  public function getMinBandung()
  {
    $getMinBandung = DB::SELECT(
      "
      SELECT a.city, min(c.business_price)
      FROM cities a
      JOIN businesses b
      ON (a.id_city = b.id_city)
      JOIN business_details c
      ON (b.id_business_details = c.id_business_details)
      GROUP BY a.id_city
      HAVING a.city ='Kota Bandung';
      "
    );
    if ($getMinBandung!=null) {
      return $this->baseResponse(false, 'berhasil', $getMinBandung);
    } else {
      return $this->baseResponse(true, 'null', $getMinBandung);
    }
  }

  public function getMinKabBB()
  {
    $getMinKabBB = DB::SELECT(
      "
      SELECT a.city, min(c.business_price)
      FROM cities a
      JOIN businesses b
      ON (a.id_city = b.id_city)
      JOIN business_details c
      ON (b.id_business_details = c.id_business_details)
      GROUP BY a.id_city
      HAVING a.city ='Kab. Bandung Barat';
      "
    );
    if ($getMinKabBB!=null) {
      return $this->baseResponse(false, 'berhasil', $getMinKabBB);
    } else {
      return $this->baseResponse(true, 'null', $getMinKabBB);
    }
  }

  public function getMinKabBS()
  {
    $getMinKabBS = DB::SELECT(
      "
      SELECT a.city, min(c.business_price)
      FROM cities a
      JOIN businesses b
      ON (a.id_city = b.id_city)
      JOIN business_details c
      ON (b.id_business_details = c.id_business_details)
      GROUP BY a.id_city
      HAVING a.city ='Kab. Bandung Selatan';
      "
    );
    if ($getMinKabBS!=null) {
      return $this->baseResponse(false, 'berhasil', $getMinKabBS);
    } else {
      return $this->baseResponse(true, 'null', $getMinKabBS);
    }
  }
}
