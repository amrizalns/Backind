<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\roles;
use Auth;
use Storage;
use Alert;

class UserController extends Controller
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

    public function showUser(){
        $user = User::all();
        return view('user/user_list',['users'=>$user]);
    }

    public function editUser($id_user){
        $user = User::find($id_user);
        $roles = roles::all();
        return view('user/user_edit_role',['users'=>$user, 'status'=>$roles]);
    }

    public function editProfileUser($id_user){
        $user = User::find($id_user);
        $roles = roles::all();
        return view('user/user_edit_profile',['users'=>$user, 'status'=>$roles]);
    }

    public function updateUser(Request $request){
        $user = User::find($request->id);
        $user->id_roles= $request->roles;
        $user->save();
        return redirect('userList');
    }

    public function updateProfileUser(Request $request){
        // $user = User::where('id_user',Auth::user->id_user);\
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
        return redirect()->route('index');
    }

    public function deleteUser(Request $request){
        $user = User::find($request->id);
        $user->delete();
        return redirect('userList');
    }

//    public function showResetForm(){
//        return view('auth.passwords.reset');
//    }

}
