@extends('user.layouts.app')
@section('title', 'Confirm Booking')

@section('body')
@if (session('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('message') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

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

<section class="breadcrumb_area">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0"></div>
    <div class="container">
        <div class="page-cover text-center">
            <h2 class="page-cover-tittle">Confirm Booking Details</h2>
            <ol class="breadcrumb">
                <li><a href="{{ route('user.index') }}">Home</a></li>
                <li class="active">Booking Details</li>
            </ol>
        </div>
    </div>
</section>

<div class="container mt-5 mb-5" id="booking">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="" id="">Booking Details</h5>
                </div>
                <div class="card-body">
                    <form id="bookingForm" method="POST" action="{{ route('user.confirm-reservation-store', ['id' => ($hotel_id)]) }}">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="hotelName" class="form-label">Hotel Name</label>
                                <input type="text" class="form-control" id="hotelName" value="{{ $hotel_name }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="roomPrice" class="form-label">Room Price</label>
                                <input type="text" class="form-control" id="roomPrice" value="{{ $price }}" disabled>
                                <input type="hidden" name="roomPrice" value="{{ $price }}"> <!-- Hidden input for room price -->
                            </div>
                        </div>

                        <input type="hidden" name="hotel_id" value="{{ $hotel_id }}">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="roomCategory" class="form-label">Category</label>
                                <input type="text" class="form-control" id="roomCategory" value="{{ $category }}" disabled>
                                <input type="hidden" name="category_id" value="{{ $category_id }}">
                            </div>
                            <div class="col-md-6">
                                <label for="roomCity" class="form-label">City</label>
                                <input type="text" class="form-control" id="roomCity" value="{{ $city }}" disabled>
                                <input type="hidden" name="city" value="{{ $city }}"> <!-- Hidden input for city -->
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="arrival_date" class="form-label">Arrival Date</label>
                                <div class='input-group date'>
                                    <input type='text' name="arrival_date" id="arrival_date" class="form-control" placeholder="Arrival Date" required />
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="departure_date" class="form-label">Departure Date</label>
                                <div class='input-group date'>
                                    <input type='text' name="departure_date" id="departure_date" class="form-control" placeholder="Departure Date" required />
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="fullName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" name="fullName" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="number" class="form-control" name="phone" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="specialRequest" class="form-label">Special Requests</label>
                            <textarea class="form-control" name="specialRequest" rows="3"></textarea>
                        </div>
                        
                        <!--<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>-->
                        <button type="submit" class="btn theme_btn button_hover">Submit Booking</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Initialize datepicker for Arrival Date
    $("#arrival_date").datepicker({
        minDate: 0,
        dateFormat: 'yy-mm-dd',
        onSelect: function(selectedDate) {
            $("#departure_date").datepicker("option", "minDate", selectedDate);
        }
    });

    // Initialize datepicker for Departure Date
    $("#departure_date").datepicker({
        minDate: 0,
        dateFormat: 'yy-mm-dd'
    });
});
</script>
@endsection
