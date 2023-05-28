<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Model\Product;
use App\Models\Model\Review;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Product::factory()->count(50)->create();
        Review::factory()->count(300)->create();
    }
}
