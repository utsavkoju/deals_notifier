@extends('_themes.default')

@section('content')
    <main role="main">
      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">
          	@foreach($products as $key => $product)
            <div class="col-md-3 col-sm-6" style="min-height: 325px !important;">
    		<span class="thumbnail">
      			<img src="{{ $product->image_url}}" class="thumb" alt="{{$product->product_name}}">
      			<h5 style="min-height: 75px !important;">{{$product->product_name}}</h5>
      			<p>{{ substr($product->product_description, 0, 100) }} </p>
      			<hr class="line">
      			<div class="row">
      				<div class="col-md-6 col-sm-6">
      					<p class="price">$ {{$product->current_price}}</p>
      				</div>
      				<div class="col-md-6 col-sm-6">
      					<a class="btn btn-success right" href="{{ URL::to('/product/'.$product->id.'/details') }}"> View Details</a>
      				</div>
      				
      			</div>
    		</span>
  		</div>
            @endforeach
        </div>
        {{ $products->links() }}
      </div>

    </main>

    <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#">Back to top</a>
        </p>
        <p>Developed by Anisha & Kritika (For CIS)</p>
      </div>
    </footer>
@endsection