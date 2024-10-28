@extends('admin.layouts.app')

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Hotel</h3>
                        </div>
                        <div class="card-body">
                            <!-- Add enctype for file upload -->
                            <form action="{{ route('hotel_names.update', $hotelName->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $hotelName->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label>City</label>
                                    <select class="form-control" name="city_id">
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}" {{ $city->id == $hotelName->city_id ? 'selected' : '' }}>{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="hotel_cat_id">
                                        @foreach($hotelCategories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $hotelName->hotel_cat_id ? 'selected' : '' }}>{{ $category->category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Hotel Image</label>
                                    <!-- Display existing image -->
                                    @if($hotelName->hotel_image)
                                        <img src="{{ asset('storage/hotel_images/' . $hotelName->hotel_image) }}" alt="Hotel Image" width="100" height="100">
                                    @endif
                                    <input type="file" class="form-control" name="hotel_image">
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
