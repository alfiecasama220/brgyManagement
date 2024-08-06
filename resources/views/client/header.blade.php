<header class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <a class="navbar-brand" href="#">
        <img src="/assets/images/logo.png" alt="Barangay Bunao Logo" class="navbar-logo">
        Barangay Bunao
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('about') }}">About</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Request
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('certificates.index') }}">Certificates</a>
                    <a class="dropdown-item" href="{{ route('blotter.index') }}">Blotter</a>
                </div>
            </li>
            @if(Session::get('LoggedInClient') == false)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('loginClient') }}">Login</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logoutClient') }}">Logout</a>
                </li>
            @endif
        </ul>
    </div>  
</header>
