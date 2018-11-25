<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
	/**
	*	Listing all brands
	**/
   	public function index() {
         $brand = new Brand();
         $this->data['brands'] = $brand->get_list();
   		return view('brand.index',$this->data);
   	}

   	/**
   	*	Loading form for creating of new brand
   	**/
   	public function create() {
         $this->data['action'] = 'Create';
   		return view('brand.form',$this->data);
   	}

   	/**
   	*	Saving newly created information from form
   	**/
   	public function store(Request $request) {
         $input = $request->input();
         $rules = array(
            'name'=>'required|unique:brands'
         );
         $validation = \Validator::make($input, $rules);
         if($validation->passes()){
            $brand = new Brand;
            $brand->name = $request->input('name');
            $brand->origin_country = $request->input('origin_country');
            $brand->establish_year = $request->input('establish_year');
            $brand->logo_url = $request->input('logo_url');
            $brand->save();
            return \Redirect::route('brand.index')->with('status','Brand Saved Successfully');   
         }
         return \Redirect::route('brand.create')->withInput()->withErrors($validation)->with('status','Some validation errors occured');
   	}

   	/**
   	*	Editing existing information
   	**/
   	public function edit($id) {
         $this->data['action'] = 'Edit';
         $this->data['brand'] = Brand::findOrFail($id);
   		return view('brand.form', $this->data);
   	}


   	/**
   	*	Updating existing information from form edit
   	**/
   	public function update(Request $request, $id) {
            $brand = Brand::findOrFail($id);
            $brand->name = $request->input('name');
            $brand->origin_country = $request->input('origin_country');
            $brand->establish_year = $request->input('establish_year');
            $brand->logo_url = $request->input('logo_url');
            $brand->save();
            return \Redirect::route('brand.index')->with('status','Brand Update Successfully');   
   	}

   	/**
   	*	Deleting existing entries or brand
   	**/
   	public function destroy($id) {
         $brand = Brand::findOrFail($id);
         $brand->deleted_at = Now();
         $brand->save();
         return \Redirect::route('brand.index')->with('status','Brand DELETED Successfully');  
   	}

   	/**
   	*	Viewing detail information about a brand
   	**/
   	public function show($id) {
   		return view('brand.show');
   	}
}
