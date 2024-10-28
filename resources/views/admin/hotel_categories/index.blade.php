@extends('admin.layouts.app')

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-10">
                                    <h3 class="card-title">Manage Hotel Categories</h3>
                                </div>
                                <div class="col-2">
                                    <a href="{{ route('hotel_categories.create') }}" class="btn btn-primary">Add Category</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hotelCategories as $category)
                                        <tr>
                                            <td>{{ $category->category }}</td>
                                            <td>
                                                <a href="{{ route('hotel_categories.edit', $category->id) }}">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <a class="ml-2" href="{{ route('hotel_categories.destroy', $category->id) }}"
                                                   onclick="event.preventDefault(); document.getElementById('delete-form-{{ $category->id }}').submit();">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <form id="delete-form-{{ $category->id }}" action="{{ route('hotel_categories.destroy', $category->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
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
