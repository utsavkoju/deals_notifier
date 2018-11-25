@extends('_themes.default')

@section('content')
<br/>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<header class="card-header">
						<a href="{{ URL::to('login')}}" class="float-right btn btn-outline-primary mt-1">Log In</a>
						<h4 class="card-title mt-2">
							User Registration
						</h4>
					</header>
					<article class="card-body">
						<form action="saveRegister" method="POST">
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
							<div class="form-group">
							    <label for="name">Full Name</label>
							    <input type="text" class="form-control" name="fullname" placeholder="name" value="{{ old('name') }}">
						  </div>
						  <div class="form-group">
							    <label for="email">Email Address</label>
							    <input type="email" class="form-control" name="email" placeholder="someting@someone.com" value="{{ old('email') }}">
						  </div>
						  <div class="form-group">
							    <label for="password">Password</label>
							    <input type="password" class="form-control" name="password">
						  </div>
						  <div class="form-group">
							    <label for="confirm-password">Confirm Password</label>
							    <input type="password" class="form-control" name="confirmPassword">
						  </div>
						  <div class="form-group">
						  		<label for="address">Address</label>
							  	<input type="text" name="address" class="form-control"  value="{{ old('address') }}">
						  </div>
						  <button type="submit" class="btn btn-primary" name="user_registration">Register</button>
						</form>
					</article>
			</div>
		</div>

	</div>
</div>

@endsection