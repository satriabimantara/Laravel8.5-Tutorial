@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Posts</h1>
</div>
<a href="/dashboard/posts/create" class="btn btn-primary mb-3"><span data-feather="plus-circle"></span> Add New Post</a>
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show col-lg-10" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="table-responsive col-lg-10">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Category</th>
            <th scope="col">Short text</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->category->name }}</td>
                <td>{{ $post->excerpt }}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="/dashboard/posts/{{ $post->slug }}" class="btn text-decoration-none btn-info"><span data-feather="eye"></span></a>
                        <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn text-decoration-none btn-warning"><span data-feather="edit"></span></a>
                        <form action="/dashboard/posts/{{ $post->slug }}" method="post">
                            @csrf
                            @method('delete')
                            <button type='submit' class="btn btn-danger" onclick="return confirm('Are you sure to delete this post?')">
                                <span data-feather="trash-2"></span>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection
