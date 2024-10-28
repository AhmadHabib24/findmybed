@extends('admin.layouts.app')

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Manage Rooms</h3>
                            <a href="{{ route('rooms.create') }}" class="btn btn-primary float-right">Add Room</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Room Category</th>
                                        <th>Hotel Name</th>
                                        <th>City Name</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rooms as $room)
                                        <tr>
                                            <td>{{ $room->id }}</td>
                                            <td>{{ $room->roomCategory->category }}</td>
                                            <td>{{ $room->hotel->name }}</td>
                                            <td>{{ $room->city->name }}</td>
                                            <td>{{ $room->price }}</td>
                                            <td>{{ $room->description }}</td>
                                            <td>
                                                <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-warning"> <i class="fas fa-edit"></i></a>
                                                <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger mt-2"><i class="fas fa-trash-alt"></i></button>
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
