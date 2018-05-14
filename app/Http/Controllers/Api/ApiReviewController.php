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
        $business = business::find($request->input('id_business'));

        $review = review::create([
            'id_business'=>$business,
            'id_user' => Auth::user()->id_user,
            'review' => $request->input('review'),
            'response' => $request->input('response'),
            'rating' => $request->input('rating'),
        ]);
        $result = $review->save();
        if ($result){
            return $this->baseResponse(false, 'berhasil', $review);
        } else {
            return $this->baseResponse(true, 'gagal membuat review', $review);
        }
    }

    public function showreview(){
        $review = review::with('business', 'user')->get();
        if ($review){
            return $this->baseResponse(false, 'berhasil', $review);
        } else {
            return $this->baseResponse(true, 'gagal membuat review', $review);
        }
    }
}
