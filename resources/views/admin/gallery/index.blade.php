@extends('admin.layouts.app')

@section('body')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <div class="row">
                            <div class="col-10">
                                <h3 class="card-title">Manage Gallery Images</h3>
                            </div>
                            <div class="col-2 text-right">
                                <!-- Button to trigger modal -->
                                <button class="btn btn-light btn-sm" data-toggle="modal" data-target="#addImageModal">
                                    <i class="fas fa-plus"></i> Add New Image
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table id="galleryTable" class="table table-striped table-bordered table-hover">
                            <thead class="bg-secondary text-white">
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Alt Text</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($galleries as $gallery)
                                    <tr>
                                        <td>{{ $gallery->id }}</td>
                                        <td>
                                            <img src="{{ asset('' . $gallery->image_path) }}" alt="{{ $gallery->alt_text }}" class="img-thumbnail" style="max-width: 100px;">
                                        </td>
                                        <td>{{ $gallery->name }}</td>
                                        <td>{{ $gallery->alt_text }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('gallery.edit', $gallery->id) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" title="Edit Image">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete Image" onclick="confirmDelete({{ $gallery->id }})">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Add New Image Modal -->
<div class="modal fade" id="addImageModal" tabindex="-1" role="dialog" aria-labelledby="addImageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="addImageModalLabel">Add New Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Form for adding a new image -->
            <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Image Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="alt_text">Alt Text</label>
                        <input type="text" name="alt_text" id="alt_text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Upload Image</label>
                        <input type="file" name="image" id="image" class="form-control-file" accept="image/*" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Image</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#galleryTable').DataTable();
    });

    function confirmDelete(id) {
        // Show a confirmation dialog
        if (confirm("Are you sure you want to delete this image?")) {
            // Redirect to the delete route
            window.location.href = "{{ url('gallery/delete') }}/" + id;
        }
    }
</script>

@endsection
