@extends('user.layouts.master')
@section('title','Register')
@section('body')
    <div class="wrapper">
        {{--  <div class="logo">
            <img src="https://www.freepnglogos.com/uploads/twitter-logo-png/twitter-bird-symbols-png-logo-0.png" alt="">
        </div>  --}}
        <div class="text-center mt-4 name">
            Find My Bed
        </div>
        <form method="POST" action="{{ route('register') }}" class="p-3 mt-3">
            @csrf
            <div class="form-field d-flex align-items-center">
                <span class="far fa-envelope"></span>
                <input type="text" name="email" id="name" placeholder="Email">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="name" id="name" placeholder="Name">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Password">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password_confirmation" id="pwd" placeholder="Confirm Password">
            </div>
            <button type="submit" class="btn mt-3">Login</button>
        </form>
        <div class="text-center fs-6">
            Already have an account? <a href="{{ route('login') }}"><b>Sign In</b></a>
        </div>
    </div>
@endsection
