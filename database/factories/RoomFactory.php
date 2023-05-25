<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    protected $model = Room::class; 
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "r_number"=> $this->faker->numerify("Rm.###"),
            "r_status"=> $this->faker->randomElement(["Active", "Lock", "Available"]),
            "r_left" => $this->faker->randomElement(["1","2","3","4","5","6","None"]),
            "r_charge"=> $this->faker->numerify("$###"),
        ];
    }
}
 