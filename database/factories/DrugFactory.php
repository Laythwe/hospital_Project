<?php

namespace Database\Factories;

use App\Models\Drug;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Drug>
 */
class DrugFactory extends Factory
{
    protected $model = Drug::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "d_name"=> $this->faker->name(),
            "d_weight"=> $this->faker->numerify("###g"),
            "d_stock"=> $this->faker->numerify("###"),
            "d_price"=> $this->faker->numerify("$###")
        ];
    }
}
