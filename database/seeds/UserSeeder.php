<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
                array(
                    'email'         => env('ADMIN_MAIL'),
                    'name'          => env('ADMIN_NAME'),
                    'password'      => Hash::make(env('ADMIN_PASS')),
                    'type'    => env('ADMIN_TYPE'),
                    'created_at'    => date('Y-m-d H:i:s'),
                    'updated_at'    => date('Y-m-d H:i:s')
                )
            )
        );
    }
}
