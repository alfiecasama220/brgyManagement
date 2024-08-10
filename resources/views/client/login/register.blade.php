@extends('client.app')

@section('Title', 'Register')

@section('content')

<div class="container" style="height: auto;">
    <div class="register-form">
        <h2 class="text-center">Register</h2>
        @if (session('success'))
                <h5 class="text-success">{{ session('success') }}</h5>
        @elseif (session('error') || $errors->has('email'))
            <h5 class="text-danger">{{ session('error') ?: $errors->first('email') }}</h5>
        @endif
        <form action="{{ route('registerClientPost') }}" method="POST" enctype="multipart/form-data">
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
            {{-- <div class="form-group">
                <label for="upload">To verify your identity</label>
            </div> --}}
            <div class="form-group">
                <small class="text-danger" for="upload">To verify your identity upload your Valid ID</small>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="upload" name="document" accept="image/*" required>
                    <label class="custom-file-label" for="upload">Choose file</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
        <small class="form-text text-muted">Registered already? <a href="{{ route('loginClient') }}">Login here</a></small>
    </div>
</div>

@endsection