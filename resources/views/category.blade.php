@extends('layouts.main')

@section('container')
<h1>Halaman Category</h1>
<ul class="list-group">
    @foreach ($categories as $category)
    <li class="list-group-item">
        <a href="/categories/{{ $category->slug }}" class="text-decoration-none">{{ $category->name }}</a>
    </li>
    @endforeach
  </ul>

@endsection
