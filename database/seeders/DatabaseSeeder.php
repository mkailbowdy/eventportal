<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call other seeders here
        $this->call([
            CategorySeeder::class,
//            EventSeeder::class,
//            UserSeeder::class,
            RolesAndPermissionsSeeder::class,
        ]);

        // Re-enable foreign key checks after the seeding is done
    }
}
