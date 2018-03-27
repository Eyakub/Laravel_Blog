<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb1_admin')->insert([
            'admin_name' => 'MD. Eyakub Sorkar',//str_random(10),
            'email_address' => 'eyakubsorkar@gmail.com',//str_random(10).'@gmail.com',
            'admin_password' => md5('123456'),//str_random(10).'@gmail.com',
            'mobile_number' => '01937424217',//str_random(10).'@gmail.com',
            'access_label' => '1',//str_random(10).'@gmail.com',
        ]);
    }
}
