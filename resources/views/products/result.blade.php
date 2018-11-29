@extends('_themes.default')


@section('content')
<main role="main">
	<div class="container">
		<hgroup class="mb20">
			<h1>Search Results</h1>
			<h2 class="lead"><strong class="text-danger">{{ count($count) }}</strong> results were found for the search for <strong class="text-danger">{{ ucwords($keyword) }}</strong></h2>								
		</hgroup>

		<section class="col-xs-12 col-sm-6 col-md-12">
			@foreach($results as $result)
			<article class="search-result row">
				<div class="col-xs-12 col-sm-12 col-md-3">
					<a href="#" title="Lorem ipsum" class="thumbnail"><img src="{{$result->image_url}}" alt="{{$result->product_name}}" /></a>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-2">
					<ul class="meta-search">
						<li><i class="fa fa-calendar"></i> <span>{{$result->date}}</span></li>
						<li><i class="fa fa-dollar-sign"></i> <span>{{ $result->current_price}}</span></li>
						<li><i class="fa fa-percentage"></i> <span>{{ $result->discount_rate * 100}}</span></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-7 excerpet">
					<h3><a href="#" title="">{{ $result->product_name }}</a></h3>
					<p>Seller: {{ $result->seller }}</p>				
					<p>Department: {{ $result->department }}	</p>	
					<a class="btn btn-success right" href="{{ URL::to('/product/'.$result->id.'/details') }}"> View Details</a>
				</div>
				<span class="clearfix borda"></span>
			</article>		
			@endforeach
		</section>
		<br/>
		{{$results->links()}}
	</div>


</main>
@endsection