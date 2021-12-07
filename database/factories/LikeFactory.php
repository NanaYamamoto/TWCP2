<?php

namespace Database\Factories;

use App\Models\Like; //使いたいモデル
use Illuminate\Database\Eloquent\Factories\Factory;

class LikeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Like::class; //モデル名をパスから指定

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'post_id' => $this->faker->unique()->numberBetween(1, 30),
            'user_id' => $this->faker->unique()->numberBetween(1, 20)
        ];
    }
}
