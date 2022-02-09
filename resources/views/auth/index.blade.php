@extends('layouts.main')

@section('container')

{{-- session()->has('success') => ini adalah untuk memanggil session/message --}}

<div class="row justify-content-center">
    <div class="col-lg-4">
        <main class="form-signin">
            @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                   {{ session('loginError') }}
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>
            <form action="/login" method="post">
                @csrf
                <div class="form-floating ">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="floatingInput" placeholder="name@example.com" value="{{ old('email') }}" autofocus >
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
            </form>
            <small class="d-block text-center mt-2">Not registered? <a href="/register" class="text-decoration-none">Register now!</a></small>
        </main>
    </div>
</div>


@endsection