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
			<div class="col col-md-6"><b>Booking History</b></div>
		</div>
	</div>
<div class="card-body" style="margin-top:15px;">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-Room" style="text-align: center;">
                <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>Guest Name</th>
                        <th>Property Name</th>
                        <th>Room Type</th>
                        <th>Amount Paid</th> 
                        <th>Start Date</th>
                        <th>End Date</th>
                        <!-- <th>Status</th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($booking as $bookings)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $bookings['guest_name'] }}</td>
                        <td>{{ $bookings['property_name'] }}</td>
                        <td>{{ $bookings['room_type'] }}</td>
                        <td>{{ $bookings['amount_paid'] }}</td>
                        <td>{{ $bookings['start_date'] }}</td>
                        <td>{{ $bookings['end_date'] }}</td>
                        <!-- <td><i class="fa-solid fa-circle" style="color: #42bd48;">Active</i></td> -->

                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection('content')