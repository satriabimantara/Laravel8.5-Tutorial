@extends('layouts.main')

@section('container')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>
                {{ $post->title }}
            </h2>
            <p class='card-text'>
                <a href="/blog?author={{ $post->author->username }}" class="text-decoration-none">
                    {{ $post->author->name}}
                </a> in category
                <a href="/blog?category={{ $post->category->slug }}" class='text-decoration-none'>
                    {{ $post->category->name }}
                </a>
            </p>
            <img src="/img/hero-web_development.png" class="img-fluid" alt="Blog Post Image">
            {{-- menampilkan tag html yang ada dalam html --}}
            <article class="my-3 fs-5">
                {!! $post->body !!}
            </article>
            <a href="/blog" class="btn btn-primary btn-sm">Back to Blog</a>
        </div>
    </div>
</div>
@endsection
