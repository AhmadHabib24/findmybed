@extends('user.layouts.app')
@section('title', 'Hotels')

<style>


.card {
    border: none; /* Remove default border */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add shadow */
    transition: transform 0.2s; /* Animation on hover */
    height: 450px; /* Adjusted height */
}

.card:hover {
    transform: scale(1.05); /* Scale up on hover */
}

.card-header {
    position: relative;
    padding: 0; /* Remove padding for the header */
    background-color: transparent;
}

.card-header img {
    width: 100%;
    height: 150px; /* Fixed height for the image */
    object-fit: cover; /* Ensure the image fits the frame without distortion */
    border-radius: 8px 8px 0 0; /* Rounded top corners */
}

.card-title-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    background: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
    color: #fff;
    padding: 10px;
    text-align: center;
}

.card-body {
    background-color: #f9f9f9; /* Light background for body */
    display: flex;
    flex-direction: column; /* Arrange items in a column */
    justify-content: space-between; /* Distribute space between items */
    height: 100%; /* Allow body to take full height of the card */
}

.card-footer {
    background-color: #fff;
    border-top: 1px solid #ddd; /* Separate footer with border */
    padding: 15px;
    text-align: center; /* Center the button */
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
            <h2 class="page-cover-tittle">Hotels in {{ $city->name ?? 'Unknown City' }}</h2>
            <ol class="breadcrumb">
                <li><a href="{{ route('user.index') }}">Home</a></li>
                <li class="active">Hotels</li>
            </ol>
        </div>
    </div>
</section>

<div class="container mt-5 mb-5">
    <h3>Hotels:</h3>
   
    @if ($hotels->isEmpty())
        <p>No hotels found for the selected city.</p>
    @else
        <div class="row">
            @foreach ($hotels as $hotel)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <img src="{{ asset('' . $hotel->hotel_image) }}" alt="{{ $hotel->name }}">
                            <div class="card-title-overlay">
                                <h5>{{ $hotel->name }}</h5>
                                <p>Category: {{ $categories[$hotel->id] }}</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <p><strong>Location:</strong> {{ $city->name ?? 'Finding Location' }}</p>

                            <!-- Fetch rooms for the current hotel -->
                            @if (isset($rooms[$hotel->id]) && $rooms[$hotel->id]->isNotEmpty())
                                <h6>Available Rooms Standerd:</h6>
                                <ul>
                                    @foreach ($rooms[$hotel->id] as $room)
                                        <li>{{ $roomCategories[$room->id] }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <p>No rooms available.</p>
                            @endif
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('user.room-details', ['id' => $hotel->id]) }}" class="btn theme_btn button_hover">See Availability</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
