<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    public function index(){

        $posts = Post::with("user", "category", "tags")->paginate(10); // % lazy loading di 30 post

        return response()->json([
            'success' => true,
            'results' => $posts
        ]);
    }

    public function show(Post $post){

        // $post = Post::with("user", "category", "tags")->findOrFail($id) ; // # eager loading del mio singolo post senza d.i.
        $post->loadMissing("user", "category", "tags"); // # eager loading del singolo post con d.i.

        return response()->json([
            'success' => true,
            'results' => $post
        ]);
    }
}
