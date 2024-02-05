@extends('layouts.main')

@section('container')
<div class="container">
    <div class="row">
        @foreach ($categories as $category)
        <div class="col-md-4 mb-4">
            <a href="/categories/{{ $category->slug }}" class="text-decoration-none text-white">
                <div class="card bg-dark text-white">
                    <img src="/img/card-image.jpg" class="card-img-top" alt="Card image">
                    <div class="card-img-overlay p-0 d-flex align-items-center">
                        <h5 class="card-title text-center p-4 flex-fill" style="background-color: rgba(0, 0, 0, 0.7)">
                            {{ $category->name }}
                        </h5>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
