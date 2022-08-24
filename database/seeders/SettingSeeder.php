<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert(
            [
                [
                    'id'=>1,
                    'group'=>"general",
                    'name'=>"email",
                    'value'=>"info@tahsinko.com"
                ],
                [
                    'id'=>2,
                    'group'=>"general",
                    'name'=>"mobile_number",
                    'value'=>"0171100000"
                ],
                [
                    'id'=>3,
                    'group'=>"general",
                    'name'=>"tel",
                    'value'=>"0171"
            ]
            ]
        );

    }
}
