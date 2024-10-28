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
                                    <h3 class="card-title">Manage Hotels</h3>
                                </div>
                                <div class="col-2">
                                    <a href="{{ route('hotel_names.create') }}" class="btn btn-primary">Add Hotel</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>City</th>
                                        <th>Category</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hotelNames as $hotel)
                                        <tr>
                                            <td>{{ $hotel->name }}</td>
                                            <td>{{ $hotel->city->name }}</td>
                                            <td>{{ $hotel->hotelCategory->category }}</td>
                                            <td>
                                                @if ($hotel->hotel_image)
                                                    <img src="{{ asset('' . $hotel->hotel_image) }}" alt="Hotel Image" width="100" height="100">
                                                @else
                                                    No Image
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('hotel_names.edit', $hotel->id) }}">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <a class="ml-2" href="{{ route('hotel_names.destroy', $hotel->id) }}"
                                                   onclick="event.preventDefault(); document.getElementById('delete-form-{{ $hotel->id }}').submit();">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <form id="delete-form-{{ $hotel->id }}" action="{{ route('hotel_names.destroy', $hotel->id) }}" method="POST" style="display: none;">
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
