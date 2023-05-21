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
			<div class="col col-md-6"><b>Available Property Details</b></div>
		</div>
	</div>
<div class="card-body" style="margin-top:15px;">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-Room" style="text-align: center;">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Property Name</th>
                        <th>Property Address</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($property as $properties)
                    <tr>
                    
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $properties['property_name'] }}</td>
                        <td>{{ $properties['property_address'] }}</td>
                    	<td>
                    			<a class="btn btn-info btn-sm" href="{{ url('view-property', $properties['id'] ) }}">Show</a>
            			</td>

                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection('content')