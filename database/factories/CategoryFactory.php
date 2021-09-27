<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'id' => $this->faker->numberBetween($min = 1, $max = 100),
            'name' => $this->faker->name,
            'active' => $this->faker->numberBetween($min = 1, $max = 2),
            'img' => $this->faker->imageUrl($width = 640, $height = 480),
            'updated_at' => $this->faker->numberBetween($min = 1, $max = 5),
            'created_at' => $this->faker->datetime($max = 'now', $timezone = date_default_timezone_get())
        ];
    }
}