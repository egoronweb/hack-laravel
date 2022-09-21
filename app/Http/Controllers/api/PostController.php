<?php

namespace App\Http\Controllers\api;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();

        return view('home', ['posts' => $posts]);
    }

    public function welcomeIndex(){
        $posts = Post::all();

        return view('welcome', ['posts' => $posts]);
    }

    public function createPost(Request $request){

        if($request->hasFile('post_image')){
            $image = $request->file('post_image');
            $extension = $image->getClientOriginalExtension();
            $fileName = $image->getFilename().$extension;
            Storage::disk('public')->put($fileName,  File::get($image));
        }else{
            $fileName = null;
        }

        $post = new Post;
        $post ->user_id = $request->input('user_id');
        $post ->post_title = $request->input('post_title');
        $post ->post_body = $request->input('post_body');
        $post ->post_image = $fileName;
        $post->save();
    }
}
