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
			<div class="col col-md-6">
				<a href="{{ route('room.create') }}" class="btn btn-success btn-sm float-end">Add Room</a>
			</div>
		</div>
	</div>
<div class="card-body" style="margin-top:15px;">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-Room" style="text-align: center;">
                <thead>
                    <tr>
                        <th>Room Name</th>
                        <th>Total Beds</th>
                        <th>Room Rent</th> 
                        <th>Minimum Stay</th>
                        <th>Maximum Stay</th>	
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($room as $rooms)
                    <tr>
                       
                        <td>{{ $rooms['room_name'] }}</td>
                        <td>{{ $rooms['number_of_beds'] }}</td>
                        <td>{{ $rooms['room_rent'] }}</td>
                        <td>{{ $rooms['min_stay'] }}</td>
                        <td>{{ $rooms['max_stay'] }}</td>
                    	<td>
                			<form action="{{ url('delete-room', [ $rooms['id'] ] ) }}" method="POST">
                    
                    			<a class="btn btn-info btn-sm" href="{{ route('room.view', [$rooms['id']] ) }}">Show</a>
    
                    			<a class="btn btn-primary btn-sm" href="{{ route('room.edit', [ $rooms['id'] ] ) }}">Edit</a>
                                
                                @method('DELETE')
								@csrf
      
                    			<button type="submit" class="btn btn-danger btn-sm">Delete</button>
                			</form>
            			</td>

                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection('content')