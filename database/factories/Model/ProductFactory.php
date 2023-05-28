<?php

namespace Database\Factories\Model;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Model\Product;
use Faker\Factory as Faker;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();

        return [
            'name' => $faker->word,
            'details' => $faker->paragraph,
            'price' => $faker->numberBetween(100, 1000),
            'stock' => $faker->randomDigit,
            'discount' => $faker->numberBetween(2, 30),
        ];
    }
}

