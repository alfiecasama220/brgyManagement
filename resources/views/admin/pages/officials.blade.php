@extends('admin.pages.app')

@section('Title', 'Officials')

@section('content')



<!-- Side Popup Add User -->
<div class="side-popup" id="sidePopup">
    <div class="side-popup-content">
        <div class="side-popup-header">
            <h5 class="side-popup-title">Add Officials</h5>
            <span class="side-popup-close" id="closeSidePopup">&times;</span>
        </div>
        <div class="modal-body">
            <form id="addUserForm" method="POST" action="{{ route('officials.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label for="role">Position</label>
                    <select class="form-control" id="position" name="position" required>
                        <option value=""></option>
                        @foreach ($position as $positions )
                            <option value="{{ $positions->id }}">{{ $positions->title }}</option>
                        @endforeach
                        
                        <!-- Add more roles as needed -->
                    </select>
                </div>
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
                        <h5 class="card-title">Barangay Officials</h5>
                        <button class="btn btn-success" id="toggleSidePopup"><i class="fas fa-user-plus"></i> Add Officials</button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Date posted</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tables as $table)
                                <tr>
                                    <td>{{ $table->id }}</td>
                                    <td>{{ $table->name }}</td>
                                    <td>{{ $table->position->title }}</td>
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
