@extends('admin.app')

@section('Title', 'Home')

@section('content')

<div class="container-fluid vh-100 d-flex justify-content-center align-items-center bg-light">
    <div class="card p-4 shadow-lg border-0 w-75" style="max-width: 400px;">
      <div class="card-body">
        <h3 class="card-title text-center mb-4">Admin Login</h3>
        <form action="{{ route('loginPost') }}" method="POST">
          @csrf
          @if (session('error'))
              <h5 class="text-danger">{{ session('error') }}</h5>
          @elseif(session('success'))
              <h5 class="text-success">{{ session('success') }}</h5>
          @endif
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control  @if(session('error')) is-invalid @endif" name="email" id="email" placeholder="Enter email" required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <div class="input-group">
              <input type="password" class="form-control @if(session('error')) is-invalid @endif" name="password" id="password" placeholder="Password" required>
              <div class="input-group-append">
                <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                  <i class="bi bi-eye-fill"></i>
                </span>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
      </div>
    </div>
  </div>

@endsection