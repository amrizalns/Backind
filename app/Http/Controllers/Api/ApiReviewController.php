<?php

namespace App\Http\Controllers\Api;

use App\business;
use App\review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApiReviewController extends ApiBaseController
{
    public function postreview(Request $request){

        $review = review::create([
            'id_business'=>$request->input('id_business'),
            'id_user' => Auth::user()->id_user,
            'review' => $request->input('review'),
            'response' => $request->input('response'),
            'rating' => $request->input('rating'),
        ]);
        if ($review->save()){
            return $this->baseResponse(false, 'berhasil', $review);
        } else {
            return $this->baseResponse(true, 'gagal membuat review', null);
        }
    }

    public function showreview($id){
        $review = review::with('business', 'user')->where('id_business',$id)->get();
        $hasil = ['review'=>$review];
        if ($review){
            return $this->baseResponse(false, 'berhasil', $review);
        } else {
            return $this->baseResponse(true, 'gagal membuat review', $review);
        }
    }
}
