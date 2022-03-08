<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ConversationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'last_msg' => $this->faker->sentence(),
            'seen' => $this->faker->boolean(),
            'unseen_number'=> $this->faker->randomDigit(),
        ];
    }
}
