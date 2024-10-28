@extends('user.layouts.master')
@section('title','Login')
@section('body')
<div class="" style="margin-top: 50px">

</div>
    <div class="wrapper">
        {{--  <div class="logo">
            <img src="https://www.freepnglogos.com/uploads/twitter-logo-png/twitter-bird-symbols-png-logo-0.png" alt="">
        </div>  --}}
        <div class="text-center mt-4 name">
            Find My Bed
        </div>
        <form method="POST" action="{{ route('login') }}" class="p-3 mt-3">
            @csrf
            <div class="form-field d-flex align-items-center">
                <span class="far fa-envelope"></span>
                <input type="text" name="email" id="email" placeholder="Email">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Password">
            </div>
            <button type="submit" class="btn mt-3">Login</button>
        </form>
        <div class="text-center fs-6">
            Not a member? <a href="{{ route('register') }}"><b>Sign Up</b></a>
        </div>
    </div>

@endsection

