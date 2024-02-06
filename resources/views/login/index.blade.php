@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-4">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        @if (session('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <main class="form-signin">
            <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
            <form action="/login" method="post">
                @csrf
                <div class="form-floating">
                    <input type="email" class="form-control" id="email" name="email" @error('email') is-invalid @enderror placeholder="name@example.com" value="{{ old('email') }}" required autofocus>
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="password" id="password" @error('password') is-invalid @enderror placeholder="Password" value="{{ old('email') }}" required>
                    <label for="password">Password</label>
                </div>

                <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                <small class="d-block text-center mt-3">
                    Not registered? <a href="/register" class="text-decoration-none">Register now!</a>
                </small>
            </form>
        </main>
    </div>
</div>
@endsection