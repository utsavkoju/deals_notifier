@extends('_themes.dashboard')

@section('content')
    <main role="main" class="container">
    	<div class="row">
    		<div class="col-md-12">
    			<a class="btn btn-primary" href="{{ URL::to('brand/create') }}">Create new Brand </a>
    			<br/>
    			<br/>
    			<table class="table table-bordered">
    				<thead>
    					<tr>
    						<th>S.N</th>
    						<th>Name</th>
    						<th>Country</th>
    						<th>Estd. Year</th>
    						<th>Logo</th>
    						<th>Actions</th>
    					</tr>
    				</thead>
    				<tbody>
    					<?php $i = 0;?>
    					@foreach($brands as $key => $brand)
    						<?php $i = $i + 1;?>
    						<tr>
    							<td> {{ $i }} </td>
    							<td> {{ $brand->name }}</td>
    							<td> {{ $brand->origin_country }}</td>
    							<td> {{ $brand->establish_year }}</td>
    							<td> {{ $brand->logo_url }}</td>
    							<td> <a class="btn btn-xs btn-primary" href="{{ URL::to('brand/'.$brand->id.'/edit') }}">Edit</a>
                                    <a class="btn btn-sm btn-danger" href="{{ URL::to('brand/'.$brand->id.'/delete') }}" onclick='if(confirm("Are you sure you want to delete the record?")) {return true; } else { return false; }'>
                                    DELETE</a>
    						</tr>
    					@endforeach
    				</tbody>
    			</table>
    		</div>
    	</div>
    </main><!-- /.container -->
@endsection