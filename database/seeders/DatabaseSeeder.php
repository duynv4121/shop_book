<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
            DB::table('users')->insert([
                'name' => 'Nguyen Van Teo',
                'email' => 'teonv@gmail.com',
                'password' => md5('hehe'),
                'active' => 1,
                'idgroup' => 1,
                'username'=>'teo',
                'diachi'=>'TPHCM'
            ]);
            DB::table('users')->insert([
                'name' => 'Nguyen Van Ti',
                'email' => 'ti@gmail.com',
                'password' => md5('hihi'), 
                'active' => 1,'idgroup' => 1,
                'username'=>'ti', 
                'diachi'=>'TPHCM'
            ]);
            DB::table('users')->insert([
                'name' => 'Nguyen Thi Gia Hu',
                'email' => 'giahu@gmail.com',
                'password' => md5('huhu'), 
                'active' => 1,'idgroup' => 0,
                'username'=>'giahu',
                'diachi'=>'HN'
            ]);
    }
}
