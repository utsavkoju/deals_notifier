<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';

    public function get_list (){
    	return \DB::table('departments')->where('deleted_at',null)->get();
    }
}
