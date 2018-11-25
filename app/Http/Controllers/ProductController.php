<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\General;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() {
        $product = new Product();
    	$this->data['products'] = $product->get_list();
        return view('products.index', $this->data);
    }

    public function create() {
    	$this->data['action'] = 'Create';
    	$general = new General();
    	$this->data['department_array'] = $general->array_dropdown('departments','Department');
    	$this->data['seller_array'] = $general->array_dropdown('sellers','Seller');
    	$this->data['brand_array'] = $general->array_dropdown('brands','Brand');
    	return view('products.form',$this->data);
    }

    public function store(Request $request) {
    	$input = $request->input();
         $rules = array(
            'name'=>'required',
            'current_price' => 'required',
            'discount_rate' => 'required'
         );
         $validation = \Validator::make($input, $rules);
         $brandImage = $request->file('brandImage');
         $image_extension = $brandImage->extension();
         if($validation->passes()){
            try {
                $imageFile = md5(rand()).'.'.$image_extension;
                $full_path = public_path().'/products';
                $brandImage->move($full_path, $imageFile);
                $image_path = '/products/'.$imageFile;
            } catch (\Exception $e) {
                return back()->withErrors($e->getMessage());
            }


            $product = new Product;
            $product->name = $request->input('name');
            $product->current_price = $request->input('current_price');
            $product->discount_rate = $request->input('discount_rate');
            $product->image_url = $image_path;
            $product->product_url = $request->input('product_url');
            $product->product_description = $request->input('product_description');
            $product->department_id = $request->input('department_id');
            $product->seller_id = $request->input('seller_id');
            $product->brand_id = $request->input('brand_id');
            $product->save();
            return \Redirect::route('product.index')->with('status','Product Saved Successfully');   
         }
         return \Redirect::route('product.create')->withInput()->withErrors($validation)->with('status','Some validation errors occured');
    }

    public function edit($id) {
        $product = new Product();
        $this->data['product'] = $product::findOrFail($id);
    	$this->data['action'] = 'Edit';
        $general = new General();
        $this->data['department_array'] = $general->array_dropdown('departments','Department');
        $this->data['seller_array'] = $general->array_dropdown('sellers','Seller');
        $this->data['brand_array'] = $general->array_dropdown('brands','Brand');
        return view('products.form',$this->data);
    }

    public function update(Request $request, $id) {
        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->current_price = $request->input('current_price');
        $product->discount_rate = $request->input('discount_rate');
        $product->product_url = $request->input('product_url');
        $product->product_description = $request->input('product_description');
        $product->department_id = $request->input('department_id');
        $product->seller_id = $request->input('seller_id');
        $product->brand_id = $request->input('brand_id');
        $product->save();
        return \Redirect::route('product.index')->with('status','Product Saved Successfully');   
    }

    public function destroy($id) {
    	$product = Product::findOrFail($id);
         $product->deleted_at = Now();
         $product->save();
         return \Redirect::route('product.index')->with('status','Product DELETED Successfully');
    }

    public function details($id) {
        $product = new Product();
        $this->data['product'] = $product->get_details($id);
        return view('products.detail', $this->data);
    }
}
