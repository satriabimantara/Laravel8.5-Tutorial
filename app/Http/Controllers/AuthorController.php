<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(User $author)
    {
        return view('blog', [
            'title' => 'Blog Users',
            'category' => 'All',
            // avoid N+1 problem using lazy eager loading
            'posts' => $author->posts->load(['category', 'author']),
        ]);
    }
}
