@extends('layouts.main')

@section('container')
<h2 class="display-4">{{ $category_name }}</h2>
@foreach ($category_posts as $post)
<article class="mb-5 mt-5">
    <h4>{{ $post->title }}</h4>
    <h5>By: {{ $post->author }} | Created at: {{ $post->created_at }}</h5>
    <p>
        {{ $post->excerpt }} ... <a href="/blog/{{ $post->slug }}" class="text-decoration-none">Read more</a>
    </p>

</article>
@endforeach
<a href="/categories/" class="btn btn-primary btn-sm">Back to Categories</a>
@endsection
