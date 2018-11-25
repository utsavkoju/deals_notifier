@extends('_themes.default')

@section('fast_css')
	<style type="text/css" media="screen">
	ul > li{margin-right:25px;font-weight:lighter;cursor:pointer}
li.active{border-bottom:3px solid silver;}

.item-photo{display:flex;justify-content:center;align-items:center;border-right:1px solid #f6f6f6;}
.menu-items{list-style-type:none;font-size:11px;display:inline-flex;margin-bottom:0;margin-top:20px}
.btn-success{width:100%;border-radius:0;}
.section{width:100%;margin-left:-15px;padding:2px;padding-left:15px;padding-right:15px;background:#f8f9f9}
.title-price{margin-top:30px;margin-bottom:0;color:black}
.title-attr{margin-top:0;margin-bottom:0;color:black;}
.btn-minus{cursor:pointer;font-size:7px;display:flex;align-items:center;padding:5px;padding-left:10px;padding-right:10px;border:1px solid gray;border-radius:2px;border-right:0;}
.btn-plus{cursor:pointer;font-size:7px;display:flex;align-items:center;padding:5px;padding-left:10px;padding-right:10px;border:1px solid gray;border-radius:2px;border-left:0;}
div.section > div {width:100%;display:inline-flex;}
div.section > div > input {margin:0;padding-left:5px;font-size:10px;padding-right:5px;max-width:18%;text-align:center;}
.attr,.attr2{cursor:pointer;margin-right:5px;height:20px;font-size:10px;padding:2px;border:1px solid gray;border-radius:2px;}
.attr.active,.attr2.active{ border:1px solid orange;}

@media (max-width: 426px) {
    .container {margin-top:0px !important;}
    .container > .row{padding:0 !important;}
    .container > .row > .col-xs-12.col-sm-5{
        padding-right:0 ;    
    }
    .container > .row > .col-xs-12.col-sm-9 > div > p{
        padding-left:0 !important;
        padding-right:0 !important;
    }
    .container > .row > .col-xs-12.col-sm-9 > div > ul{
        padding-left:10px !important;
        
    }            
    .section{width:104%;}
    .menu-items{padding-left:0;}
}
	</style>
@endsection

@section('content')
    <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white">Deals Notifier</h4>
            
            </div>
           
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand d-flex align-items-center">
            <strong>Deals Notifier</strong>
          </a>
          
        </div>
      </div>
    </header>

    <main role="main">
    	<a href="{{ URL::previous() }}" class="btn btn-primary">Back</a>
    	<div class="container">
    	<div class="row">
               <div class="col-xs-4 item-photo">
                    <img style="max-width:100%;" src="{{ asset($product->image_url) }}" />
                </div>
                <div class="col-xs-5" style="border:0px solid gray">
                    <!-- Datos del vendedor y titulo del producto -->
                    <h3>{{ $product->product_name }}</h3>    
                    <h5 style="color:#337ab7"><a href="#">{{$product->brand}}</a></h5>
        
                    <!-- Precios -->
                    <h6 class="title-price"><small>Price</small></h6>
                    <h3 style="margin-top:0px;">{{$product->current_price}}</h3>
        
        			<h6 class="title-price"><small>Seller</small></h6>
                    <h3 style="margin-top:0px;">{{$product->seller}}</h3>

                    <h6 class="title-price"><small>Department</small></h6>
                    <h3 style="margin-top:0px;">{{$product->department}}</h3>
                     
                    <div class="section" style="padding-bottom:20px;">
                        <a href="{{$product->product_url}}" class="btn btn-success"> Buy Now</a>
                    </div>                                        
                </div>                              
        
                <div class="col-xs-9">
                    <ul class="menu-items">
                        <li class="active">Details</li>
                    </ul>
                    <div style="width:100%;border-top:1px solid silver">
                        {!! $product->product_description !!}
                    </div>
                </div>		
            </div>
        </div>
    </main>

    <footer class="text-muted">
      <div class="container">
        <p>Developed by Anisha & Kritika (For CIS)</p>
      </div>
    </footer>
@endsection