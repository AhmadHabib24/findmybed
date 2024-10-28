@extends('user.layouts.app')



@section('title', 'Room Details')
@php
use Illuminate\Support\Facades\Crypt;
@endphp

<style>
    .book_now_btn {
        display: inline-flex;
        width: 100%;
        height: 40px; 
        align-items: center;
        padding: 8px;
        background-color: #0099DA;
        color: #FFFFFF;
        border-radius: 8px;
        text-decoration: none;
        font-size: 16px;
        font-family: "Open Sans", sans-serif;
        transition: background-color 0.3s ease;
    }


    .table {
        margin-top: 20px;
    }

    .card {
        border: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #0099DA;
    }

    .card-body {
        background-color: #f9f9f9;
    }

    .table th {
        background-color: #0099DA;
    }
</style>
<style>
    @media (max-width: 768px) {
        .table-collapse {
            width: 100%;
            border-collapse: collapse;
        }

        .table-collapse thead {
            display: none;
        }

        .table-collapse tbody tr {
            display: block;
            margin-bottom: 10px;
        }

        .table-collapse tbody tr td {
            display: block;
            text-align: right;
            position: relative;
            padding-left: 50%;
            border: 1px solid #ddd;
        }

        .table-collapse tbody tr td:before {
            content: attr(data-label);
            position: absolute;
            left: 10px;
            width: 45%;
            text-align: left;
            font-weight: bold;
            padding-right: 10px;
        }

        .table-collapse tbody tr td img {
            width: 100%;
            height: auto;
        }
    }
</style>


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
            <h2 class="page-cover-tittle">Room Details</h2>
            <ol class="breadcrumb">
                <li><a href="{{ route('user.index') }}">Home</a></li>
                <li class="active">Room Details</li>
            </ol>
        </div>
    </div>
</section>

<div class="container mt-5 mb-5">
    <div class="card">
        <div class="card-body">
            @if (empty($roomDetails))
                <p>No rooms available for this hotel.</p>
            @else
                <div class="table-responsive"> <!-- Responsive wrapper -->
                    <table class="table table-bordered table-collapse">
                        <thead>
                            <tr>
                                <th>Hotel Name</th>
                                <th>Room Price</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>City</th>
                                <th>Room</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roomDetails as $room)
                                <tr>
                                    <td data-label="Hotel Name">{{ $room['hotel_name'] }}</td>
                                    <td data-label="Room Price">{{ $room['price'] }}</td>
                                    <td data-label="Description">{{ $room['description'] }}</td>
                                    <td data-label="Category">{{ $room['category'] }}</td>
                                    <td data-label="City">{{ $room['city'] }}</td>
                                    <td data-label="Room">
                                        <img style="width: 150px; height: auto;" src="{{ asset('/images/' . $room['image']) }}" alt="{{ $room['category'] }}">
                                    </td>
                                    <td data-label="Action">
                                        <a href="{{ route('user.confirm-reservation', [
                                            'id' => Crypt::encrypt($room['hotel_id']), 
                                            'hotel_name' => Crypt::encrypt($room['hotel_name']), 
                                            'price' => Crypt::encrypt($room['price']), 
                                            'description' => Crypt::encrypt($room['description']), 
                                            'category' => Crypt::encrypt($room['category']), 
                                            'category_id' => Crypt::encrypt($room['category_id']), 
                                            'city' => Crypt::encrypt($room['city'])
                                        ]) }}" class="btn book_now_btn button_hover">
                                            Book Now
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>





<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

@section('scripts')
<script>
    $(document).ready(function () {
        $('#bookingModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal

            // Extract data from data-* attributes
            var hotelName = button.data('hotel-name');
            var hotelId = button.data('hotel-id');
            var price = button.data('price');
            var category = button.data('category');
            var city = button.data('city');

            // Log data to check if it's being passed correctly
            console.log('Hotel Name:', hotelName);
            console.log('Hotel ID:', hotelId);
            console.log('Price:', price);
            console.log('Category:', category);
            console.log('City:', city);

            // Update the modal's content
            $('#hotelName').val(hotelName);
            $('#hotelId').val(hotelId);
            $('#roomPrice').val(price);
            $('#roomCategory').val(category);
            $('#roomCity').val(city);
        });

        // Handle booking form submission
        $('#submitBooking').on('click', function() {
            var form = $('#bookingForm');
            if (form[0].checkValidity()) {
                alert('Booking submitted for ' + $('#firstName').val());
                $('#bookingModal').modal('hide'); // Close modal after submission
            } else {
                form[0].reportValidity();
            }
        });
    });
</script>
@endsection

@endsection
