@extends('_themes.dashboard')



@section('content')

    <main role="main" class="container">

    	<div class="row">

    		<div class="col-md-12">

    			<h4 style="text-align: center">

    				{{($action == 'Edit')?'Edit Department :- '.$department->department_name:'Add New Department'}}</h4>

    			@if($action == 'Edit')

    				<form method="post" action="{{ route('department.update', $department->id) }}">

        			@method('PATCH')

    			@else

    			<form action="{{URL::route('department.store')}}" method="POST" accept-charset="utf-8">

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

    						<td><input type="text" name="name" class="form-control" value="{{ ($action == 'Edit')?$department->name:old('name') }}"></td>

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