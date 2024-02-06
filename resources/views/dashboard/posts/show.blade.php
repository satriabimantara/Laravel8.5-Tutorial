@extends('dashboard.layouts.main')

@section('container')
<div class="container-fluid">
    <div class="row my-3">
        <div class="col-lg-10">
            <h2>
                {{ $post->title }}
            </h2>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="/dashboard/posts/{{ $post->slug }}" class="badge text-decoration-none bg-info"><span data-feather="arrow-left"></span> Back to My Posts</a>
                <a href="#" class="badge text-decoration-none bg-warning"><span data-feather="edit"></span> Edit</a>
                <a href="#" class="badge text-decoration-none bg-danger"><span data-feather="trash-2"></span> Delete</a>
            </div>
            <img src="/img/hero-web_development.png" class="img-fluid mt-4" alt="Blog Post Image">
            {{-- menampilkan tag html yang ada dalam html --}}
            <article class="my-3 fs-5">
                {!! $post->body !!}
            </article>
        </div>
    </div>
</div>


@endsection
