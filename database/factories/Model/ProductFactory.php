<?php

namespace Database\Factories\Model;

use App\Models\User;
use Faker\Factory as Faker;
use App\Models\Model\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'user_id' => function () {
                return User::all()->random();
            },
        ];
    }
}

