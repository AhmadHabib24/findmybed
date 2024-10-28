@extends('user.layouts.app')
@section('title', 'Confirm Booking')
<style>
       /* Alert container to position alerts on the right side */
       .alert-container {
    position: fixed;
    top: 20px; /* Adjust top position if needed */
    right: 20px; /* Adjust right position if needed */
    z-index: 1050; /* Ensure it appears above other elements */
    max-width: 300px; /* Adjust width as needed */
}

.alert {
    position: absolute;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;
    z-index: 9999;
    width: 21%;
    /* display: flex; */
    right: 0 !important;/* Space between alerts */
}

.alert-dismissible .btn-close {
    position: absolute;
    top: 0;
    right: 0;
    padding: 0.5rem 0.75rem;
    color: inherit;
    background-color: transparent;
    border: none;
}
</style>
@section('body')
@if (session('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('message') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- Error Messages Alert -->
@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!--================Breadcrumb Area =================-->
<section class="breadcrumb_area">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
    <div class="container">
        <div class="page-cover text-center">
            <h2 class="page-cover-tittle">Confirm Booking</h2>
            <ol class="breadcrumb">
                <li><a href="{{ route('user.index') }}">Home</a></li>
                <li class="active">Confirm Booking</li>
            </ol>
        </div>
    </div>
</section>

<div class="container mt-5 mb-5">
    <div class="container">
        <h2>Booking Confirmation</h2>
        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Booking Form -->
        {{-- {{ route('submit.booking') }} --}}
        <p><strong><b>Arrival Date:</b></strong> {{ session('arrivalDate') ? date('d M Y', strtotime(session('arrivalDate'))) : 'N/A' }}</p>
        <p><strong><b>Departure Date:</b></strong> {{ session('departureDate') ? date('d M Y', strtotime(session('departureDate'))) : 'N/A' }}</p>
        <p><strong><b>City:</b></strong> {{ session('cityName') ? session('cityName') : 'N/A' }}</p>
        <p><strong><b>Hotel:</b></strong> {{ session('hotelName') ? session('hotelName') : 'N/A' }}</p>
        {{-- <p><strong><b>Room category:</b></strong> {{ session('room_category_id') ? session('room_category_id') : 'N/A' }}</p> --}}
        <p><strong><b>Room Name:</b></strong> {{ session('room_category_name') ? session('room_category_name') : 'N/A' }}</p>
        {{-- <p><strong><b>Auth id:</b></strong> {{ session('authid') ? session('authid') : 'N/A' }}</p> --}}
         <!--@dd(session()->all())-->

        <div class="instructions mt-4">
            <h3>Booking Instructions</h3>
            <ul>
                <li>No smoking is allowed in any part of the hotel premises.</li>
                <li>Please respect the quiet hours from 10 PM to 8 AM to ensure a peaceful environment for all guests.</li>
                <li>Pets are not allowed in the hotel.</li>
                <li>In case of early check-out, please notify the front desk 24 hours in advance.</li>
                <li>Any damage to hotel property will result in additional charges.</li>
                <li>Guests are expected to follow the hotel’s safety and security procedures.</li>
            </ul>
            <p>Please make sure to fill in all the required fields in the form. After submitting the form, you will receive a confirmation email with the details of your booking. If you have any special requests or need to make changes to your booking, please contact our support team. Thank you for choosing our service. We look forward to your stay!</p>
        </div>
        <form action="{{ route('submit.booking') }}" method="POST">
            @csrf
            <input type="hidden" name="room_category_id" id="room_category_id" value="{{ $roomCategoryId }}">
            
            
            <div class="form-group">
                <label for="full_name">Full Name:</label>
                <input type="text" id="full_name" name="full_name" class="form-control" value="{{ old('full_name') }}" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>
            
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" required>
            </div>
            
            <div class="form-group">
                <label for="special_requests">Special Requests:</label>
                <textarea id="special_requests" name="special_requests" class="form-control">{{ old('special_requests') }}</textarea>
            </div>
            
            <div class="form-group form-check">
                <input type="checkbox" id="terms" name="terms" class="form-check-input" required {{ old('terms') ? 'checked' : '' }}>
                <label for="terms" class="form-check-label">
                    I agree to the <a href="#terms_conditions" data-toggle="modal">terms and conditions</a>.
                </label>
            </div>
            
            <button type="submit" class="book_now_btn button_hover">Submit Booking</button>
        </form>
        
        
        <!-- Instructions -->
        
    </div>
</div>

<!-- Modal for Terms and Conditions -->
<div class="modal fade" id="terms_conditions" tabindex="-1" role="dialog" aria-labelledby="terms_conditions_label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="terms_conditions_label">Terms and Conditions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Here you can add your detailed terms and conditions. Include information about cancellation policies, booking amendments, and any other relevant details.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection
