<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Department;
class DepartmentController extends Controller
{
	/**
	*	Listing all departments
	**/
   	public function index() {
         $department = new department();
         $this->data['department'] = $department->get_list();
   		return view('departments.index',$this->data);
   	}
   	/**
   	*	Loading form for creating of new department
   	**/
   	public function create() {
         $this->data['action'] = 'Create';
   		return view('departments.form',$this->data);
   	}
   	/**
   	*	Saving newly created information from form
   	**/
   	public function store(Request $request) {
         $input = $request->input();
         $rules = array(
            'name'=>'required|unique:departments'
         );
         $validation = \Validator::make($input, $rules);
         if($validation->passes()){
            $department = new Department;
            $department->name = $request->input('name');
            $department->save();
            return \Redirect::route('department.index')->with('status','Department Saved Successfully');   
         }
         return \Redirect::route('department.create')->withInput()->withErrors($validation)->with('status','Some validation errors occured');
   	}
   	/**
   	*	Editing existing information
   	**/
   	public function edit($id) {
         $this->data['action'] = 'Edit';
         $this->data['department'] = Department::findOrFail($id);
   		return view('departments.form', $this->data);
   	}

   	/**
   	*	Updating existing information from form edit
   	**/
   	public function update(Request $request, $id) {
            $department = Department::findOrFail($id);
            $department->name = $request->input('name');
            $department->save();
            return \Redirect::route('department.index')->with('status','Department Update Successfully');   
   	}
   	/**
   	*	Deleting existing entries or department
   	**/
   	public function destroy($id) {
         $department = Department::findOrFail($id);
         $department->deleted_at = Now();
         $department->save();
         return \Redirect::route('department.index')->with('status','Department DELETED Successfully');  
   	}

   	/**
   	*	Viewing detail information about a department
   	**/
   	public function show($id) {
   		return view('departments.show');
   	}
}
