@extends('_themes.dashboard')



@section('content')

    <main role="main" class="container">

    	<div class="row">

    		<div class="col-md-12">
                <br/>

    			<a class="btn btn-primary" href="{{ URL::to('seller/create') }}">Create new Seller </a>

    			<br/>

    			<br/>


    			<table class="table table-bordered">

    				<thead>

    					<tr>

    						<th>S.N</th>

    						<th>Seller</th>

    						<th>Deleted_at</th>

    						<th>Actions</th>

    					</tr>

    				</thead>

    				<tbody>

    					<?php $i = 0;?>

    					@foreach($sellers as $key => $seller)

    						<?php $i = $i + 1;?>

    						<tr>

    							<td> {{ $i }} </td>

    							<td> {{ $seller->name }}</td>

    							<td> {{ $seller->deleted_at }}</td>
    							
    							<td> <a class="btn btn-xs btn-primary" href="{{ URL::to('seller/'.$seller->id.'/edit') }}">Edit</a>

                                    <a class="btn btn-sm btn-danger" href="{{ URL::to('seller/'.$seller->id.'/delete') }}" onclick='if(confirm("Are you sure you want to delete the record?")) {return true; } else { return false; }'>

                                    DELETE</a>
                                </td>

    						</tr>

    					@endforeach

    				</tbody>

    			</table>

    		</div>

    	</div>

    </main><!-- /.container -->

