@extends('admin.layouts.app')

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Room Category</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('room_categories.update', $roomCategory->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Category</label>
                                    <input type="text" class="form-control" name="category" value="{{ $roomCategory->category }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Current Image</label><br>
                                    <img src="{{ asset('images/' . $roomCategory->image) }}" alt="Room Category Image" width="150">
                                </div>
                                <div class="form-group">
                                    <label>Change Image (optional)</label>
                                    <input type="file" class="form-control" name="image" accept="image/*">
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
