<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    protected $model = Doctor::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "doc_name"=>$this->faker->name(),
            "doc_room"=>$this->faker->numerify("Rm###"),
            "app_time"=>$this->faker->dateTime($max='now', $timezone = null )
        ];
    }
}
