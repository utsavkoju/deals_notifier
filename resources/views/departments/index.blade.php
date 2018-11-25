@extends('_themes.dashboard')



@section('content')

    <main role="main" class="container">

    	<div class="row">

    		<div class="col-md-12">

    			<a class="btn btn-primary" href="{{ URL::to('department/create') }}">Create new department </a>

    			<br/>

    			<br/>

    			<table class="table table-bordered">

    				<thead>

    					<tr>

    						<th>S.N</th>

    						<th>Department</th>

    						<th>Actions</th>

    					</tr>

    				</thead>

    				<tbody>

    					<?php $i = 0;?>

    					@foreach($department as $key => $department)

    						<?php $i = $i + 1;?>

    						<tr>

    							<td> {{ $i }} </td>

    							<td> {{ $department->name }}</td>
    							

    							<td> <a class="btn btn-xs btn-primary" href="{{ URL::to('department/'.$department->id.'/edit') }}">Edit</a>

                                    <a class="btn btn-sm btn-danger" href="{{ URL::to('department/'.$department->id.'/delete') }}" onclick='if(confirm("Are you sure you want to delete the record?")) {return true; } else { return false; }'>

                                    DELETE</a>

    						</tr>

    					@endforeach

    				</tbody>

    			</table>

    		</div>

    	</div>

    </main><!-- /.container -->

@endsection