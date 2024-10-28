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
                                    <h3 class="card-title">Manage Cities</h3>
                                </div>
                                <div class="col-2">
                                    <a href="{{ route('cities.create') }}" class="btn btn-primary">Add City</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cities as $city)
                                        <tr>
                                            <td>{{ $city->name }}</td>
                                            <td>
                                                <a href="{{ route('cities.edit', $city->id) }}">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <a class="ml-2" href="{{ route('cities.destroy', $city->id) }}"
                                                   onclick="event.preventDefault(); document.getElementById('delete-form-{{ $city->id }}').submit();">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <form id="delete-form-{{ $city->id }}" action="{{ route('cities.destroy', $city->id) }}" method="POST" style="display: none;">
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
