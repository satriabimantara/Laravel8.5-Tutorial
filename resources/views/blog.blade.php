@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h1 class="text-center">All Post {{ $heading }}</h1>
    </div>
</div>
<div class="row justify-content-center mb-5">
    <div class="col-md-6">
        <form action="/blog">
            @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            @if (request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}">
            @endif
            <div class="input-group mb-3">
                @if ($category!='All')
                <a href="/blog" class="btn btn-success">All Blog</a>
                @endif
                <input type="text" class="form-control" placeholder="Keyword search..." value="{{ request('search') }}"  name="search">
                <button class="btn btn-danger" type="submit" >Search</button>
            </div>
        </form>
    </div>
</div>

@if ($posts->count())
<div class="card mb-3 text-center">
    {{-- Ambil gambar dari API unsplash --}}
    <img src="{{asset('/storage/'.$posts[0]->image)}}" class="card-img-top" alt="Hero image post">
    <div class="card-body">
        <h3 class="card-title">
            <a href="/blog/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a>
        </h3>
        <p class='card-text'>
            <small class="text-body-secondary">
                By:
                <a href="/blog?author={{ $posts[0]->author->username }}" class="text-decoration-none">
                    {{ $posts[0]->author->name }}
                </a> in
                <a href="/blog?category={{ $posts[0]->category->slug }}" class='text-decoration-none'>
                    {{ $posts[0]->category->name }}
                </a>
                {{ $posts[0]->created_at->diffForHumans() }}
            </small>
        </p>
        <p class="card-text">{{ $posts[0]->excerpt }}... <a href="/blog/{{ $posts[0]->slug }}">read more</a></p>
    </div>
</div>
{{-- looping postingan tanpa postingan pertama (terbaru) --}}
<div class="container">
    <div class="row">
        @foreach ($posts->skip(1) as $post)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)">
                    <a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none text-white">{{ $post->category->name }}</a>
                </div>
                <img src="{{asset('/storage/'.$post->image)}}" class="card-img-top" alt="Card image">
                {{-- Using unsplash API to get free images --}}
                {{-- <img src="{!! Unsplash::randomPhoto()->orientation('landscape')->term($post->category->name)->toJson()->urls->raw !!}" class="card-img-top" alt="..."> --}}
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="/blog/{{ $post->slug }}" class="text-decoration-none text-dark">{{ $post->title }}</a>
                    </h5>
                    <p class='card-text'>
                        <small class="text-body-secondary">
                            By:
                            <a href="/blog?author={{ $post->author->username }}" class="text-decoration-none">
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
@else
    <h4 class="text-center">No Post Found!</h4>
@endif
<div class="container-fluid d-flex justify-content-center">
    {{ $posts->links() }}
</div>
@endsection
