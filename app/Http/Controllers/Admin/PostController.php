<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // % se l'utente attualmente loggato e' un admin
        if (Auth::user()->isAdmin()){
            $posts = Post::paginate(18);
        } else {
            // # altrimenti mostra solo i suoi post
            $posts = Post::where("user_id", Auth::id())->paginate(18);
        }

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $post = new Post();
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact("post", "categories",'tags' ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        // dd($request->all());
        $data = $request->validated();

        // ! prendo il file e lo metto in storage/imgs/posts
        // # salva nel db l'indirizzo locale a cui questo file uploadato si trova
        $img_path = Storage::put('uploads/posts', $data['image']);

        $data["user_id"] = Auth::id();
        $data["date"] = Carbon::now();
        $data["image"] = $img_path;
        $newPost = Post::create($data);
        $newPost->tags()->sync($data["tags"]);

        return redirect()->route("admin.posts.show", $newPost);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact("post", "categories", "tags"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->validated();
        $post->update($data);
        $post->tags()->sync($data["tags"]);

        return redirect()->route("admin.posts.show", $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->tags()->detach();
        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
