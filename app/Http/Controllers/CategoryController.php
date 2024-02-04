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
            'categories' => Category::all()
        ]);
    }
    // cara Route Binding
    public function show(Category $category)
    {
        return view('category_post', [
            'title' => 'Category Post',
            'category_name' => $category->name,
            'category_posts' => $category->post,
        ]);
    }
}
