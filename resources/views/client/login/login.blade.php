@extends('client.app')

@section('Title', 'Login')

@section('content')

<div class="container" style="height: 50vh;">
    <div class="login-form">
        <h2 class="text-center">Login</h2>
        <form action="{{ route('loginClientPost') }}" method="POST">
            @csrf
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
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <small class="form-text text-muted">Don't have an account? <a href="{{ route('registerClient') }}">Register here</a></small>
    </div>
</div>

@endsection