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
			<div class="col col-md-6"><b>Property Details</b></div>
			<div class="col col-md-6">
				<a href="{{ route('property.create') }}" class="btn btn-success btn-sm float-end">Add Property</a>
			</div>
		</div>
	</div>
<div class="card-body" style="margin-top:15px;">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-Room" style="text-align: center;">
                <thead>
                    <tr>
                        <th>Property Name</th>
                        <th>Property Address</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($property as $properties)
                    <tr>
                       
                        <td>{{ $properties['property_name'] }}</td>
                        <td>{{ $properties['property_address'] }}</td>
                    	<td>
                			<form action="{{ url('delete-property', [ $properties['id'] ]) }}" method="POST">
                    
                    			<a class="btn btn-info btn-sm" href="{{ url('list-room', [ $properties['id'] ]) }}">Show</a>
    
                    			<a class="btn btn-primary btn-sm" href="{{ route('property.edit', [ $properties['id'] ] ) }}">Edit</a>
                                
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