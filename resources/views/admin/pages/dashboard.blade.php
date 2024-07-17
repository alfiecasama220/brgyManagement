@extends('admin.pages.app')

@section('Title', 'Dashboard')

@section('content')



<!-- Page Content -->
<div class="container-fluid">
    <div class="row">

        @foreach ($contents as $content)
        {{-- <div class="col-lg-4" style="height: 25vh">
            <div class="card" style="height: 80%">
                <div class="card-body">
                    <h5 class="card-title">{{ $content->title }}</h5>
                    <p class="card-text mb-5">{{ $content->description }}</p>
                    <h4 class="float-right">{{ $content->count }}</h4>
                    <p>Total {{ $content->title }}:</p>
                </div>
            </div>
        </div> --}}
        <div class="col-md-4 mb-5">
            <a href="" class="card-link">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total {{ $content->title }}</h5>
                        <p class="card-text">Current number of registered {{ Str::of($content->title)->lower() }}.</p>
                        <div class="text-center">
                            <i class="{{ $content->icons }} card-icon"></i>
                            <h3>{{ $content->count }}</h3>
                            <h4>{{ $content->description }}</h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
</div>

@endsection