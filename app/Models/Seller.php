<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $table = 'sellers';

    public function get_list(){
    	return \DB::table('sellers')->where ('deleted_at',null)->get();
    }
}
