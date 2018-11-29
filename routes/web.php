<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','HomeController@home');
Route::get('/deals','HomeController@deals');
Route::get('product/search','ProductController@search')->name('product.search');
Route::get('/product/{id}/details','ProductController@details')->name('product.details');
//Route::get('/login', array('uses'=>'UserController@login'))->name('login');
Route::get('/login','UserController@login')->name('login');
Route::get('/register','UserController@register')->name('register');
Route::get('/logout','UserController@logout')->name('logout');
Route::post('/saveRegister','UserController@saveRegister')->name('saveRegister');
Route::post('/userLogin','UserController@userLogin')->name('userLogin');
Route::group(['middleware'=>'auth'], function() {
	Route::get('/home','HomeController@index')->name('home');
	
	//Brand Routes	
	Route::resource('brand','BrandController', array('except'=>array('delete')));
	Route::get('brand/{id}/delete', 'BrandController@destroy')->name('brand.destroy');
	
	//Product Routes
	Route::resource('product','ProductController',array('except'=>array('delete')));
	Route::get('product/{id}/delete', 'ProductController@destroy')->name('product.destroy');

	//Seller Routes
	Route::get('seller/{id}/delete', 'SellerController@destroy')->name('seller.destroy');
	Route::resource('seller','SellerController', array('except'=>array('delete')));

	//Department Routes
	Route::get('department/{id}/delete', 'DepartmentController@destroy')->name('department.destroy');
	Route::resource('department','DepartmentController', array('except'=>array('delete')));
});

