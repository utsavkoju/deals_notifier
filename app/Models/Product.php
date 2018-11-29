<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function get_list() {
        $max_date = Self::get_max_date();
    	$query = \DB::table('products');
    	$query->select(\DB::RAW("products.id, products.name as 'product_name', current_price, discount_rate, image_url, product_url, departments.name as 'department', sellers.name as 'seller', brands.name as 'brand', product_description"));
    	$query->join('departments','departments.id','=','products.department_id');
    	$query->join('sellers','sellers.id','=','products.seller_id');
    	$query->leftjoin('brands','brands.id','=','products.brand_id');
    	$query->where('products.deleted_at',null);
        $query->where('products.date',$max_date->date);
    	$result = $query->paginate(20); //object[array] $query->first() //single value as array
    	return $result; // this will return result 
    }

    public function get_best_seller($count) {
        $max_date = Self::get_max_date();
        $query = \DB::table('products');
        $query->select(\DB::RAW("products.id, products.name as 'product_name', current_price, discount_rate, image_url, product_url, departments.name as 'department', sellers.name as 'seller', brands.name as 'brand', product_description"));
        $query->join('departments','departments.id','=','products.department_id');
        $query->join('sellers','sellers.id','=','products.seller_id');
        $query->leftjoin('brands','brands.id','=','products.brand_id');
        $query->where('products.deleted_at',null);
        $query->where('products.date',$max_date->date);
        $query->orderBy('products.discount_rate','DESC');
        $result = $query->paginate($count); //object[array] $query->first() //single value as array
        return $result; // this will return result 
    }

    public function get_details($id) {
        $query = \DB::table('products');
        $query->select(\DB::RAW("products.id, products.name as 'product_name', products.product_description, current_price, discount_rate, image_url, product_url, departments.name as 'department', sellers.name as 'seller', brands.name as 'brand'"));
        $query->join('departments','departments.id','=','products.department_id');
        $query->join('sellers','sellers.id','=','products.seller_id');
        $query->leftjoin('brands','brands.id','=','products.brand_id');
        $query->where('products.deleted_at',null);
        $query->where('products.id','=',$id);
        $result = $query->first(); //object[array] $query->first() //single value as array
        return $result;
    }

    private function get_max_date() {
        $query = \DB::table('products');
        $query->select(\DB::raw('MAX(date) as date'));
        $query->where('products.deleted_at',null);
        return $query->first();
    }

    public function get_search_count($keyword) {
        $max_date = Self::get_max_date();
        $query = \DB::table('products');
        $query->select(\DB::RAW("products.id"));
        $query->where('products.deleted_at',null);
        $query->where('products.date',$max_date->date);
        $query->where('products.name','like','%'.$keyword.'%');
        $result = $query->get(); //object[array] $query->first() //single value as array
        return $result; // this will return result 
    }

    public function get_search($keyword) {
        $max_date = Self::get_max_date();
        $query = \DB::table('products');
        $query->select(\DB::RAW("products.id, products.name as 'product_name', current_price, discount_rate, image_url, product_url, departments.name as 'department', sellers.name as 'seller', brands.name as 'brand', product_description, products.date"));
        $query->join('departments','departments.id','=','products.department_id');
        $query->join('sellers','sellers.id','=','products.seller_id');
        $query->leftjoin('brands','brands.id','=','products.brand_id');
        $query->where('products.deleted_at',null);
        $query->where('products.date',$max_date->date);
        $query->where('products.name','like','%'.$keyword.'%');
        $result = $query->paginate(10); //object[array] $query->first() //single value as array
        return $result; // this will return result 
    }
}
