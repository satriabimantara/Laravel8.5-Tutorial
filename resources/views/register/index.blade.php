@extends('layouts.main')
@section('container')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <main class="form-registration">
            <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
            <form>
                <div class="form-floating">
                    <input type="text" class="form-control rounded-top" id="name" name="name" placeholder="Nama Pengguna">
                    <label for="name">Name</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="username" name="username" placeholder="username_pengguna">
                    <label for="username">Username</label>
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control rounded-bottom" id="password" name="password" placeholder="Password">
                    <label for="password">Password</label>
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
