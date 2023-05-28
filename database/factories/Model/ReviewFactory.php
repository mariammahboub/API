<?php

namespace Database\Factories\Model;

use App\Models\Model\Review;
use App\Models\Model\Product;
use Faker\Factory as Faker; // Update the import statement
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();

        return [
            'product_id' => function () {
                return Product::all()->random();
            },
            'customer' => $faker->name,
            'review' => $faker->paragraph,
            'star' => $faker->numberBetween(0, 5),
        ];
    }
}


