<?php

namespace App\Http\Controllers\api;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
    }

    public function createPost(Request $request){
        $post = Post::new();
        $post->post_title = $request->input('post_title');
        $post->post_image = $request->input('post_image');
        $post->post_body = $request->input('post_body');
    }

    
}
