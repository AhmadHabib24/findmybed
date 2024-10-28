@extends('admin.layouts.app')

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Room</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('rooms.update', $room->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Room Category</label>
                                    <select class="form-control" name="room_category_id" required>
                                        @foreach($roomCategories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $room->room_category_id ? 'selected' : '' }}>
                                                {{ $category->category }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Hotel Name</label>
                                    <select class="form-control" name="hotel_id" required>
                                        @foreach($hotels as $hotel)
                                            <option value="{{ $hotel->id }}" {{ $hotel->id == $room->hotel_id ? 'selected' : '' }}>
                                                {{ $hotel->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>City Name</label>
                                    <select class="form-control" name="city_id" required>
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}" {{ $city->id == $room->city_id ? 'selected' : '' }}>
                                                {{ $city->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number" class="form-control" name="price" value="{{ $room->price }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" required>{{ $room->description }}</textarea>
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
