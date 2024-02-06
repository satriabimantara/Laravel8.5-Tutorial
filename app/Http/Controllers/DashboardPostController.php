<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ambil semua data postingan dari user yang bersangkutan
        $posts = Post::where('user_id', auth()->user()->id)->get();
        return view('dashboard.posts.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        // validasi data yang masuk
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'image' => 'image|required|file|max:2048',
            'body' => 'required',
        ]);
        // check jika image ada isinya
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-image');
        }
        $validatedData['user_id'] = auth()->user()->id;
        // remove body dari tag html
        $cleaned_body = strip_tags($request->body);
        $validatedData['excerpt'] = Str::limit($cleaned_body, 50, '...');

        // create data Post
        Post::create($validatedData);

        // sisipkan flash message dan redirect ke halaman mypost
        return redirect('/dashboard/posts')->with('success', 'New Post was created successfully');
    }

    /**
     * Display the specified resource (halaman detail).
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'body' => 'required',
        ];
        // define rules validation untuk menangani field slug agar tidak crash dengan data slug yang sama yang sudah ada di table post
        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }
        // define rules validation untuk menangani field image
        if ($request->file('image')) {
            if ($request->file('image') != $post->image) {
                $rules['image'] = 'image|file|max:1024';
            }
        }

        // lakukan validasi input dengan rules
        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->user()->id;
        // remove body dari tag html
        $cleaned_body = strip_tags($request->body);
        $validatedData['excerpt'] = Str::limit($cleaned_body, 50, '...');

        if ($request->file('image')) {
            // check jika ada update image, maka image yang lama dihapus dari storage agar tidak memenuhi memori
            if ($request->oldPathImage) {
                Storage::delete($request->oldPathImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-image');
        } else {
            $validatedData['image'] = $post->image;
        }

        // update data Post
        Post::where('id', $post->id)->update($validatedData);

        // sisipkan flash message dan redirect ke halaman mypost
        return redirect('/dashboard/posts')->with('success', 'Post was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // hapus image dulu sebelum post dihapus
        if ($post->image) {
            Storage::delete($post->image);
        }
        Post::destroy($post->id);
        return redirect("/dashboard/posts")->with('success', "Post was deleted successfully!");
    }

    // Ambil data slug dengan API dari js
    public function fetchSlug(Request $request)
    {
        // tangkap request dari fetch API js
        $title = $request->title;
        $slug = SlugService::createSlug(Post::class, 'slug', $title);
        return response()->json([
            'slug' => $slug
        ]);
    }
}
