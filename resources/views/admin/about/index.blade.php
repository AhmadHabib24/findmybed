@extends('admin.layouts.app')

@section('body')

<!-- Success message -->
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                                <h3 class="card-title">Manage About Information</h3>
                            </div>
                            <div class="col-2 text-right">
                                <button class="btn btn-light btn-sm" data-toggle="modal" data-target="#addImageModal">
                                    <i class="fas fa-plus"></i> Add About Info
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table id="galleryTable" class="table table-striped table-bordered table-hover">
                            <thead class="bg-secondary text-white">
                                <tr>
                                    <th>ID</th>
                                    <th>Heading</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($aboutInfo as $about)
                                <tr>
                                    <td>{{ $about->id }}</td>
                                    <td>{{ $about->heading }}</td>
                                    <td>{{ $about->description }}</td>
                                    <td>
                                        <img src="{{ asset($about->image) }}" alt="{{ $about->heading }}" width="100">
                                    </td>
                                    <td>
                                        <button href="{{ route('about.edit', $about->id) }}" class="btn btn-warning" data-toggle="tooltip" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        <button class="btn btn-danger mt-2" onclick="confirmDelete({{ $about->id }})"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Add About Info Modal -->
<div class="modal fade" id="addImageModal" tabindex="-1" role="dialog" aria-labelledby="addImageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="addImageModalLabel">Add About Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Heading</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="alt_text">Description</label>
                        <input type="text" name="alt_text" id="alt_text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Upload Image</label>
                        <input type="file" name="image" id="image" class="form-control-file" accept="image/*" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Info</button>
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
        if (confirm("Are you sure you want to delete this image?")) {
            window.location.href = "{{ url('about/delete') }}/" + id;
        }
    }
</script>

@endsection
