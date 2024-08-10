@extends('client.app')

@section('Title', 'Login')

@section('content')

<div class="container" style="height: 50vh;">
    <div class="login-form">
        <h2 class="text-center">Login</h2>
        <form action="{{ route('loginClientPost') }}" method="POST">
            @csrf
            @if (session('success'))
                <h5 class="text-success">{{ session('success') }}</h5>
        @elseif (session('error') || $errors->has('email'))
            <h5 class="text-danger">{{ session('error') ?: $errors->first('email') }}</h5>
        @endif
            <div class="form-group position-relative">
                <label for="email">Email</label>
                <input type="email" class="form-control @if(session('error')) is-invalid border-danger @endif" id="email" name="email" placeholder="Enter your email" required>
                @if(!session('error'))<i class="fas fa-envelope"></i>@endif
            </div>
            <div class="form-group position-relative">
                <label for="password">Password</label>
                <input type="password" class="form-control @if(session('error')) is-invalid border-danger @endif" id="password" name="password" placeholder="Enter your password" required>
                @if(!session('error'))<i class="fas fa-lock"></i>@endif
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <small class="form-text text-muted">Don't have an account? <a href="{{ route('registerClient') }}">Register here</a></small>
    </div>
</div>

@endsection