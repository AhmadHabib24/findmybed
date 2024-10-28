@extends('admin.layouts.app')

@section('body')

@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <div class="row">
                            <div class="col-10">
                                <h3 class="card-title">Manage Client Reviews</h3>
                            </div>
                            <div class="col-2 text-right">
                                <!-- Button to trigger modal -->
                                <button class="btn btn-light btn-sm" data-toggle="modal" data-target="#addImageModal">
                                    <i class="fas fa-plus"></i> Add New Review
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table id="galleryTable" class="table table-striped table-bordered table-hover">
                            <thead class="bg-secondary text-white">
                                <tr>
                                    <th>ID</th>
                                    <th>Client Name</th>
                                    <th>Review</th>
                                    <th>Rating</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientReviews as $review)
                                    <tr>
                                        <td>{{ $review->id }}</td>
                                        <td>{{ $review->client_name }}</td>
                                        <td>{{ $review->client_review }}</td>
                                        <td>{{ $review->rating }}</td>
                                        <td>
                                            <img src="{{ asset($review->image_path) }}" alt="{{ $review->client_name }}" width="50">
                                        </td>
                                        <td>
                                            <a href="{{ route('client-review.edit', $review->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                            <button class="btn btn-danger btn-sm" onclick="confirmDelete({{ $review->id }})"><i class="fas fa-trash-alt mt-2"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer">
                        <!-- Optional footer content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Add Review Modal -->
<div class="modal fade" id="addImageModal" tabindex="-1" role="dialog" aria-labelledby="addImageModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addImageModalLabel">Add New Review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addReviewForm" method="POST" action="{{ route('client-review.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="client_name">Client Name</label>
                        <input type="text" class="form-control" id="client_name" name="client_name" required>
                    </div>
                    <div class="form-group">
                        <label for="client_review">Review</label>
                        <textarea class="form-control" id="client_review" name="client_review" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="rating">Rating</label>
                        <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" form="addReviewForm" class="btn btn-primary">Save Review</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#galleryTable').DataTable();
    });

    function confirmDelete(id) {
        // Show a confirmation dialog
        if (confirm("Are you sure you want to delete this review?")) {
            // Redirect to the delete route
            window.location.href = "{{ url('client-review/delete') }}/" + id;
        }
    }
</script>

@endsection
