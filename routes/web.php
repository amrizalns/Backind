<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/user', function () {
    return view('user/user_list');
});

Auth::routes();

Route::get('pagenotfound', ['as'=>'notfound', 'users' => 'HomeController@pagenotfound']);

//Route::get('/password/reset', 'UserController@showResetForm');

Route::group(['middleware'=>['auth']], function(){
  Route::get('/', 'HomeController@home')->name("index");
  Route::get('/home', 'HomeController@home');

  //select
  Route::get('userList','UserController@showUser');
  Route::get('businessList/{id}','BusinessController@showBusiness')->name('businessList');
  Route::get('businessDetail/{id}','BusinessController@indexBusiness')->name('businessDetail');
  Route::get('addBusiness/{id}','BusinessController@addBusiness')->name('addbusiness');
  Route::get('add_trans','BookingDetailController@index')->name('add_trans');
  Route::get('invoice/{booking_detail}','BookingDetailController@invoice')->name('invoice');
  Route::get('invoice_final/{id_booking}','TransactionPaymentController@invoice_final')->name('invoice_final');
  Route::get('status_trans_spadmin','TransactionPaymentController@index_spAdmin')->name('status_trans_spadmin');
  Route::get('status_trans_admin','TransactionPaymentController@index_Admin')->name('status_trans_admin');
  Route::get('eticket','TransactionPaymentController@eticket')->name('eticket');

  //insert
  Route::post('businessInsert/{id}','BusinessController@insertBusiness')->name('insertBusiness');
  Route::post('list_booking','BookingDetailController@store')->name('list_booking');

  //getdata
  Route::get('userEdit/{id}','UserController@editUser');
  Route::get('userEditProfile/{id}','UserController@editProfileUser')->name('editProfileUser');
  Route::get('businessEdit/{id}/{id_business}','BusinessController@edit')->name('editBisnis');
  Route::get('businessView/{id}/{id_business}','BusinessController@view');

  //update
  Route::put('userEdit/update','UserController@updateUser');
  Route::post('userProfileEdit','UserController@updateProfileUser')->name('userProfileEdit');
  Route::put('businessUpdate/{id}/{id_menu}', 'BusinessController@update')->name('updateBusiness');

  Route::get('update_cost/{booking_detail}','BookingDetailController@update')->name('update_cost');
  Route::get('payment_conf/{transaction_payment}','TransactionPaymentController@update')->name('payment_conf');
  Route::put('updateDetailImage/{id}','BusinessController@updateDetailImage')->name('updateDetailImage');
  Route::put('uploadBukti','TransactionPaymentController@uploadBukti')->name('uploadBukti');
  Route::post('businessStatus/{id_business}','BusinessController@editStatus')->name('businessStatus');
  Route::post('transactionStatus/{id_transaksi}','TransactionPaymentController@editStatusTransaksi')->name('transactionStatus');
  //delete
  Route::post('userDelete','UserController@deleteUser');
  Route::post('delete','BusinessController@delete');

  //print
  Route::get('printTransactionData/{id}/{id_business}','BusinessController@printTransactionData');
  Route::get('printPaidTicket/{id}','TransactionPaymentController@printPaidTicket')->name('printPaidTicket');
  Route::get('printWaitTicket/{id}','TransactionPaymentController@printWaitTicket')->name('printWaitTicket');
});
