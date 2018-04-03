<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_category') -> insert([
            'category_name' => 'Android',
            'category_description' => 'asus zenfone 2',
            'publication_status' => '1',
        ]);

        DB::table('tbl_category') -> insert([
            'category_name' => 'Windows',
            'category_description' => 'win 10',
            'publication_status' => '1',
        ]);

        DB::table('tbl_category') -> insert([
            'category_name' => 'Linux',
            'category_description' => 'ubuntu version',
            'publication_status' => '1',
        ]);

        DB::table('tbl_category') -> insert([
            'category_name' => 'Tv',
            'category_description' => 'Sony',
            'publication_status' => '1',
        ]);

    }
}
