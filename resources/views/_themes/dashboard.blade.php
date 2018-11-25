<!DOCTYPE html>
<html>
<head>
	<title>{{ config('app.name') }}</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<style type="text/css" media="screen">
		body {
		  padding-top: 2.5rem;
		}
	</style>
</head>
<body>
	@include('_includes/header');
	@yield('content')
<script src="{{asset('js/boostrap.min.js') }}"></script>
</body>
</html>