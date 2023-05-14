<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionDesignTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('section_design_types')->insert(
            [
                [
                    'name'=>"About",
                    'is_active'=>1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name'=>"CEO",
                    'is_active'=>1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name'=>"Mission & Vision",
                    'is_active'=>1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name'=>"Counter",
                    'is_active'=>1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name'=>"Product Line",
                    'is_active'=>1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name'=>"TradeMark",
                    'is_active'=>1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name'=>"Our Services",
                    'is_active'=>1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name'=>"Latest Products",
                    'is_active'=>1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name'=>"Our Products",
                    'is_active'=>1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name'=>"Clients",
                    'is_active'=>1,
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ]
        );

    }
}
