<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('user/image/favicon.png') }}" type="image/png">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
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

    @yield('body')
    {{-- Start Footer   --}}
    <footer class="footer-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6 class="footer_title">About Agency</h6>
                        <p>The world has become so fast paced that people don’t want to stand by reading a page of
                            information, they would much rather look at a presentation and understand the message. It
                            has come to a point </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6 class="footer_title">Navigation Links</h6>
                        <div class="row">
                            <div class="col-4">
                                <ul class="list_style">
                                    <li class="nav-item active"><a class="nav-link" href="{{route('user.index')}}">Home</a></li>
                                    <li class=""><a class="nav-link" href="{{route('aboutus')}}">About</a></li>
                                    <li class=""><a class="nav-link" href="{{route('accomodation')}}">Accomodation</a></li>
                                    <li class=""><a class="nav-link" href="{{route('gallery')}}">Gallery</a></li>
                                </ul>
                            </div>
                            <div class="col-4">
                                <ul class="list_style">
                                    <li><a href="{{route('contact-us')}}">Contact</a></li>
                                    <li><a href="{{route('login')}}">Login</a></li>
                                    <li><a href="{{route('register')}}">Register</a></li>
                                    {{-- <li><a href="#">Contact</a></li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6 class="footer_title">Newsletter</h6>
                        <p>For business professionals caught between high OEM price and mediocre print and graphic
                            output, </p>
                        <div id="mc_embed_signup">
                            <form target="_blank"
                                action="&amp"
                                method="get" class="subscribe_form relative">
                                <div class="input-group d-flex flex-row">
                                    <input name="EMAIL" placeholder="Email Address" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Email Address '" required="" type="email">
                                    <button class="btn sub-btn"><span class="lnr lnr-location"></span></button>
                                </div>
                                <div class="mt-10 info"></div>
                            </form>
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
            <div class="border_line"></div>
            <div class="row footer-bottom d-flex justify-content-between align-items-center">
                <p class="col-lg-8 col-sm-12 footer-text m-0">
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
    {{--  Scripts End  --}}
</body>

</html>
