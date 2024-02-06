@extends('layouts.main')
@section('container')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <main class="form-registration">
            <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
            <form action='/register', method='post'>
                @csrf
                <div class="form-floating">
                    <input type="text" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama Pengguna" value="{{ old('name') }}">
                    <label for="name">Name</label>
                    @error('name')
                        <div class="invalid-feeedback text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="username_pengguna" value="{{ old('username') }}">
                    <label for="username">Username</label>
                    @error('username')
                        <div class="invalid-feeedback text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}">
                    <label for="email">Email address</label>
                    @error('email')
                        <div class="invalid-feeedback text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" value="{{ old('password') }}">
                    <label for="password">Password</label>
                    @error('password')
                        <div class="invalid-feeedback text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
                <small class="d-block text-center mt-3">
                    Already registered? <a href="/login" class="text-decoration-none">Login now!</a>
                </small>
            </form>
        </main>
    </div>
</div>
@endsection
