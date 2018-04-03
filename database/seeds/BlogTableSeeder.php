<?php

use Illuminate\Database\Seeder;

class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb1_blog')->insert([
            'category_id' => '10',
            'blog_title' => 'About doctor',
            'author_name' => 'Eyakub',
            'blog_short_description' => 'hey doctor',
            'blog_long_description' => 'hey doctor, can i come in for your appointment',
            //'blog imgae' => '10',
            'publication_status' => '1',
        ]);
        DB::table('tb1_blog')->insert([
            'category_id' => '11',
            'blog_title' => 'About Me',
            'author_name' => 'Eyakub',
            'blog_short_description' => 'hey doctor',
            'blog_long_description' => 'hey doctor, can i come in for your appointment',
            //'blog imgae' => '10',
            'publication_status' => '1',
        ]);
        DB::table('tb1_blog')->insert([
            'category_id' => '12',
            'blog_title' => 'About Friend',
            'author_name' => 'Eyakub',
            'blog_short_description' => 'hey doctor',
            'blog_long_description' => 'hey doctor, can i come in for your appointment',
            //'blog imgae' => '10',
            'publication_status' => '1',
        ]);
        DB::table('tb1_blog')->insert([
            'category_id' => '13',
            'blog_title' => 'About Enemy',
            'author_name' => 'Eyakub',
            'blog_short_description' => 'hey doctor',
            'blog_long_description' => 'hey doctor, can i come in for your appointment',
            //'blog imgae' => '10',
            'publication_status' => '1',
        ]);
    }
}
