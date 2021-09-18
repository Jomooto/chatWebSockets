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
        // \App\Models\User::factory(10)->create();
        \App\Models\User::create([
            'name' => 'Jomoto',
            'email' => 'j@admin.com',
            'password' => bcrypt('12345678')
        ]);

        \App\Models\User::create([
            'name' => 'Ndvi',
            'email' => 'n@admin.com',
            'password' => bcrypt('12345678')
        ]);
    }
}
