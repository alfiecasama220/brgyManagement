@extends('admin.pages.app')

@section('Title', 'Voters')

@section('content')



<!-- Side Popup Add User -->
<div class="side-popup" id="sidePopup">
    <div class="side-popup-content">
        <div class="side-popup-header">
            <h5 class="side-popup-title">Add Voters</h5>
            <span class="side-popup-close" id="closeSidePopup">&times;</span>
        </div>
        <div class="modal-body">
            <form id="addUserForm" method="POST" action="{{ route('voters.store') }}">
                @csrf
                <div class="form-group">
                    <label for="username">Voter's ID</label>
                    <input type="text" class="form-control" id="username" name="voterID" value="{{ old('voterID') }}" required>
                </div>
                <div class="form-group">
                    <label for="username">Fullname</label>
                    <input type="text" class="form-control" id="username" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Address</label>
                    <input type="text" class="form-control" id="email" name="address" value="{{ old('address') }}" required>
                </div>
                <div class="form-group">
                    <label for="text">Age</label>
                    <input type="text" class="form-control" id="aeg" name="age" required>
                </div>
                {{-- <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" id="role" name="role" required>
                        <option value="Admin">Admin</option>
                        <option value="Client">Client</option>
                        <!-- Add more roles as needed -->
                    </select>
                </div> --}}
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="card-title">Voters</h5>
                        <button class="btn btn-success" id="toggleSidePopup"><i class="fas fa-user-plus"></i> Add Voters</button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Voter's ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Age</th>
                                    <th>Registered</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tables as $table)
                                <tr>
                                    <td>{{ $table->id }}</td>
                                    <td>{{ $table->voterID }}</td>
                                    <td>{{ $table->name }}</td>
                                    <td>{{ $table->address }}</td>
                                    <td>{{ $table->age }}</td>
                                    @php
                                        $date = $table->created_at;
                                        $dateTime = new DateTime($date);
                                        $dateTime->setTimezone(new DateTimeZone('Asia/Manila'));
                                        $read = $dateTime->format('F j, Y, g:i A');
                                    @endphp
                                    <td>{{ $read }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <div><button class="btn btn-primary btn-sm ml-3"><i class="fas fa-edit"></i> Edit</button></div>
                                            <div>
                                                <form action="{{ route('users.destroy' , $table->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm ml-3"><i class="fas fa-trash"></i> Delete</button>
                                                </form>
                                            </div>  
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                <!-- Add more user rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
