<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use MarkSitko\LaravelUnsplash\Facades\Unsplash;

class PostController extends Controller
{
    public function index()
    {
        $listOfFiltersQuery = request(['search', 'category', 'author']);
        $heading = '';
        if (request('category')) {
            $heading = request('category') ? 'in ' . ucwords(implode(" ", explode("-", request('category')))) : '';
        }
        if (request('author')) {
            $heading = request('author') ? 'by ' . User::firstWhere('username', request('author'))->name : '';
        }

        return view('blog', [
            'title' => 'Blog',
            'category' => request('category') ?? 'All',
            'heading' => $heading,
            // 'posts' => Post::all(),
            // show from the latest post and avoid N+1 problem using eager loading
            // 'posts' => Post::with(['category', 'author'])->latest()->get()
            // using pagination and query string in Laravel
            'posts' => Post::latest()->filter($listOfFiltersQuery)->paginate(7)->withQueryString()
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
