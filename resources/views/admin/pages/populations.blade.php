@extends('admin.pages.app')

@section('Title', 'Populations')

@section('content')


<!-- Side Popup Add User -->
<div class="side-popup" id="sidePopup">
    <div class="side-popup-content">
        <div class="side-popup-header">
            <h5 class="side-popup-title">Add Populations</h5>
            <span class="side-popup-close" id="closeSidePopup">&times;</span>
        </div>
        <div class="modal-body">
            <form id="addUserForm" method="POST" action="{{ route('populations.store') }}">
                @csrf
                <div class="form-group">
                    <label for="username">Fullname</label>
                    <input type="text" class="form-control" id="username" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
                </div>
                <div class="form-group">
                    <label for="address">Birthdate</label>
                    <input type="date" placeholder="Choose Date" name="birthdate" class="form-control" id="fecha1">
                </div>
                <div class="form-group">
                    <label for="role">Voters</label>
                    <select class="form-control" id="role" name="role" required>
                        <option id="options" value=""></option>
                        <option id="options" value="1">Voters</option>
                        <option id="options" value="0">Non-voterss</option>
                        <!-- Add more roles as needed -->
                    </select>
                </div>
                <div id="voterIDPromt" class="form-group voterIDPromt">
                    <label for="address">Voter's ID</label>
                    <input type="text" class="form-control" id="voterID" name="voterID" value="{{ old('voterID') }}">
                </div>
                {{-- <div class="form-group">
                    <label for="birthdate">Birthdate</label>
                    <input type="text" class="form-control" id="email" name="birthdate" value="{{ old('birthdate') }}" required>
                </div> --}}
                
                {{-- <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" id="role" name="role" required>
                        <option value="Admin">Admin</option>
                        <option value="Client">Client</option>
                        <!-- Add more roles as needed -->
                    </select>
                </div> --}}
                <button class="btn btn-primary">Add</button>
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
                        <h5 class="card-title">Populations</h5>
                        <button class="btn btn-success" id="toggleSidePopup"><i class="fas fa-user-plus"></i> Add Populations</button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Birthday</th>
                                    <th>Status</th>
                                    <th>Voter's ID</th>
                                    <th>Registered</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if (!$tables->isEmpty())
                                    
                                @foreach ($tables as $table)
                                <tr>
                                    <td>{{ $table->id }}</td>
                                    <td>{{ $table->name }}</td>
                                    <td>{{ $table->address }}</td>
                                    <td>{{ $table->birthdate }}</td>

                                    @php
                                        if($table->voterSelect  == 1) {
                                            $status = "Voter";
                                        } else {
                                            $status = "Non-Voter";
                                        }
                                    @endphp
                                    <td>{{ $status }}</td>
                                    <td>{{ $table->voterID }}</td>
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
                                                <form action="{{ route('populations.destroy' , $table->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm ml-3"><i class="fas fa-trash"></i> Delete</button>
                                                </form>
                                            </div>  
                                        </div>
                                       

                                    </td>
                                </tr>
                                @endforeach

                                @else
                                    @php
                                        $noData = "No data fetched";
                                    @endphp
                                @endif
                                <!-- Add more user rows as needed -->
                            </tbody>
                        </table>
                        @if(isset($noData))
                            <div class="w-100 text-center"><p>{{ $noData }}</p></div>
                        @endif
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection