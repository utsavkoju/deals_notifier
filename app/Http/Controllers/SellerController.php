<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Seller;
class SellerController extends Controller
{
	/**
	*	Listing all Seller
	**/
   	public function index() {
         $Seller = new Seller();
         $this->data['sellers'] = $Seller->get_list();
   		return view('sellers.index',$this->data);
   	}
   	/**
   	*	Loading form for creating of new Seller
   	**/
   	public function create() {
         $this->data['action'] = 'create';
   		return view('sellers.form',$this->data);
   	}
   	/**
   	*	Saving newly created information from form
   	**/
   	public function store(Request $request) {
         $input = $request->input();
         $rules = array(
            'name'=>'required|unique:sellers'
         );
         $validation = \Validator::make($input, $rules);
         if($validation->passes()){
            $Seller = new Seller;
            $Seller->name = $request->input('name');
            $Seller->save();
            return \Redirect::route('seller.index')->with('status','Seller Saved Successfully');   
         }
         return \Redirect::route('seller.create')->withInput()->withErrors($validation)->with('status','Some validation errors occured');
   	}
   	/**
   	*	Editing existing information
   	**/
   	public function edit($id) {
         $this->data['action'] = 'Edit';
         $this->data['seller'] = Seller::findOrFail($id);
   		return view('sellers.form', $this->data);
   	}

   	/**
   	*	Updating existing information from form edit
   	**/
   	public function update(Request $request, $id) {
            $Seller = Seller::findOrFail($id);
            $Seller->name = $request->input('name');
            $Seller->deleted_at = $request->input('deleted_at');
            $Seller->save();
            return \Redirect::route('seller.index')->with('status','Seller Update Successfully');   
   	}
   	/**
   	*	Deleting existing entries or department
   	**/
   	public function destroy($id) {
         $Seller = Seller::findOrFail($id);
         $Seller->deleted_at = Now();
         $Seller->save();
         return \Redirect::route('seller.index')->with('status','Seller Deleted Successfully');  
   	}

   	/**
   	*	Viewing detail information about a department
   	**/
   	public function show($id) {
   		return view('sellers.show');
   	}
}
