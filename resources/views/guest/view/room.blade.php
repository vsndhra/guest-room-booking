@extends('guest.home')

@section('content')
@if(Session::has('Success'))
    <div class="alert alert-success" style="margin-top:15px;">{{ Session::get('Success') }}</div>
@endif
@if(Session::has('Error'))
    <div class="alert alert-danger"  style="margin-top:15px;">{{ Session::get('Error') }}</div>
@endif
<div class="card-header" style="margin:15px;">
		<div class="row">
			<div class="col col-md-6"><b>Available Room Details</b></div>
		</div>
	</div>
<div class="card-body" style="margin-top:15px;">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-Room" style="text-align: center;">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Room Name</th>
                        <th>Total Beds</th>
                        <th>Room Rent</th> 
                        <th>Minimum Stay</th>
                        <th>Maximum Stay</th>	
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($room as $rooms)
                    <tr>

                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $rooms['room_name'] }}</td>
                        <td>{{ $rooms['number_of_beds'] }}</td>
                        <td>{{ $rooms['room_rent'] }}</td>
                        <td>{{ $rooms['min_stay'] }}</td>
                        <td>{{ $rooms['max_stay'] }}</td>
                    	<td>
                    		<a class="btn btn-info btn-sm" href="{{ url('room-details', [ $rooms['id'] ]) }}">Show</a>

                    		<a class="btn btn-success btn-sm" href="{{ url('book', [ $rooms['id'] ]) }}">Book</a>
            			</td>

                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection('content')