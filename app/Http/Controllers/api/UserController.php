<?php

namespace App\Http\Controllers\api;

use App\api\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function saveUser(Request $request){
        $user = new User;

        if($request->input('password') === $request->input('re_password')){
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->save();

            return response()->json([
                'status' => 200,
                'message' => 'Users Added Successfully',
            ]);
        }
        return response()->json([
            'status' => 500,
            'message' => 'Your password does not match',
        ]);
    }

    public function loginUser(Request $request){
        $user = User::where('email', $request->input('email'))->first();

        if(!$user || !Hash::check($request->input('password'), $user->password) || $request->input('password') && $request->input('email') === null){
            return response()->json([
                'status' => 500,
                'message' => 'Invalid Credentials',
            ]);
        }else{
            return response()->json([
                'status' => 200,
                'message' => 'Login Sucessfully',
            ]);
        }
    }
}
