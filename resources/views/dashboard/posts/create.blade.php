@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add New Post</h1>
</div>
<div class="col-lg-8">
    <form method="post" action="/dashboard/posts">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" >
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug">
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" required id='category'>
                <option value=''>- Category</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <input id="body" type="hidden" name="body">
            <trix-editor input="body"></trix-editor>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    // fetch API untuk mendapatkan slug dari title
    title.addEventListener('change', function(){
        fetch('/dashboard/post/fetchSlug?title='+title.value)
        .then(function(response){
            return response.json();
        })
        .then(function(data){
            slug.value = data.slug;
        })
    });

    // Hilangkan fitur upload files pada trix sementara
    document.addEventListener('trix-file-accept',function(e){
        e.preventDefault();
    });

</script>
@endsection
