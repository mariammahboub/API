<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Model\Review;
use App\Models\Model\Product;
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
        User::factory()->count(20)->create();

        Product::factory()->count(100)->create();
        Review::factory()->count(500)->create();
    }
}
