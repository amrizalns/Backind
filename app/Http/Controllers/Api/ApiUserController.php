<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\roles;
use Illuminate\Support\Facades\Auth;

class ApiUserController extends Controller
{

    public function __construct()
    {
        $this->middleware("jwt.auth");
    }

    public function getUser()
    {
      $user = User::all();
      return response()->json($user);
    }

    public function getDataUser()
    {
      $user = Auth::user();
      return response()->json($user);
    }

    public function postUpdateDataUser(Request $request)
    {
      $user = User::find($request->id);
      if ($request->avatar) {
        $path=$request->avatar->store('avatar', 'public');
        if ($user->avatar != "avatar/default_avatar.png") {
          Storage::disk('public')->delete($user->avatar);
        }
      }else {
        $path = $user->avatar;
      }

      $user->name= $request->name;
      $user->email= $request->email;
      // $user->password= bcrypt($request->password);
      $user->address= $request->address;
      $user->phone_number= $request->phone_number;
      $user->avatar= $path;
      $user->save();
      return response()->json($user);
    }
}
