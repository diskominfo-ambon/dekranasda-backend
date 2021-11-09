<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->count(12)
            ->create();

        $this->call([
            PostSeeder::class,
            ProductSeeder::class,
            RolePermissionSeeder::class
        ]);
    }
}
