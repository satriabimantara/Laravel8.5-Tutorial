@extends('dashboard.layouts.main')

@section('container')
<div class="container-fluid">
    <div class="row my-3">
        <div class="col-lg-10">
            <h2>
                {{ $post->title }}
            </h2>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="/dashboard/posts" class="btn btn-info"><span data-feather="arrow-left"></span> Back to My Posts</a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn text-decoration-none btn-warning"><span data-feather="edit"></span> Edit</a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="post">
                    @csrf
                    @method('delete')
                    <button type='submit' class="btn btn-danger" onclick="return confirm('Are you sure to delete this post?')">
                        <span data-feather="trash-2"></span> Delete
                    </button>
                </form>
            </div>
            <img src="{{asset('/storage/'.$post->image)}}" class="img-fluid mt-4" alt="Blog Post Image">
            {{-- menampilkan tag html yang ada dalam html --}}
            <article class="my-3 fs-5">
                {!! $post->body !!}
            </article>
        </div>
    </div>
</div>


@endsection
