@extends('_themes/dashboard')

@section('content')
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script type="text/javascript">
    $(function(){
        tinymce.init({
            selector: '#tinymce'
        });
        $("input[type=file]").change(function(){
            fieldVal = fieldVal.replace("C:\\fakepath\\","");
            if(fieldVal != undefined || fieldVal != "") {
                $(this).next('.custom-file-label').attr('data-content',fieldVal);
                $(this).next('.custom-file-label').text(fieldVal);
            }
        })
    });
</script>
<main role="main" class="container">
    	<div class="row">
    		<div class="col-md-12">
    			<h4 style="text-align: center">
    				{{($action == 'Edit')?'Edit Product :- '.$product->name:'Add New Product'}}</h4>
    			@if($action == 'Edit')
    				<form method="post" action="{{ route('product.update', $product->id) }}">
        			@method('PATCH')
    			@else
                {!! Form::open(array('route' => 'product.store', 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation','files'=>true)) !!}
    			@endif
    				@csrf
    				@if(count($errors)>0)
						<div class="alert alert-danger">
							<p>{{ Session::get('status') }}
							<ul>
								@foreach($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
    				<table class="table">
    					<tr>
    						<td>Name</td>
    						<td><input type="text" name="name" class="form-control" value="{{ ($action == 'Edit')?$product->name:old('name') }}"></td>
    					</tr>
    					<tr>
    						<td>Current Price</td>
    						<td><input type="text" name="current_price" class="form-control" value="{{ ($action == 'Edit')?$product->current_price:old('current_price') }}"></td>
    					</tr>
    					<tr>
    						<td>Discount Rate</td>
    						<td><input type="text" name="discount_rate" class="form-control" value="{{ ($action == 'Edit')?$product->discount_rate:old('discount_rate') }}"></td>
    					</tr>
                        @if($action != 'Edit')
    					<tr>
    						<td>Image</td>
    						<td>
                                <input type="file" name="brandImage" class="custom-file-input" id="brandImage" accept=".jpg,.png,.gif" style="opacity: 100 !important;">
                                <label class="custom-file-label" for="customFile" style="position: fixed !important;">Choose File</label>
                            </td>
    					</tr>
                        @endif
    					<tr>
    						<td>Product Link</td>
    						<td><input type="text" name="product_url" class="form-control" value="{{ ($action == 'Edit')?$product->product_url:old('product_url') }}"></td>
    					</tr>
    					<tr>
    						<td>Product Description</td>
    						<td>{{ Form::textarea('product_description',($action == 'Edit')?$product->product_description:old('product_description'),array('class'=>'form-control','id'=>'tinymce', 'rows'=>'10')) }}</td>
                            
    					</tr>
    					<tr>
    						<td>Department</td>
    						<td>{{ Form::select('department_id', $department_array, ($action == 'Edit')?$product->department_id:old('department_id'), array('class'=>'form-control')) }}</td>
    					</tr>
    					<tr>
    						<td>Sellers</td>
    						<td>{{ Form::select('seller_id', $seller_array, ($action == 'Edit')?$product->seller_id:old('seller_id'), array('class'=>'form-control')) }}</td>
    					</tr>
    					<tr>
    						<td>Brand</td>
    						<td>{{ Form::select('brand_id', $brand_array, ($action == 'Edit')?$product->brand_id:old('brand_id'), array('class'=>'form-control')) }}</td>
    					</tr>
    					<tr>
    						<td colspan="2"><button type="submit" class="btn btn-warning">Submit</button></td>
    					</tr>
    				</table>
    			</form>
    		</div>
    	</div>
    </main><!-- /.container -->
@endsection