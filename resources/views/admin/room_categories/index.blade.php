@extends('admin.layouts.app')

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Manage Room Categories</h3>
                            <a href="{{ route('room_categories.create') }}" class="btn btn-primary float-right">Add Room Category</a>
                        </div>
                       <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category</th>
                                        <th>Hotel Name</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($roomCategories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->category }}</td>
                                            <td>{{ $category->hotelName->name ?? 'N/A' }}</td>
                                            <td>
                                                @if($category->image)
                                                    <img src="{{ asset('images/' . $category->image) }}" alt="Category Image" width="100" height="100" style="border-radius: 10px;">
                                                @else
                                                    <span>No Image</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('room_categories.edit', $category->id) }}" class="btn btn-warning"> <i class="fas fa-edit"></i></a>
                                                <form action="{{ route('room_categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                                </form>
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
@endsection
