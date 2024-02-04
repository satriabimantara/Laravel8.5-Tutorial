@extends('layouts.main')

@section('container')
@foreach ($posts as $post)
<article class="mb-5 border-bottom">
    <h2>
        <a href="/blog/{{ $post->slug }}">{{ $post->title }}</a>
    </h2>
    <h5>By: <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}" class='text-decoration-none'>{{ $post->category->name }}</a></h5>
    <p>
        {{ $post->excerpt }}... <a href="/blog/{{ $post->id }}">read more</a>
    </p>
</article>

@endforeach

@endsection
