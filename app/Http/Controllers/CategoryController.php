<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category', [
            'title' => 'Category',
            // avoid N+1 problem using Eager loading
            'categories' => Category::with(['post'])->all()
        ]);
    }
    // cara Route Binding
    public function show(Category $category)
    {
        return view('blog', [
            'title' => 'Blog by Category',
            'category' => $category->name,
            'posts' => $category->post,
        ]);
    }
}
