@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-lg-5">
        <main class="form-registration">
            <h1 class="h3 mb-3 fw-normal text-center">Registered form</h1>
            <form action="/register" method="post">
                @csrf
                <div class="form-floating">
                    <input type="text" class="form-control rounded-top @error('name') is-invalid @enderror " id="name" placeholder="name" name="name" value="{{ old('name') }}">
                    <label for="name">Name</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" name="username" value="{{ old('username') }}">
                    <label for="username">Username</label>
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" name="email" value="{{ old('email') }}">
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password">
                    <label for="password">Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
            </form>
            <small class="d-block text-center mt-2">Already registered? <a href="/login" class="text-decoration-none">Register</a></small>
        </main>
    </div>
</div>


@endsection