@extends('user.layouts.app')
@section('title','Booking')
<style>
.book_now_btn {
    display: inline-flex;
    width: 20px; /* Set custom width */
    height: 30px; 
    align-items: center;
    padding: 8px 16px; /* Adjust padding to make the button smaller */
    background-color: #0099DA;
    color: #FFFFFF;
    border-radius: 8px; /* Add border radius */
    text-decoration: none;
    font-size: 14px; /* Adjust font size as needed */
    font-family: "Open Sans", sans-serif;
    transition: background-color 0.3s ease;
}

.book_now_btn:hover {
    background-color: #0068aa;
}

.book_now_btn i {
    font-size: 15px; /* Adjust icon size as needed */
    margin-left: 8px; /* Add spacing between text and icon */
    padding: 4px; /* Add padding to icon for better appearance */
    background-color: #000000; /* Set background color to black */
    color: #FFFFFF; /* Set icon color to white */
    border-radius: 50%; /* Make icon background round */
    transition: transform 0.3s ease;
}

.book_now_btn:hover i {
    transform: translateX(10px); /* Move icon on hover */
}
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
            <h2 class="page-cover-tittle">Booking</h2>
            <ol class="breadcrumb">
                <li><a href="{{ route('user.index') }}">Home</a></li>
                <li class="active">Booking</li>
            </ol>
        </div>
    </div>
</section>

<div class="container mt-5 mb-5">
    <div class="container">
        <h2>Booking Details</h2>

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

        <!-- Form Data Display -->
        <p><strong><b>Arrival Date:</b></strong> {{ date('d M Y', strtotime($arrivalDate)) }}</p>
        <p><strong><b>Departure Date:</b></strong> {{ date('d M Y', strtotime($departureDate)) }}</p>
        <p><strong><b>City:</b></strong> {{ $cityName }}</p>
        <p><strong><b>Hotel:</b></strong> {{ $hotelName }}</p>

        <h3>Rooms:</h3>
        @if(count($roomData) > 0)
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Room Category</th>
                        <th>Room Image</th>
                        <th>Book Now</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roomData as $index => $room)
                        <tr>
                            <td>{{ $index + 1 }}</td> <!-- Serial Number -->
                            <td>{{ $room['room_category_name'] }}</td>
                            <td>
                                <a href="{{ asset('images/' . $room['room_category_image']) }}" data-fancybox="gallery" data-caption="{{ $room['room_category_name'] }}">
                                    <img src="{{ asset('images/' . $room['room_category_image']) }}" alt="{{ $room['room_category_name'] }}" style="width: 100px;">
                                </a>
                            </td>
                            <td>   
                                {{-- @dd($room['room_category_id']) --}}
                                <a class="book_now_btn" href="{{ url('confirm/' . $room['room_category_id']) }}">
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                                
                                                          
                            </td>
                               
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No rooms available for the selected hotel and city.</p>
        @endif
    </div>
</div>

   
<script>
    document.getElementById('confirmBookingBtn').addEventListener('click', function () {
        // Data to be sent to the server
        var roomCategoryId = this.getAttribute('data-room-id');
        var arrivalDate = '{{ $arrivalDate }}';
        var departureDate = '{{ $departureDate }}';
        var cityName = '{{ $cityName }}';
        var hotelName = '{{ $hotelName }}';
        var roomCategoryName = '{{ $roomData[0]['room_category_name'] }}'; // Assuming roomData has room_category_name

        // AJAX request to store the session data
       fetch('{{ route('store.session') }}', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
    },
    body: JSON.stringify({
        arrivalDate: arrivalDate,
        departureDate: departureDate,
        cityName: cityName,
        hotelName: hotelName,
        room_category_id: roomCategoryId,
        room_category_name: roomCategoryName
    })
})
.then(response => {
    if (!response.ok) {
        return response.text().then(text => { throw new Error(text); });
    }
    return response.json();
})
.then(data => {
    if (data.success) {
        window.location.href = '{{ url('confirm') }}/' + roomCategoryId;
    } else {
        alert('Failed to store session data: ' + data.message);
    }
})
.catch(error => {
    console.error('Error:', error);
    alert('An error occurred: ' + error.message);
});

    });
</script>


@endsection
