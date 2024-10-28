@extends('admin.layouts.app')

@section('body')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title">Edit Gallery Image</h3>
                    </div>

                    <div class="card-body">
                        <form id="editGalleryForm" method="POST" enctype="multipart/form-data" action="{{ route('gallery.update', $gallery->id) }}">
                            @csrf
                            @method('PUT') <!-- Specify that this is a PUT request -->

                            <div class="form-group">
                                <label for="name">Image Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $gallery->name }}" required>
                                <input type="hidden" name="name" id="name" class="form-control" value="{{ $gallery->id }}" required>
                            </div>

                            <div class="form-group">
                                <label for="alt_text">Alt Text</label>
                                <input type="text" name="alt_text" id="alt_text" class="form-control" value="{{ $gallery->alt_text }}" required>
                            </div>

                            <div class="form-group">
                                <label for="image">Upload New Image (optional)</label>
                                <input type="file" name="image" id="image" class="form-control-file" accept="image/*">
                                <small class="form-text text-muted">Leave blank if you don't want to change the image.</small>
                            </div>

                            <div class="modal-footer">
                                <a href="{{ route('gallery.index') }}" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update Image</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
