<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('user/image/Logo1.svg') }}" >
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- jQuery UI -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">



    <!-- jQuery (required for Fancybox) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Fancybox JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="{{ asset('user/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('user/vendors/linericon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/vendors/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/vendors/nice-select/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('user/vendors/owl-carousel/owl.carousel.min.css') }}">
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('user/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('auth/style.css') }}">

    <link rel="stylesheet" href="{{ asset('user/css/responsive.css') }}">
</head>

<body>
    {{--  Header Start  --}}
    <header class="header_area">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{route('user.index')}}"><img src="{{asset('user/image/Logo.png')}}" alt="" style="width: 100%"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item active"><a class="nav-link" href="{{route('user.index')}}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('aboutus')}}">About us</a></li>
                        {{-- <li class="nav-item"><a class="nav-link" href="{{route('accomodation')}}">Accomodation</a></li> --}}
                        <li class="nav-item"><a class="nav-link" href="{{route('gallery')}}">Gallery</a></li>
                        {{-- <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">Blog</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
                                <li class="nav-item"><a class="nav-link" href="blog-single.html">Blog Details</a></li>
                            </ul>
                        </li> --}}
                        {{-- <li class="nav-item"><a class="nav-link" href="elements.html">Elemests</a></li> --}}
                        <li class="nav-item"><a class="nav-link" href="{{route('contact-us')}}">Contact</a></li>
                        <!--@if (Auth::check())-->
                            <!-- If the user is authenticated, show the Logout link -->
                        <!--    <li class="nav-item">-->
                        <!--        <a class="nav-link" href="{{ route('logout') }}"-->
                        <!--        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">-->
                        <!--        Logout-->
                        <!--        </a>-->
                        <!--        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">-->
                        <!--            @csrf-->
                        <!--        </form>-->
                        <!--    </li>-->
                        <!--@else-->
                            <!-- If the user is not authenticated, show the Login and Register links -->
                        <!--    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>-->
                        <!--    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>-->
                        <!--@endif-->
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    {{--  Header End  --}}
    @yield('body')
    {{-- Start Footer   --}}
    <footer class="footer-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6 class="footer_title">About Find My Bed</h6>
                        <p style="color:white;">Find My Bed simplifies travel. As the bridge between customers and hotels, we offer easy booking, car rentals, and more—all in one place. Travel smarter, not harder. </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6 class="footer_title">Navigation Links</h6>
                        <div class="row">
                            <div class="col-4">
                                <ul class="list_style">
                                    <li><a href="{{route('user.index')}}" style="color:white;">Home</a></li>
                                    <li><a href="{{route('aboutus')}}" style="color:white;">About Us</a></li>
                                    
                                </ul>
                            </div>
                            <div class="col-4">
                                <ul class="list_style">
                                    <li><a href="{{route('gallery')}}" style="color:white;">Gallery</a></li>
                                    <li><a href="{{route('contact-us')}}" style="color:white;">Contact</a></li>
                            
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget instafeed">
                        <h6 class="footer_title">InstaFeed</h6>
                        <ul class="list_style instafeed d-flex flex-wrap">
                            <li><img src="{{asset('user/image/instagram/Image-01.jpg')}}" alt=""></li>
                            <li><img src="{{asset('user/image/instagram/Image-02.jpg')}}" alt=""></li>
                            <li><img src="{{asset('user/image/instagram/Image-03.jpg')}}" alt=""></li>
                            <li><img src="{{asset('user/image/instagram/Image-04.jpg')}}" alt=""></li>
                            <li><img src="{{asset('user/image/instagram/Image-05.jpg')}}" alt=""></li>
                            <li><img src="{{asset('user/image/instagram/Image-06.jpg')}}" alt=""></li>
                            <li><img src="{{asset('user/image/instagram/Image-07.jpg')}}" alt=""></li>
                            <li><img src="{{asset('user/image/instagram/Image-08.jpg')}}" alt=""></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="border_line" style="color:white;"></div>
            <div class="row footer-bottom d-flex justify-content-between align-items-center">
                <p class="col-lg-8 col-sm-12 footer-text m-0" style="color:white;">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | Find My Bed <i class="fa fa-heart-o"
                        aria-hidden="true"></i>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
                <div class="col-lg-4 col-sm-12 footer-social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                    <a href="#"><i class="fa fa-behance"></i></a>
                </div>
            </div>
        </div>
    </footer>
    {{--  End Footer  --}}

    {{--  Scripts Start  --}}
    <script src="{{ asset('user/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('user/js/popper.js') }}"></script>
    <script src="{{ asset('user/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('user/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('user/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('user/js/mail-script.js') }}"></script>
    <script src="{{ asset('user/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('user/vendors/nice-select/js/jquery.nice-select.js') }}"></script>
    <script src="{{ asset('user/js/mail-script.js') }}"></script>
    <script src="{{ asset('user/js/stellar.js') }}"></script>
    <script src="{{ asset('user/vendors/lightbox/simpleLightbox.min.js') }}"></script>
    <script src="{{ asset('user/js/custom.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    {{--  Scripts End  --}}
</body>

</html>
