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

Route::group(['namespace' => 'Api'], function () {
    Route::post('/register', 'ApiAuthenticateController@register');
    Route::post('/login', 'ApiAuthenticateController@login');

    Route::get('/getUser', 'ApiUserController@getUser');
    Route::get('/getDataUser', 'ApiUserController@getDataUser');
    Route::post('/postDataUser', 'ApiUserController@postDataUser');

    Route::get('/getTourism', 'ApiBusinessController@getTourism');
    Route::get('/getHomestay', 'ApiBusinessController@getHomestay');
});
