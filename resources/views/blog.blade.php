@extends('layouts.main')

@section('container')
<div class="alert alert-primary" role="alert">
    <h1>Category: {{ $category }}</h1>
</div>
@if ($category!='All')
<div class="row mb-3">
    <div class="col">
        <a href="/blog" class="btn btn-success btn-sm">All Blog</a>
    </div>
</div>
@endif
@if ($posts->count())
<div class="card mb-3 text-center">
    {{-- Ambil gambar dari API unsplash --}}
    <img src="/img/hero-web_development.png" class="card-img-top" alt="Hero image post">
    <div class="card-body">
        <h3 class="card-title">
            <a href="/blog/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a>
        </h3>
        <p class='card-text'>
            <small class="text-body-secondary">
                By:
                <a href="/authors/{{ $posts[0]->author->username }}" class="text-decoration-none">
                    {{ $posts[0]->author->name }}
                </a> in
                <a href="/categories/{{ $posts[0]->category->slug }}" class='text-decoration-none'>
                    {{ $posts[0]->category->name }}
                </a>
                {{ $posts[0]->created_at->diffForHumans() }}
            </small>
        </p>
        <p class="card-text">{{ $posts[0]->excerpt }}... <a href="/blog/{{ $posts[0]->slug }}">read more</a></p>
    </div>
</div>
@else
    <p>
        No posts found!
    </p>
@endif

{{-- looping postingan tanpa postingan pertama (terbaru) --}}
<div class="container">
    <div class="row">
        @foreach ($posts->skip(1) as $post)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)">
                    <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none text-white">{{ $post->category->name }}</a>
                </div>
                <img src="/img/card-image.jpg" class="card-img-top" alt="Card image">
                {{-- Using unsplash API to get free images --}}
                {{-- <img src="{!! Unsplash::randomPhoto()->orientation('landscape')->term($post->category->name)->toJson()->urls->raw !!}" class="card-img-top" alt="..."> --}}
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="/blog/{{ $post->slug }}" class="text-decoration-none text-dark">{{ $post->title }}</a>
                    </h5>
                    <p class='card-text'>
                        <small class="text-body-secondary">
                            By:
                            <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">
                                {{ $post->author->name }}
                            </a>
                            {{ $post->created_at->diffForHumans() }}
                        </small>
                    </p>
                    <p class="card-text">{{ $post->excerpt }}</p>
                    <a href="/blog/{{ $post->slug }}" class="btn btn-primary">Read more</a>
                </div>
              </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
