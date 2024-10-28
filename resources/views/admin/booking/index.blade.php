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
                                <h3 class="card-title">Manage Client Booking</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                   
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                   
                                    <th>Arrival Date</th>
                                    <th>Departure Date</th>
                                   
                                    <th>City</th>
                                    <th>Hotel</th>
                                    <th>Room Category</th>
                                    <th>Price</th>
                                    <th>Payment Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($bookingdata as $data)
                                    <tr>
                                        <td>{{ $data->id }}</td>
                                       
                                        <td>{{ $data->full_name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->phone_number }}</td>
                                       
                                        <td>{{ $data->arrival_date }}</td>
                                        <td>{{ $data->departure_date }}</td>
                                        
                                        <td>{{ $data->city }}</td>
                                        <td>{{ $data->hotel_names }}</td>
                                        <td>{{ $data->room_category ?? N/A}}</td>
                                        <td>{{ $data->price }}</td>
                                        <td>{{ $data->payment_status }}</td>
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