<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 0;

        while ($count < 20) {
            $categories = Category::factory()
                ->count(3)
                ->create();

            Product::factory()
                ->hasUser()
                ->hasAttachments(3)
                ->hasAttached($categories)
                ->create();

            $count++;
        }
    }
}
