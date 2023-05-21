@extends('guest.home')
@section('content')

<div class="card" style="margin-top:15px;">
    <div class="card-header" style="text-align: center">
        <h4>Room Booking</h4>
    </div>
    
    <div class="card-body" style="padding-left: 25%; width: 70%;">
        <form method="POST" action="{{ url('book-room', [ $details['id'] ]) }}">
            @if(Session::has('Success'))
                <div class="alert alert-success">{{ Session::get('Success') }}</div>

            @endif
            @if(Session::has('Error'))
                <div class="alert alert-danger">{{ Session::get('Error') }}</div>

            @endif
            @csrf
                <div class="form-group">
                    <strong>Guest Name</strong>
                    <input class="form-control" type="text" name="guest_name" value="{{ old('guest_name') }}">
                    <span class="text text-danger">@error('guest_name') {{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <strong>Property Name</strong>
                    <input class="form-control" type="text" name="property_name" value="{{ old('property_name') }}">
                </div>
                <div class="form-group">
                    <strong>Room Type</strong>
                    <input class="form-control" type="text" name="room_type" value="{{ old('room_type', $details['room_name']) }}" readonly>
                </div>
                <div class="form-group">
                    <strong>Room Rent (Rupees/Day)</strong>
                    <input class="form-control" type="text" name="room_rent" value="{{ old('start_date', $details['room_rent']) }}" readonly>
                </div>
                <div class="form-group">
                    <strong>Start Date</strong>
                    <input class="form-control" type="date" name="start_date" value="{{ old('start_date') }}">
                    <span class="text text-danger">@error('start_date') {{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <strong>End Date</strong>
                    <input class="form-control" type="date" name="end_date" value="{{ old('end_date') }}">
                    <span class="text text-danger">@error('end_date') {{ $message }} @enderror</span>
                </div>
                <div class="form-group" style="margin-top:10px;" >
                    <button class="btn btn-success" type="submit">Confirm Booking</button>
                </div>
        </form>
    </div>
</div>
@endsection