@extends('layouts.main')

@section('container')
<article class="mb-5">
    <h2>
        {{ $post['title'] }}
    </h2>
    <h5>{{ $post['author'] }}</h5>
    <p>{{ $post['text'] }}</p>
</article>
<a href="/blog" class="btn btn-primary btn-sm">Back to Blog</a>
@endsection
