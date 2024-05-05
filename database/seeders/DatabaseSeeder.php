<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        // Call other seeders here
        $this->call([
            EventSeeder::class,
            UserSeeder::class,
            RolesAndPermissionsSeeder::class,
        ]);

        // Re-enable foreign key checks after the seeding is done
    }
}
