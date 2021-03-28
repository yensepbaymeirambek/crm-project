<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            array(
                'email' => 'admin@crm.kz',
                'username' => 'admin',
                'password' => bcrypt(123456),
                'role'  => 'admin'
            )
        );
        DB::table('users')->insert(
            array(
                'email' => 'manager@crm.kz',
                'username' => 'manager',
                'password' => bcrypt(123456),
                'role'  => 'manager'
            )
        );
    }
}
