@extends('admin.app')

@section('Title', 'Register')

@section('content')

<div class="container-fluid vh-100 d-flex justify-content-center align-items-center bg-light">
    <div class="card p-4 shadow-lg border-0" style="max-width: 400px;">
      <div class="card-body">
        <h3 class="card-title text-center mb-4">Admin Register</h3>
        <form action="{{ route('registerPost') }}" method="POST">
          @csrf
          @if (session('error') || $errors->has('email'))
              <h5 class="text-danger">{{ session('error') ?: $errors->first('email') }}</h5>
          @elseif(session('success'))
              <h5 class="text-success">{{ session('success') }}</h5>
          @endif
          <div class="form-group">
            <label for="fullName">Full Name</label>
            <input type="text" class="form-control @if(session('error')) is-invalid @endif" name="name" id="fullName" placeholder="Enter full name">
          </div>
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control @if(session('error') || $errors->has('email')) is-invalid @endif" name="email" id="email" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <div class="input-group">
              <input type="password" class="form-control @if(session('error')) is-invalid @endif" name="password" id="password" placeholder="Password">
              <div class="input-group-append">
                <span class="input-group-text" id="togglePassword" style="cursor: pointer;"><i class="bi bi-eye-fill"></i></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="role">Role</label>
            <select class="form-control" id="role" name="role" required>
                <option value="Admin">Admin</option>
                <option value="Client">Client</option>
                <!-- Add more roles as needed -->
            </select>
        </div>
          <button type="submit" class="btn btn-primary btn-block">Register</button>
        </form>
      </div>
    </div>
  </div>

@endsection