@extends('client.app')

@section('Title', 'Home')

@section('content')

<main>
    <div class="jumbotron jumbotron-fluid text-center bg-cover text-white">
        <div class="containers">
            <h1 class="display-4">Welcome to Our Site!</h1>
            <p class="lead">Stay updated with the latest announcements and news.</p>
        </div>
    </div>

    <div class="container mt-5">
        <section class="announcements mb-5">
            <h2 class="mb-4">Announcements</h2>

            @foreach($tables as $table)
            <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $table->title }}</h5>
                    <p class="card-text">{{ $table->message }}</p>
                    <p class="card-text">
                        <small class="text-muted">
                            Posted on
                            @php
                                $format = $table->created_at;
                                $dateFormat = new DateTime($format);
                                $dateFormat->setTimezone(new DateTimeZone('Asia/Manila'));
                                $final = $dateFormat->format('F j, Y, g:i A');
                            @endphp
                            {{ $final }}
                        </small>
                    </p>
                </div>
            </div>
            @endforeach

        </section>

        <section class="barangay-officials mb-5">
            <h2 class="mb-4">Barangay Officials</h2>
            <div class="row">
                @php
                    $officials = [
                        ['name' => 'John Doe', 'position' => 'Barangay Captain', 'image' => '/assets/images/user.png'],
                        ['name' => 'Jane Smith', 'position' => 'Barangay Secretary', 'image' => '/assets/images/user.png'],
                        ['name' => 'Robert Brown', 'position' => 'Barangay Treasurer', 'image' => '/assets/images/user.png'],
                        ['name' => 'Emily White', 'position' => 'Kagawad', 'image' => '/assets/images/user.png'],
                        ['name' => 'Michael Green', 'position' => 'Kagawad', 'image' => '/assets/images/user.png'],
                        // Add more officials as needed
                    ];
                @endphp

                @foreach ($officials as $official)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <img src="{{ $official['image'] }}" class="card-img-top" alt="{{ $official['name'] }}">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $official['name'] }}</h5>
                                <p class="card-text">{{ $official['position'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</main>

@endsection