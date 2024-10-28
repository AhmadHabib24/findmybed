@extends('admin.layouts.app')

@section('body')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title">Edit Client Review</h3>
                    </div>

                    <div class="card-body">
                        <form id="editreviewForm" method="POST" enctype="multipart/form-data" action="{{ route('client-review.update', $review->id) }}">
                            @csrf
                            @method('PUT') <!-- Specify that this is a PUT request -->

                            <div class="form-group">
                                <label for="client_name">Client Name</label>
                                <input type="text" class="form-control" id="client_name" name="client_name" value="{{ $review->client_name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="client_review">Review</label>
                                <textarea class="form-control" id="client_review" name="client_review" rows="3" value="{{ $review->client_review }}" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="rating">Rating</label>
                                <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" value="{{ $review->rating }}" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" name="image"> <!-- Removed the value attribute -->
                            </div>

                            <!-- Display existing image -->
                            @if ($review->image_path)
                                <div class="form-group">
                                    <label>Current Image</label><br>
                                    <img src="{{ asset($review->image_path) }}" alt="Current Review Image" width="100">
                                </div>
                            @endif

                            <div class="modal-footer">
                                <a href="{{ route('client-review.index') }}" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update Review</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
