<?php

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create(['name' => 'Kitchenware']);
        Department::create(['name' => 'Electronics']);
        Department::create(['name' => 'Gardening']);
        Department::create(['name' => 'Clothings']);
        Department::create(['name' => 'Health and Hygiene']);
        Department::create(['name' => 'Medication']);
        Department::create(['name' => 'Vegetables And Foods']);
    }
}
