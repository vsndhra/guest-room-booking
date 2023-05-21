@extends('owner.home')
@section('content')
<div class="card" style="margin-top:15px;">
    <div class="card-header" style="text-align: center" >
        <h4>Update Room Details</h4>
    </div>
    <div class="card-body" style="padding-left: 25%; width: 70%;">
        <form method="POST" action="{{ url('update-room', [$room['id']]) }} " enctype="multipart/form-data">
            @if(Session::has('Success'))
                <div class="alert alert-success">{{ Session::get('Success') }}</div>

            @endif
            @if(Session::has('Error'))
                <div class="alert alert-danger">{{ Session::get('Error') }}</div>

            @endif
            @method('PUT')
            @csrf
            <div class="form-group">
                    <strong>Room Name</strong>
                    <input class="form-control" type="text" name="room_name" value="{{ old('room_name', $room->room_name) }}">
                    <span class="text text-danger">@error('room_name') {{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <strong>Total Beds</strong>
                    <input class="form-control" type="text" name="number_of_beds" value="{{ old('number_of_beds', $room->number_of_beds) }}">
                    <span class="text text-danger">@error('number_of_beds') {{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <strong>Room Rent (Rupees/Day) </strong>
                    <input class="form-control" type="text" name="room_rent" value="{{ old('room_rent', $room->room_rent) }}">
                    <span class="text text-danger">@error('room_rent') {{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <strong>Minimum Stay (Day/Days)</strong>
                    <input class="form-control" type="text" name="min_stay" value="{{ old('min_stay', $room->min_stay) }}">
                    <span class="text text-danger">@error('min_stay') {{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <strong>Maximum Stay (Days)</strong>
                    <input class="form-control" type="text" name="max_stay" value="{{ old('max_stay', $room->max_stay) }}">
                    <span class="text text-danger">@error('max_stay') {{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <strong>Room Image</strong>
                    <input class="form-control" type="file" name="room_image" value="{{ old('room_image', $room->image_path) }}">
                    <span class="text text-danger">@error('room_image') {{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit" style="margin-top:15px;">Save</button>
                </div>
        </form>
    </div>
</div>
@endsection