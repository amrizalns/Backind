<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;

use App\business;
use App\business_detail;
use App\menu;
use App\city;
use App\business_picture;
use Auth;
use Storage;

class BusinessController extends Controller
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

    public function showBusiness($id)
    {
      $menu = menu::find($id);
      if($id == 1){
        $business_detail = business::where('id_menu', 1)->get();
        return view('admin/business_list',['bus_list_page'=>$business_detail,'menu'=> $menu, 'id_usaha'=>$id ]);
        //id_usha->$usaha = mengambil primary key dari table constraint
      }elseif ($id == 2) {
        $business_detail = business::where('id_menu', 2)->get();
        return view('admin/business_list',['bus_list_page'=>$business_detail,'menu'=> $menu, 'id_usaha'=>$id ]);
      }
    }

    public function indexBusiness($id){
        $menu = menu::find($id);
        if($id == 1){
          $business_detail = business::where([['id_menu', 1], ['id_user', Auth::id()]])->get();
          return view('business/business_detail',['bus_list_page'=>$business_detail,'menu'=> $menu, 'id_usaha'=>$id ]);
          //id_usha->$usaha = mengambil primary key dari table constraint
        }elseif ($id == 2) {
          $business_detail = business::where([['id_menu', 2], ['id_user', Auth::id()]])->get();
          return view('business/business_detail',['bus_list_page'=>$business_detail,'menu'=> $menu, 'id_usaha'=>$id ]);
        }
    }

    public function addBusiness($id){
      $menu = menu::find($id);
        $business_detail = business_detail::all();
        $city_list = city::all();
        return view('business/add_business_detail',['business_details'=>$business_detail, 'menu'=> $menu, 'city'=>$city_list]);
    }

    public function insertBusiness(Request $data, $id){
      if($data->bus_pict){
        $path = $data->bus_pict->store('bus_avatar','public');
      }else {
        $path = '';
      }

      if(isset($data['condition'])){
        $condition = $data['condition'];
      }else{
        $condition = 1;
      }

      $this->validate($data, [
          'bus_pict' => 'required|image:png|image:jpg|image:jpeg',
          'img' => 'required|image:png|image:jpg|image:jpeg',
          'imgg' => 'image:png|image:jpg|image:jpeg',
          'imggg' => 'image:png|image:jpg|image:jpeg',
          'desc' => 'max:500',
      ]);

      $business_detail = business_detail::create([
          'business_name' => $data['name'],
          'business_email' => $data['email'],
          'business_address' => $data['address'],
          'business_lat' => $data['lat'],
          'business_lang' => $data['lang'],
          'business_phone' => $data['phone'],
          'business_open_time' => $data['open'],
          'business_close_time' => $data['close'],
          'business_price' => $data['price'],
          'business_desc' => $data['desc'],
          'business_profile_pict' => $path,
          'condition'=> $condition
      ]);

      if ($data->img) {
        $path1 = $data->img->store('bus_detail','public');
        business_picture::create([
          'id_business_detail' => $business_detail->id_business_details,
          'pict_url' => $path1
        ]);
      }
      if ($data->imgg) {
        $path2 = $data->imgg->store('bus_detail','public');
        business_picture::create([
          'id_business_detail' => $business_detail->id_business_details,
          'pict_url' => $path2
        ]);
      }
      if ($data->imggg) {
        $path3 = $data->imggg->store('bus_detail','public');
        business_picture::create([
          'id_business_detail' => $business_detail->id_business_details,
          'pict_url' => $path3
        ]);
      }
          if($id == 1 ){
            business::create([
              'id_menu' => $id,
              'id_user' => Auth::user()->id_user,
              'id_city' => $data['city'],
              'id_business_details' => $business_detail->id_business_details,
              'condition'=> $condition
            ]);
          }elseif($id == 2){
            business::create([
              'id_menu' => $id,
              'id_user' => Auth::user()->id_user,
              'id_city' => $data['city'],
              'id_business_details' => $business_detail->id_business_details
            ]);
            business_detail::where('id_business_details',$business_detail->id)->update(['condition'=>$condition]);
            // $business_detail->business_status = $data['status'];
            $business_detail->save();
          }
        alert()->success('Usaha Baru Berhasil di Tambahkan', 'Selamat')->persistent('Tutup');
        return redirect()->route ('businessDetail',['id'=>$id]);
        // ->with(['message'=>'Usaha baru berhasil di tambahkan !'])
    }

    public function edit($id, $id_business)
    {
      $menu = menu::find($id);
      if ($id == 1) {
      $business_details = business_detail::find($id_business);
      return view('business/edit_business',['business_details'=>$business_details, 'menu'=>$menu, 'id_usaha'=>$id]);
    }elseif ($id == 2) {
      $business_details = business_detail::find($id_business);
      return view('business/edit_business',['business_details'=>$business_details, 'menu'=>$menu, 'id_usaha'=>$id]);
    }
    }

    public function view($id, $id_business)
    {
      $menu = menu::find($id);
      if ($id == 1) {
        $business_details = business_detail::find($id_business);
        return view('business/view_business',['business_details'=>$business_details, 'menu'=>$menu, 'id_usaha'=>$id]);
      } elseif ($id == 2) {
        $business_details = business_detail::find($id_business);
        return view('business/view_business',['business_details'=>$business_details, 'menu'=>$menu, 'id_usaha'=>$id]);
      }

    }

    public function update(Request $data, $id_business, $id_menu)
    {
          $business_detail = business_detail::find($id_business);
          $business_detail->business_name = $data->input('name');
          $business_detail->business_email = $data->input('email');
          $business_detail->business_address = $data->input('address');
          $business_detail->business_lat = $data->input('lat');
          $business_detail->business_lang = $data->input('lang');
          $business_detail->business_phone = $data->input('phone');
          $business_detail->business_open_time = $data->input('open');
          $business_detail->business_close_time = $data->input('close');
          $business_detail->business_price = $data->input('price');
          $business_detail->business_desc = $data->input('desc');
          if ($id_menu == 2) {
            $business_detail->condition = $data->input('condition');
          }


      // if ($data->hasFile('bus_pict')) {
      //       // $pict = $data->file('bus_pict')->store('bus_avatar','public');
      //       return $data->input(;
      //       $pict = $data->bus_pict->store('bus_avatar','public');
      //       // foreach ($pict as $pic) {
      //       //   $picts = $pic->getClientOriginalName();
      //       //   $pic->move("storage/bus_avatar/", $picts);
      //       //  }
      //       // $path = $data->bus_pict->store('bus_avatar','public');
      //       $business_detail->business_profile_pict = $pict;
      //   }
            $pict = $data->file('bus_pict')->store('bus_avatar','public');
            $business_detail->business_profile_pict = $pict;
           $business_detail->save();
           return redirect()->route ('businessDetail',['id'=>$id_menu]);
    }

    public function delete(Request $request)
    {
      if($request->id_usaha == 1 ){
        $business = business::where('id_business_details',$request->id_business_detail)->delete();
        $business_detail = business_detail::where('id_business_details',$request->id_business_detail)->delete();
        // $business->delete();

      }elseif($request->id_usaha == 2){
        $business = business::where('id_business_details',$request->id_business_detail)->delete();
        $business_detail = business_detail::where('id_business_details',$request->id_business_detail)->delete();
        //$business->delete();
      }
      return redirect('businessDetail/'.$request->id_usaha);
    }

    public function editStatus(Request $request , business $id_business){

        $id_business->business_status= $request->input('status');
        $id_business->save();
        alert()->success('Status usaha berhasil diubah', 'Selamat')->persistent('Tutup');
        return redirect(route('businessList',['id_business' => $id_business->id_menu]));
    }
}
