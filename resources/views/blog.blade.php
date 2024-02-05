@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col">
        <h1>Category: {{ $category }}</h1>
    </div>
</div>
@if ($category!='All')
<div class="row mb-3">
    <div class="col">
        <a href="/blog" class="btn btn-success btn-sm">All Blog</a>
    </div>
</div>
@endif
@foreach ($posts as $post)
<article class="mb-5 border-bottom">
    <h2>
        <a href="/blog/{{ $post->slug }}">{{ $post->title }}</a>
    </h2>
    <h5>By:
        <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">
            {{ $post->author->name }}
        </a> in
        <a href="/categories/{{ $post->category->slug }}" class='text-decoration-none'>
            {{ $post->category->name }}
        </a>
    </h5>
    <p>
        {{ $post->excerpt }}... <a href="/blog/{{ $post->slug }}">read more</a>
    </p>
</article>

@endforeach

@endsection
