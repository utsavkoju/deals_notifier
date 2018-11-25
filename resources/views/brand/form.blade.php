@extends('_themes.dashboard')

@section('content')
    <main role="main" class="container">
    	<div class="row">
    		<div class="col-md-12">
    			<h4 style="text-align: center">
    				{{($action == 'Edit')?'Edit Brand :- '.$brand->name:'Add New Brand'}}</h4>
    			@if($action == 'Edit')
    				<form method="post" action="{{ route('brand.update', $brand->id) }}">
        			@method('PATCH')
    			@else
    			<form action="{{URL::route('brand.store')}}" method="POST" accept-charset="utf-8">
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
    						<td><input type="text" name="name" class="form-control" value="{{ ($action == 'Edit')?$brand->name:old('name') }}"></td>
    					</tr>
    					<tr>
    						<td>Origin Country</td>
    						<td><input type="text" name="origin_country" class="form-control" value="{{ ($action == 'Edit')?$brand->origin_country:old('origin_country') }}"></td>
    					</tr>
    					<tr>
    						<td>Established Year</td>
    						<td><input type="number" name="establish_year" class="form-control" value="{{ ($action == 'Edit')?$brand->establish_year:old('establish_year') }}"></td>
    					</tr>
    					<tr>
    						<td>Logo</td>
    						<td><input type="text" name="logo_url" class="form-control" value="{{ ($action == 'Edit')?$brand->logo_url:old('logo_url') }}"></td>
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