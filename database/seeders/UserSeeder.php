<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert(
                [
                    'id'=>1,
                    'type'=>"admin",
                    'role_id'=>1,
                    'status'=>"approved",
                    'first_name'=>"Sharif",
                    'last_name'=>"Sarkar",
                    'email'=>"admin@me.com",
                    'mobile_number'=>"01618220044",
                    'password'=> Hash::make("01618220044")
                ],
        );

    }
}
