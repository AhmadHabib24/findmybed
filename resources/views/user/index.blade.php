@extends('user.layouts.app')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@section('title','Home')
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
        .ui-datepicker { 
            width: 12em; 
        } 
        h1{ 
            color:green; 
        } 
</style>

@section('body')
 <!-- Display Validation Errors -->
 <!-- Success Message Alert -->
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


<section class="banner_area">
    <div class="booking_table d_flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h6>Away from monotonous life</h6>
                <h2>Relax Your Mind</h2>
                <!--<p>If you are looking at blank cassettes on the web, you may be very confused at the<br> difference in price. You may see some for as low as $.17 each.</p>-->
                <a href="#" class="btn theme_btn button_hover">Get Started</a>
            </div>
        </div>
    </div>

    <!-- Modal -->
    
       
  
    
<form action="{{ route('booking') }}" method="POST">
    @csrf
    <div class="hotel_booking_area position">
        <div class="container">
            <div class="hotel_booking_table">
                <div class="col-md-3">
                    <h2>Book<br> Your Room</h2>
                </div>
                <div class="col-md-9">
                    <div class="boking_table">
                        <div class="row">
                            <div class="row col-md-9">
                                <div class="book_tabel_item">
                                    <div class="form-group">
                                        <!-- Arrival Date -->
                                        <div class='input-group date'style="color:white;">
                                            <input type='text' name="arrival_date" id="arrival_date" class="form-control" placeholder="Arrival Date" required style="color:white;"/>
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <!-- Departure Date -->
                                        <div class='input-group date'>
                                            <input type='text' name="departure_date" id="departure_date" class="form-control" placeholder="Departure Date" required />
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </div>
                                     <div class="book_tabel_item">
                                    <!-- City Dropdown -->
                                    <div class="input-group">
                                        <select name="city_id" id="cityDropdown" class="wide" required>
                                            <option value="">Please Select City</option>
                                            @foreach($cityOptions as $id => $name)
                                                <option value="{{ $id }}">{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                               
                            </div>
                        </div>
                        <!-- Submit Button -->
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-4 text-center">
                                <button type="submit" class="book_now_btn button_hover">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


    
    
    
    



    <!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
    <script>
$(document).ready(function() {
        // Initialize datepicker for Arrival Date
        $("#arrival_date").datepicker({
            minDate: 0, // Disable past dates
            dateFormat: 'yy-mm-dd', // Set the date format
            onSelect: function(selectedDate) {
                // Set the minDate of departure based on arrival date
                $("#departure_date").datepicker("option", "minDate", selectedDate);
            }
        });

        // Initialize datepicker for Departure Date
        $("#departure_date").datepicker({
            minDate: 0, // Disable past dates
            dateFormat: 'yy-mm-dd' // Set the date format
        });
    });



    </script>
    
   
    
</section>

        <!--================ Accomodation Area  =================-->
        <section class="accomodation_area section_gap">
            <div class="container">
                <div class="section_title text-center">
                    <h2 class="title_color">Hotel Accomodation</h2>
                    <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast, </p>
                </div>
                <div class="row mb_30">
                    
                    @foreach($roomcategory as $category)
                        @foreach($category->rooms as $room)
                        <div class="col-lg-3 col-sm-6">
                            <div class="accomodation_item text-center">
                                <div class="hotel_img">
                                    @if($category->image)
                                        <img src="{{ asset('images/' . $category->image) }}" alt="Category Image" width="400" height="300" >
                                        @else
                                        <img src="{{asset('user/image/room4.jpg')}}" alt="">
                                        @endif
                                   
                                    <!--<a href="#" class="btn theme_btn button_hover">Book Now</a>-->
                                </div>
                                <a href="#"><h4 class="sec_h4">{{ $room->name }}</h4></a>
                                <h5>PKR {{ number_format($room->price, 2) }}<small>/night</small></h5>

                            </div>
                        </div>
                        @endforeach
                    @endforeach
                </div>
                
                
            </div>
        </section>
        <!--================ Accomodation Area  =================-->

        <!--================ Facilities Area  =================-->
        <section class="facilities_area section_gap">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
            </div>
            <div class="container">
                <div class="section_title text-center">
                    <h2 class="title_w">Royal Facilities</h2>
                    <p>Who are in extremely love with eco friendly system.</p>
                </div>
                <div class="row mb_30">
                    <div class="col-lg-4 col-md-6">
                        <div class="facilities_item">
                            <h4 class="sec_h4"><i class="lnr lnr-dinner"></i>Restaurant</h4>
                            <p>Usage of the Internet is becoming more common due to rapid advancement of technology and power.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="facilities_item">
                            <h4 class="sec_h4"><i class="lnr lnr-bicycle"></i>Sports CLub</h4>
                            <p>Usage of the Internet is becoming more common due to rapid advancement of technology and power.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="facilities_item">
                            <h4 class="sec_h4"><i class="lnr lnr-shirt"></i>Swimming Pool</h4>
                            <p>Usage of the Internet is becoming more common due to rapid advancement of technology and power.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="facilities_item">
                            <h4 class="sec_h4"><i class="lnr lnr-car"></i>Rent a Car</h4>
                            <p>Usage of the Internet is becoming more common due to rapid advancement of technology and power.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="facilities_item">
                            <h4 class="sec_h4"><i class="lnr lnr-construction"></i>Gymnesium</h4>
                            <p>Usage of the Internet is becoming more common due to rapid advancement of technology and power.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="facilities_item">
                            <h4 class="sec_h4"><i class="lnr lnr-coffee-cup"></i>Bar</h4>
                            <p>Usage of the Internet is becoming more common due to rapid advancement of technology and power.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================ Facilities Area  =================-->

        <!--================ About History Area  =================-->
               <section class="about_history_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d_flex align-items-center">
                <div class="about_content">
                    <h2 class="title title_color">About Us <br>Our History<br>Mission & Vision</h2>
                    @foreach($aboutInfo as $info)
                        <h3>{{ $info->name }}</h3> <!-- Display the heading -->
                        <p>{{ $info->description }}</p> <!-- Display the description -->
                </div>
            </div>
            <div class="col-md-6">
               
                        <img src="{{ asset('' . $info->image) }}" alt="{{ $info->name }}" class="img-fluid mb-3"> <!-- Display the image -->
            </div>
                    @endforeach
        </div>
    </div>
</section>
        <!--================ About History Area  =================-->

        <!--================ Testimonial Area  =================-->
                <section class="testimonial_area section_gap">
                    <div class="container">
                        <div class="section_title text-center">
                            <h2 class="title_color">Testimonial from our Clients</h2>
                            <p>The French Revolution constituted for the conscience of the dominant aristocratic class a fall from </p>
                        </div>
                        <div class="testimonial_slider owl-carousel">
                            @foreach ($clientreview as $review)
                            <div class="media testimonial_item">
                                <img class="rounded-circle" src="{{ asset($review->image_path) }}" alt="{{ $review->client_name }}" style="width: 80px; height: 80px;">
                                <div class="media-body">
                                    <p>{{ $review->client_review }}</p>
                                    <a href="#"><h4 class="sec_h4">{{ $review->client_name }}</h4></a>
                                    <div class="star">
                                        @for ($i = 0; $i < $review->rating; $i++)
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        @endfor
                                        @if ($review->rating < 5)
                                            @for ($i = $review->rating; $i < 5; $i++)
                                                <a href="#"><i class="fa fa-star-o"></i></a>
                                            @endfor
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>


        <!--================ Testimonial Area  =================-->

@endsection
