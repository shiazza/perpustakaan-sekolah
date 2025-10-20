<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Call other seeders to populate the database
        // I'm sure you know how it works, so I won't explain it :)
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            CategorySeeder::class, // Add this if not exists
            BookSeeder::class,
        ]);
    }
}
