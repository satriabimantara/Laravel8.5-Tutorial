@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add New Post</h1>
</div>
<div class="container-fluid mb-3">
    <div class="row">
        <div class="col-lg-8">
            <form method="post" action="/dashboard/posts" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required @error('title') is-invalid @enderror value="{{ old('title') }}">
                    @error('title')
                        <div class="invalid-feeedback text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" required @error('slug') is-invalid @enderror value="{{ old('slug') }}">
                    @error('slug')
                        <div class="invalid-feeedback text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    @error('category_id')
                        <div class="invalid-feeedback text-danger">{{ $message }}</div>
                    @enderror
                    <select class="form-select" id='category' name="category_id" @error('category_id') is-invalid @enderror>
                        @foreach ($categories as $category)
                        @if (old('category_id')==$category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <img class="img-preview img-fluid col-sm-5 mb-3">
                    <input class="form-control" type="file" id="image" name="image" required @error('image') is-invalid @enderror onchange='previewImage()'>
                    @error('image')
                        <div class="invalid-feeedback text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    @error('body')
                        <div class="invalid-feeedback text-danger">{{ $message }}</div>
                    @enderror
                    <input id="body" type="hidden" name="body" required value="{{ old('body') }}">
                    <trix-editor input="body"></trix-editor>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<script src="/js/dashboard/script.js"></script>
@endsection

