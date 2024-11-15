@extends('admin.pages.app')

@section('Title', 'Profiles')

@section('content')

 <!-- Profile Settings Content -->
 <div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <form action="{{ route('profilesImage', Auth::user()->id) }}" id="profileImageForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
            <div class="card">
                <div class="card-body text-center">
                    <img src="
                    
                    {{ $noPic }}
                    
                    " alt="Profile Picture" width="100%" class="profile-pic mb-3" id="profilePic">
                    <h5 class="card-title">{{ Auth::user()->name }}</h5>
                    {{-- <p class="card-text">{{ Auth::user()->name }}</p> --}}
                    <p class="card-text">{{ Auth::user()->role }}</p>
                    <input type="file" class="custom-file-input" id="profilePicInput" name="image" accept="image/*" style="display:none;">
                    <label class="upload-button" for="profilePicInput">
                        <i class="fas fa-upload"></i> Upload New Picture
                    </label>
                </div>
            </div>
            </form>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Profile Settings</h5>
                    <form action="{{ route('users.update', Auth::user()->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        {{-- <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Enter username" value="{{ Auth::user()->name }}">
                        </div> --}}
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ Auth::user()->email }}">
                        </div>
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password"  name="password" placeholder="New Password">
                                {{-- <div class="input-group-append">
                                    <span class="input-group-text show-password"><i class="fa fa-eye"></i></span>
                                </div> --}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword">Confirm New Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="confirmPassword" name="password_confirmation" placeholder="Confirm New Password">
                                {{-- <div class="input-group-append">
                                    <span class="input-group-text show-password"><i class="fa fa-eye"></i></span>
                                </div> --}}
                            </div>
                        </div>  
                        <button type="submit" class="btn btn-primary btn-block w-25 float-right">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection