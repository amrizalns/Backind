<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api;
use App\business;
use App\business_detail;
use App\menu;
use App\city;
use App\review;
use Auth;
use Storage;
use DB;

class ApiBusinessController extends ApiBaseController
{
    public function getTourism()
    {
        $tourism = business::with('business_details', 'review')->where('id_menu', 1)->get();
        return response()->json($tourism);
    }

    public function getHomestay()
    {
        $homestay = business::with('business_details', 'review')->where('id_menu', 2)->get();
        return response()->json($homestay);
    }

    public function getAllUsahaByCity($id)
    {
        $usaha = business::with('business_details', 'review')->where('id_city', $id)->get();
        $hasil = ['business_details' => $usaha];
        if ($hasil != null) {
            return $this->baseResponse(false, 'berhasil', $hasil);
        } else {
            return $this->baseResponse(true, 'null', $hasil);
        }
    }

    public function getHomestayInThatCities($id)
    {
        $homestay = business::with('review', 'business_details')->where(['id_city' => $id, 'id_menu' => 2])->get();
        $hasil = $homestay ;
        if ($hasil != null) {
            return $this->baseResponse(false, 'berhasil', $hasil);
//            return $homestay;
        } else {
            return $this->baseResponse(true, 'null', $hasil);
        }
    }

    public function getTourismInThatCities($id)
    {
        $homestay = business::with('review', 'business_details')->where(['id_city' => $id, 'id_menu' => 1])->get();
        $hasil =  $homestay ;
        if ($hasil != null) {
            return $this->baseResponse(false, 'berhasil', $hasil);
//            return $homestay;
        } else {
            return $this->baseResponse(true, 'null', $hasil);
        }
    }

    public function getAllSpesificUsahaByCity($id, $bis) //menampilkan 1 usaha dengan kotanya
    {
        $usaha = business::with('business_details', 'review')->where([['id_city', $id], ['id_business_details', $bis]])->get();
        $hasil = ['business_details' => $usaha];
        if ($hasil != null) {
            return $this->baseResponse(false, 'berhasil', $hasil);
        } else {
            return $this->baseResponse(true, 'null', $hasil);
        }
    }

    public function getAllMenuUsahaByCity($id, $menu) //menampilkan 1 usaha dengan jenis usahanya
    {
        $usaha = business::with('business_details', 'review')->where([['id_city', $id], ['id_menu', $menu]])->get();
        $hasil = ['business_details' => $usaha];
        if ($hasil != null) {
            return $this->baseResponse(false, 'berhasil', $hasil);
        } else {
            return $this->baseResponse(true, 'null', $hasil);
        }
    }

    public function getDetailBusiness($id)
    {
        $menu = menu::find($id);
        if ($id == 1) {
            $business_detail = business::with('business_details', 'review', 'review.user')->where('id_menu', 1)->get();
            $hasil = ['business_details' => $business_detail, 'menu' => $menu, 'id_usaha' => $id];
            return response()->json($hasil);

        } elseif ($id == 2) {
            $business_detail = business::with('business_details', 'review', 'review.user')->where('id_menu', 2)->get();
            $hasil = ['business_details' => $business_detail, 'menu' => $menu, 'id_usaha' => $id];
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

    public function getDetailPerBisnis($id)
    {
        $business_detail = business::with('business_details', 'review')->where('id_business_details', $id)->get();
        $hasil = ['business_details' => $business_detail];
        if ($hasil != null) {
            return $this->baseResponse(false, 'berhasil', $hasil);
        } else {
            return $this->baseResponse(true, 'null', $hasil);
        }
    }

    public function getNearby(Request $request, $id)
    {
        $loc = business_detail::find($id);
        $menu = DB::select("Select id_menu from businesses where id_business = $id");
        $asd = $menu[0]->id_menu;

        $bus = business::where('id_business', $id)->get();
        foreach ($bus as $ls) {
            $review = review::where('id_business', $ls->id_business);
            $rating = $ls->jumlah_ratings = $review->sum('rating');
            $reviews = $ls->jumlah_review = $review->count();
            $test = $review->avg('rating');
            $ls->avg_rating = intval($test);
        }
        $lat = $loc->business_lat;
        $lang = $loc->business_lang;
        // $rev = $loc->review;
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
    )AS distance, a.id_business_details, a.business_name, a.business_price, b.id_menu, a.business_profile_pict
    FROM business_details a
    JOIN businesses b
    ON a.id_business_details = b.id_business_details
    WHERE a.business_price < ('$price') AND
    b.id_menu = (SELECT id_menu FROM menus WHERE id_menu != ('$asd'))
    HAVING distance < 5
    ORDER BY distance");

        $result = [
            'loc' => $loc,
            'review' => $bus,
            'near' => $nearbyloc,
        ];

        if ($nearbyloc != null) {
            return $this->baseResponse(false, 'berhasil', $result);
        } else {
            return $this->baseResponse(true, 'null', $result);
        }
    }

    public function getMinCity()
    {
        $getMinCity = DB::SELECT(
            "
      SELECT a.id_city, a.city, min(c.business_price)
      FROM cities a
      JOIN businesses b
      ON (a.id_city = b.id_city)
      JOIN business_details c
      ON (b.id_business_details = c.id_business_details)
      GROUP BY a.id_city
      HAVING a.city = a.city;
      "
        );
        if ($getMinCity != null) {
            return $this->baseResponse(false, 'berhasil', $getMinCity);
        } else {
            return $this->baseResponse(true, 'null', $getMinCity);
        }
    }
}
