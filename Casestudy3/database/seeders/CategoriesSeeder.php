<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories         =   new Categories();
        $categories->name   =   'Quần';
        $categories->status =   'Tồn tại';
        $categories->save();

        $categories         =   new Categories();
        $categories->name   =   'Áo';
        $categories->status =   'Tồn tại';
        $categories->save();

        $categories         =   new Categories();
        $categories->name   =   'Giày';
        $categories->status =   'Tồn tại';
        $categories->save();

        $categories         =    new Categories();
        $categories->name   =    'Váy';
        $categories->status =    'Tồn tại';
        $categories->save();

        }
}