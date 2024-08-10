@extends('admin.pages.app')

@section('Title', 'Blotter')

@section('content')

<!-- Image Popup Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Document Preview</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="" id="modalImage" class="img-fluid" alt="Document Preview">
            </div>
        </div>
    </div>
</div>


<!-- Side Popup Add User -->
<div class="side-popup" id="sidePopup">
    <div class="side-popup-content">
        <div class="side-popup-header">
            <h5 class="side-popup-title">Add Clients</h5>
            <span class="side-popup-close" id="closeSidePopup">&times;</span>
        </div>
        <div class="modal-body">
            <form id="addUserForm" method="POST" action="{{ route('users.store') }}">
                @csrf
                <div class="form-group">
                    <label for="username">Fullname</label>
                    <input type="text" class="form-control" id="username" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" name="role" required>
                        <option value="Admin">Admin</option>
                        <option value="Client">Client</option>
                        <!-- Add more roles as needed -->
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add Clients</button>
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
                        <h5 class="card-title">Blotters</h5>
                        {{-- <button class="btn btn-success" id="toggleSidePopup"><i class="fas fa-user-plus"></i> Add Client</button> --}}
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Contact No.</th>
                                    <th>Proof</th>
                                    <th>Reason</th>
                                    <th>Action</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tables as $table)
                                <tr>
                                    <td>{{ $table->id }}</td>
                                    <td class="w-25">{{ $table->name }}</td>
                                    <td>{{ $table->email }}</td>
                                    <td class="w-25">{{ $table->address }}</td>
                                    <td>{{ $table->contact }}</td>
                                    <td >
                                        <img src="{{ asset('/storage/' . $table->image) }}" width="73%" alt="" class="clickable-image" data-toggle="modal" data-target="#imageModal" data-src="{{ asset('/storage/' . $table->image) }}">
                                    </td>   
                                    <td>{{ $table->purpose }}</td>
                                    <td>{{ $table->Reason }}</td>
                                    <td>
                                        <div class="d-flex">
                                            {{-- <div><button class="btn btn-primary btn-sm ml-3"><i class="fas fa-edit"></i> Edit</button></div> --}}
                                            <div>
                                                <form action="{{ route('certificatesDelete' , $table->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn bg-danger btn-sm ml-3"><i class="fas fa-trash"></i> Delete</button>
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