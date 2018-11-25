<?php

use Illuminate\Database\Seeder;
use App\Models\Seller;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Seller::create(['name'=>'Forever21']);
        Seller::create(['name'=>'Walmart']);
        Seller::create(['name'=>'Toyrus']);
        Seller::create(['name'=>'Apple Store']);
    }
}
