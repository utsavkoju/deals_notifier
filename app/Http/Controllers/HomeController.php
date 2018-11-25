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
    	$this->data['products'] = $product->get_list();
    	return view('main', $this->data);
    }
}
