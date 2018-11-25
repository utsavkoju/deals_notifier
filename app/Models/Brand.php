<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';
    
    public function get_list() {
    	return \DB::table('brands')->where('deleted_at',null)->get();
    }
}
