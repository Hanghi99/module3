<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data=[
           [
                'email'      =>  'thaonhi990508@gmail.com',
                'password'   =>  '123123'
           ],
           [
                'email'      =>  'admin@gmail.com',
                'password'   =>  '123123'
           ]

           ];
           DB::table('users')->insert($data);
    }
}
