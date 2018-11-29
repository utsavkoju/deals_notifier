@extends('_themes.default')


@section('content')
    <main role="main">
      <div class="container">
        <h4>Top Deals</h4>
        <div id="myCarousel" style="max-height: 300px !important; background: #eeeeee;" class="carousel slide bg-inverse ml-auto mr-auto" data-ride="carousel">
  <div class="carousel-inner" role="listbox">
    @foreach($banner_products as $key => $banner)
    <div style="max-height: 300px !important;" class="carousel-item {{ ($key == 0)?'active':''}}">
      <a href="{{ URL::to('/product/'.$banner->id.'/details') }}">
      <img  style="max-height: 300px !important; width: auto !important; margin-left: auto; margin-right: auto; display: block;" class="d-block w-100" src="{{$banner->image_url}}" alt="{{$banner->product_name}}">
        <div class="carousel-caption" style="bottom: 0px !important; padding: 5px !important; background: #000000 !important; opacity: 0.4 !important;">
          <h3>{{$banner->product_name}}</h3>
          <p>$ {{$banner->current_price}}</p>
        </div>
      </a>
    </div>
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

      <div class="album py-5 bg-light">
        <div class="container">
          <h4><u>Picks For You</u></h4>
          <div class="row">
          	@foreach($products as $key => $product)
            <div class="col-md-3 col-sm-6" style="min-height: 325px !important;">
    		<span class="thumbnail" style="align-items: center;">
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