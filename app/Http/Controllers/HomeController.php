<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(){
    	return view('home');
    }

    public function home() {
    	$product = new Product();
    	$this->data['banner_products'] = $product->get_best_seller(9);
    	$this->data['products'] = $product->get_best_seller(20);
    	return view('main', $this->data);
    }

    public function deals() {
    	$product = new Product();
    	$this->data['products'] = $product->get_list();
    	return view('products/product', $this->data);
    }
}
