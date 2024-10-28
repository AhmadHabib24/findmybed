@extends('admin.layouts.app')

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add Room Category</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('room_categories.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input type="text" class="form-control" name="category" required>
                                </div>
                                <div class="form-group">
                                    <label for="hotelName">Hotel Name</label>
                                    <select class="form-control" name="hotel_name" id="hotel_name" required>
                                        <option value="">Select a hotel</option>
                                        @foreach($hotels as $h)  <!-- Use $hotels instead of $hotel -->
                                            <option value="{{ $h->id }}">{{ $h->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control" name="image" accept="image/*" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
