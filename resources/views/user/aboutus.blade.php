
@extends('user.layouts.app')
@section('title','About Us')
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
                    <h2 class="page-cover-tittle">About Us</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{route('user.index')}}">Home</a></li>
                        <li class="active">About</li>
                    </ol>
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->
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

</section>

@endsection
