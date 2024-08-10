@extends('admin.pages.app')

@section('Title', 'Home')

@section('content')

<!-- Page Content -->
<div class="container-fluid">
    <div class="row">
        @php
            $cards = [
                ['title' => 'Populations', 'icon' => 'bi-people', 'link' => 'populations.index'],
                ['title' => 'Voters', 'icon' => 'bi-person-check', 'link' => 'voters.index'],
                ['title' => 'Non-Voters', 'icon' => 'bi-person-x', 'link' => 'non-voters.index'],
                ['title' => 'Certificates Request', 'icon' => 'bi-file-earmark-text', 'link' => 'certificates'],
                ['title' => 'Blotter', 'icon' => 'bi-journal-text', 'link' => 'blotter'],
                ['title' => 'Announcement', 'icon' => 'bi-megaphone', 'link' => 'announcement.index'],              
                ['title' => 'Barangay Officials', 'icon' => 'bi-person-badge', 'link' => 'officials.index'],
            ];
        @endphp

        @foreach ($cards as $card)
            <div class="col-md-4 mb-4">
                <a href="{{ route($card['link']) }}" class="card-link">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="{{ $card['icon'] }} card-icon"></i>
                            <h5 class="card-title">{{ $card['title'] }}</h5>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

@endsection