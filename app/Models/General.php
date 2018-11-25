<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    public function array_dropdown($table, $message) {
		$output[null] = 'Select '.$message;
		$tables = array('departments','sellers','brands');
		if(!in_array($table, $tables)) {
			$output[null] = 'No Data Found';
			return $output;
		}
		$query = \DB::table($table);
		$query->select('id','name');
		$query->whereNull('deleted_at');
		$results = $query->orderBy('name')->get();

		if(count($results)>0){
			foreach($results as $result) {
				$output[$result->id] = $result->name;
			}
		}
		return $output;
	}
}
