<?php

namespace App\Http\Controllers\api;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index(){
        $post = Post::new();

        return response()->json([
            'status' => 200,
            'image'
        ]);
    }

    public function createPost(Request $request){
        $post->post_title = $request->input('post_title');
        $post->
    }
}
