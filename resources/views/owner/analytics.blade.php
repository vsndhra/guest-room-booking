@extends('owner.home')
@section('content')
@if(Session::has('Success'))
    <div class="alert alert-success" style="margin-top:15px;">{{ Session::get('Success') }}</div>
@endif
@if(Session::has('Error'))
    <div class="alert alert-danger"  style="margin-top:15px;">{{ Session::get('Error') }}</div>
@endif
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-book fa-3x mr-3"></i> <!-- Replace with relevant icon class -->
                            <div>
                                <h4 class="card-title"><strong>Total Bookings</strong></h4>
                                <p class="card-text" style="font-size: 40px;" >{{ $totalBookings }}</p> <!-- Replace with actual total bookings count -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-bookmark fa-3x mr-3"></i> <!-- Replace with relevant icon class -->
                            <div>
                                <h4 class="card-title"><strong>Active Bookings</strong></h4>
                                <p class="card-text" style="font-size: 40px;" >5</p> <!-- Replace with actual active bookings count -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-building fa-3x mr-3"></i> <!-- Replace with relevant icon class -->
                            <div>
                                <h4 class="card-title"><strong>Properties</strong></h4>
                                <p class="card-text" style="font-size: 40px;" >{{ $totalProperties }}</p> <!-- Replace with actual property count -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-bed fa-3x mr-3"></i> <!-- Replace with relevant icon class -->
                            <div>
                                <h4 class="card-title"><strong>Rooms</strong></h4>
                                <p class="card-text" style="font-size: 40px;" >{{ $totalRooms }}</p> <!-- Replace with actual room count -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection('content')