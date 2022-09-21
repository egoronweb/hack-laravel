<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        $users = User::all();

        return response()->json([
            'status' => 200,
            'user' => $users,
        ]);
    }

    public function edit($id){
        $user = User::find($id);

        if($user){

            return response()->json([
                'status' => 200,
                'user' => $user,
            ]);
        }
    }
}
