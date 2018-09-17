<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;


class ApiAuthenticatedController extends Controller
{
    public function register(Request $request)
    {
        $credentials = $request->only('name', 'email', 'password', 'phone_number');

        $rules = ['name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users'];
        $validator = Validator::make($credentials, $rules);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->messages()]);
        }

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $phone_number = $request->phone_number;
        $id_roles = $request->id_roles = 5;

        $user = User::create(['name' => $name, 'email' => $email, 'roles' => $id_roles, 'password' => Hash::make($password),
            'phone_number' => $phone_number]);
//        $verification_code = str_random(30); //Generate verification code
//        DB::table('user_verifications')->insert(['user_id' => $user->id, 'token' => $verification_code]);
//        $subject = "Please verify your email address.";
//        Mail::send('email.verify', ['name' => $name, 'verification_code' => $verification_code],
//            function($mail) use ($email, $name, $subject){
//                $mail->from(getenv("4nesia"), 'ikhsanlaisa@4nesia.com');
//                $mail->to($email, $name);
//                $mail->subject($subject);
////            });
        return response()->json(['success' => true, 'message' => 'Thanks for signing up!.']);
    }

    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $input = $request->only('email', 'password');

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            $error = $validator->messages()->toJson();
            return response()->json(['success' => false, 'error' => $error]);
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        try {
            // attempt to verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['success' => false, 'error' => 'Invalid Credentials. Please make sure you entered the right information and you have verified your email address.'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['success' => false, 'error' => 'could_not_create_token'], 500);
        }

        $user = User::where('email',$request->email)->with('roles')->first();

        $respon = [
            'error' => false,
            'message' => "success",
            'data' => compact('token','user')
        ];

        return response()->json($respon);
    }
}
