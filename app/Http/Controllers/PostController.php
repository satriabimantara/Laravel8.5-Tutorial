<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use MarkSitko\LaravelUnsplash\Facades\Unsplash;

class PostController extends Controller
{
    public function index()
    {
        return view('blog', [
            'title' => 'Blog',
            'category' => 'All',
            // 'posts' => Post::all(),
            // show from the latest post and avoid N+1 problem using eager loading
            // 'posts' => Post::with(['category', 'author'])->latest()->get()
            'posts' => Post::latest()->get()
        ]);
    }
    // cara manual find a post
    // public function show($id)
    // {
    //     return view('post', [
    //         'title' => 'Single Post',
    //         'post' => Post::find($id)
    //     ]);
    // }
    // cara Route Binding
    public function show(Post $post)
    {
        return view('post', [
            'title' => 'Single Post',
            'category' => $post->category->name,
            'post' => $post
        ]);
    }
}
