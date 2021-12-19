<?php

namespace Database\Factories;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class HotelFactory extends Factory
{
    protected $model = Hotel::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'location_id' => $this->faker->numberBetween(1, 8),
            'name' => $name = $this->faker->name,
            'slug' => Str::snake($name),
            'hotel_image' => 'https://picsum.photos/200',
            'address' => $this->faker->address,
            'email' => $this->faker->email,
            'credit_card' => $this->faker->creditCardType,
            'credit_number' => $this->faker->creditCardNumber,
            'tagline' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
        ];
    }
}
