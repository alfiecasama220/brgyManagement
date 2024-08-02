@extends('client.app')

@section('Title', 'Register')

@section('content')

<div class="container" style="height: 50vh;">
    <div class="register-form">
        <h2 class="text-center">Register</h2>
        <form action="{{ route('registerClientPost') }}" method="POST">
            @csrf
            <div class="form-group position-relative">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                <i class="fas fa-user"></i>
            </div>
            <div class="form-group position-relative">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                <i class="fas fa-envelope"></i>
            </div>
            <div class="form-group position-relative">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                <i class="fas fa-lock"></i>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
        <small class="form-text text-muted">Registered already? <a href="{{ route('loginClient') }}">Login here</a></small>
    </div>
</div>

@endsection