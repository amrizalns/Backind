<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace'=> 'Api'], function(){
  Route::post('/register','ApiAuthenticatedController@register');
  Route::post('/login','ApiAuthenticatedController@login');
  // Route::get('/getUser','ApiUserController@getUser');
  Route::get('/getDataUser', 'ApiUserController@getDataUser');
  Route::post('/postUpdateDataUser','ApiUserController@postDataUser');

  Route::get('/getTourism','ApiBusinessController@getTourism');
  Route::get('/getHomestay','ApiBusinessController@getHomestay');
  Route::get('/getAllUsahaByCity/{id}','ApiBusinessController@getAllUsahaByCity');
  Route::get('/getAllSpesificUsahaByCity/{id}/{bis}','ApiBusinessController@getAllSpesificUsahaByCity');
  Route::get('/getAllMenuUsahaByCity/{id}/{menu}','ApiBusinessController@getAllMenuUsahaByCity');
  Route::get('/getDetailBusiness/{id}','ApiBusinessController@getDetailBusiness');
  Route::get('/getDetailPerBisnis/{id}','ApiBusinessController@getDetailPerBisnis');

  Route::post('/postAddBooking','ApiBookingController@store');
  Route::post('/postUpdateCost/{booking_detail}','ApiBookingController@updateCost');
  Route::get('/getInvoice/{id}','ApiBookingController@invoice');

  Route::post('/getNearby/{id}','ApiBusinessController@getNearby');
  Route::get('/getMinCity','ApiBusinessController@getMinCity');
  Route::get('/getTicketHistory','ApiTransactionController@getTickerHistory');

  Route::post('postReview', 'ApiReviewController@postreview')->middleware('jwt.auth');

  Route::get('showReview/{id}', 'ApiReviewController@showreview');
});
