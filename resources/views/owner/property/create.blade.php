@extends('owner.home')
@section('content')

<div class="card" style="margin-top:15px;">
    <div class="card-header" style="text-align: center">
        <h4>Create New Property</h4>
    </div>
    
    <div class="card-body" style="padding-left: 25%; width: 70%;">
        <form method="POST" action="{{ url('create-property') }}">
            @if(Session::has('Success'))
                <div class="alert alert-success">{{ Session::get('Success') }}</div>

            @endif
            @if(Session::has('Error'))
                <div class="alert alert-danger">{{ Session::get('Error') }}</div>

            @endif
            @csrf
            <div class="form-group">
                <strong>Proper Name</strong>
                <input class="form-control" type="text" name="property_name" value="{{ old('property_name') }}">
                <span class="text text-danger">@error('property_name') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <strong>Property Address</strong>
                <input class="form-control" type="text" name="property_address" value="{{ old('property_address') }}">
                <span class="text text-danger">@error('property_address') {{ $message }} @enderror</span>
            </div>
            <div class="form-group" style="margin-top:10px;" >
                <button class="btn btn-success" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection