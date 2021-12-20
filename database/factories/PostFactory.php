<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->text(50);
        return [
            'category_id' => Arr::random(range(1,3)),
            'title' => $title,
            'slug' => Str::slug($title, '-'),
            'description' => $this->faker->sentence(),
            'published_at' => now(),
            'condition' => $this->faker->sentence,
            'shoot_able' => $this->faker->boolean(),
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'country' => $this->faker->country,
            'state' => $this->faker->city,
            'city' => $this->faker->city(),
            'location' => $this->faker->locale
        ];
    }
}
