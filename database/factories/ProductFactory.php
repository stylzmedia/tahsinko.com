<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Product;

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
        return [
            'category_id' => $this->faker->randomNumber(),
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'freature_image' => $this->faker->word,
            'video' => $this->faker->word,
            'position' => $this->faker->numberBetween(-10000, 10000),
            'pdf_file' => $this->faker->word,
            'status' => $this->faker->numberBetween(-8, 8),
        ];
    }
}
