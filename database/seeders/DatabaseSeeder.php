<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Testimonial::factory(5)->create();
        $this->call(SectionDesignTypeSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(UserSeeder::class);


        // \App\Models\RequestContact::factory(5)->create();
    }
}
