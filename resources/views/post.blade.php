@extends('layouts.main')

@section('container')
<article class="mb-5">
    <h2>
        {{ $post->title }}
    </h2>
    <h5>{{ $post->author}} in category <a href="/categories/{{ $post->category->slug }}" class='text-decoration-none'>{{ $post->category->name }}</a></h5>
    {{-- menampilkan tag html yang ada dalam html --}}
    {!! $post->body !!}
</article>
<a href="/blog" class="btn btn-primary btn-sm">Back to Blog</a>
@endsection
