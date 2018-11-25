@extends('_themes/dashboard')

@section('content')

<main role="main" class="container">
	<div class="row">
		<div class="col-md-12">
			<a class="btn btn-primary" href="{{ URL::to('product/create') }}">Create new Product </a>
			<br/>
			<br/>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>S.N</th>
						<th>Image</th>
						<th>Name</th>
						<th>Current Price</th>
						<th>Discount Rate</th>
						<th>Product URL</th>
						<th>Department</th>
						<th>Seller</th>
						<th>Brand</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 0;?>
					@foreach($products as $key => $product)
						<?php $i = $i + 1;?>
						<tr>
							<td> {{ $i }} </td>
							<td> <img src="{{ asset($product->image_url) }}" style="width: 80px; height: 80px;"></td>
							<td> {{ $product->product_name }}</td>
							<td> {{ $product->current_price }}</td>
							<td> {{ $product->discount_rate }}</td>
							<td> <a href="{{ $product->product_url }}">Link</a></td>
							<td> {{ $product->department }}</td>
							<td> {{ $product->seller }}</td>
							<td> {{ $product->brand }}</td>
							<td> <a class="btn btn-xs btn-primary" href="{{ URL::to('product/'.$product->id.'/edit') }}">Edit</a>
                                <a class="btn btn-sm btn-danger" href="{{ URL::to('product/'.$product->id.'/delete') }}" onclick='if(confirm("Are you sure you want to delete the record?")) {return true; } else { return false; }'>
                                DELETE</a>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</main><!-- /.container -->

@endsection