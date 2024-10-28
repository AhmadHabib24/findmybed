@extends('user.layouts.app')
@section('title', 'Gallery')

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
        width: 21%; /* Space between alerts */
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
            <h2 class="page-cover-tittle">Gallery</h2>
            <ol class="breadcrumb">
                <li><a href="{{ route('user.index') }}">Home</a></li>
                <li class="active">Gallery</li>
            </ol>
        </div>
    </div>
</section>
<!--================Breadcrumb Area =================-->

<!--================ Accomodation Area  =================-->
<section class="gallery_area section_gap">
    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_color">Find My Bed Gallery</h2>
            <p>Who are in extremely love with eco-friendly systems.</p>
        </div>
        <div class="row imageGallery1" id="gallery" >
            @foreach ($galleries as $gallery)
                <div class="col-md-4 gallery_item">
                    <div class="gallery_img" >
                        <img src="{{ asset($gallery->image_path) }}" alt="{{ $gallery->alt_text }}">
                        <div class="hover">
                            <a class="light" href="{{ asset($gallery->image_path) }}"><i class="fa fa-expand"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
