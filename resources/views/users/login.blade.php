@extends('_themes.default')

@section('content')
<br/>
<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<header class="card-header">
						<a href="{{ URL::to('register')}}" class="float-right btn btn-outline-primary mt-1">Create an Account</a>
						<h4 class="card-title mt-2">
							Log In
						</h4>
					</header>
					<article class="card-body">
						<form action="userLogin" method="post">
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
							    <label for="username">Email</label>
							    <input type="email" class="form-control" name="email" placeholder="someone@something.com" value="{{ old('email')}}">
						  </div>
						  <div class="form-group">
							    <label for="password">Password</label>
							    <input type="password" class="form-control" name="password">
						  </div>
						  <button type="submit" class="btn btn-primary">Log In</button>
						</form>
					</article>
			</div>
		</div>

	</div>
</div>
@endsection