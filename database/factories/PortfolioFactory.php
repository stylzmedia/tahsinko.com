<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Portfolio;

class PortfolioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Portfolio::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => $this->faker->randomNumber(),
            'media_id' => $this->faker->randomNumber(),
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->text,
            'image' => $this->faker->word,
        ];
    }
}
