@extends('owner.home')
@section('content')
@if(Session::has('Success'))
    <div class="alert alert-success" style="margin-top:15px;">{{ Session::get('Success') }}</div>
@endif
@if(Session::has('Error'))
    <div class="alert alert-danger"  style="margin-top:15px;">{{ Session::get('Error') }}</div>
@endif
<div class="card-header" style="margin:15px;">
		<div class="row">
			<div class="col col-md-6"><b>Room Details</b></div>
		</div>
	</div>
<div class="card-body" style="margin-top:15px; display: flex; justify-content: center; align-items: center;">

    <img src="{{ asset('images/'.$imagePath) }}" alt="Room Image" style="margin-top:15px;"/>
    <!-- <img src="{{ asset('images/$imagePath') }}" alt="Room Image" style="margin-top:15px;"> -->
    
</div>
@endsection('content')