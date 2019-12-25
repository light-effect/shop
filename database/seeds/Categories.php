<?php

use Illuminate\Database\Seeder;

class Categories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new \App\Category();
        $category->name = 'laptops';
        $category->save();

        $category = new \App\Category();
        $category->name = 'phones';
        $category->save();

        $category = new \App\Category();
        $category->name = 'TVs';
        $category->save();


        $category = new \App\Category();
        $category->name = 'accessories';
        $category->save();


    }
}
