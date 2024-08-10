<!-- Sidebar -->
<div class="sidebar">
    <h2 class="text-center mb-4">Admin Dashboard</h2>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-users mr-2"></i>Users</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('adminClients') }}"><i class="fas fa-users mr-2"></i>Clients</a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('AddContent.create') }}"><i class="fass bi-body-text mr-2"></i>Add Category</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-chart-line mr-2"></i>Analytics</a>
        </li> --}}
        {{-- <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-cog mr-2"></i>Settings</a>
        </li> --}}
    </ul>
</div>w