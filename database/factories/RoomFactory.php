<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    protected $model = Room::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'hotel_id' => $this->faker->numberBetween(1, 15),
            'code' => $this->faker->word,
            'price' => $this->faker->randomNumber(2),
            'status' => $this->faker->numberBetween(0, 1),
        ];
    }
}
