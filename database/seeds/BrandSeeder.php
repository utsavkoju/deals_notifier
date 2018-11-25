<?php

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create(['name'=>'Prestige']);
        Brand::create(['name'=>'Levis']);
        Brand::create(['name'=>'Forever21']);
        Brand::create(['name'=>'Nokia']);
        Brand::create(['name'=>'Apple']);
        Brand::create(['name'=>'Google']);
    }
}
