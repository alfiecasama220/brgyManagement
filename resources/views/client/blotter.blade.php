@extends('client.app')

@section('Title', 'Blotter')

@section('content')

<div class="certificate-page">
    <div class="certificate-form">
        <form method="POST" action="{{ route('certificates.store') }}">
            @csrf
            <h3>Blotter Request Form</h3>
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" id="name" value="{{ Auth::user()->name }}" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" value="{{ Auth::user()->email }}" name="email" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="contact-no">Contact Number</label>
                <input type="text" class="form-control" id="contact-no" name="contact_no" required>
            </div>
            <div class="form-group">
                <label for="purpose">Reason</label>
                <textarea class="form-control" id="purpose" name="purpose" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Request</button>
        </form>
    </div>
    <div class="certificate-banner-blotter"></div>
</div>

@endsection