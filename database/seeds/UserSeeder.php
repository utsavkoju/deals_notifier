<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'fullname'=>'GVSU',
        	'email'=>'admin@gvsu.edu',
        	'address'=>'Grand Rapids',
        	'ip_address'=>'192.168.1.1',
        	'password'=>Hash::make('password')
        ]);
    }
}
