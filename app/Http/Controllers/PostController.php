<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('blog', [
            'title' => 'Blog',
            'posts' => Post::all()
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
            'post' => $post
        ]);
    }
}
