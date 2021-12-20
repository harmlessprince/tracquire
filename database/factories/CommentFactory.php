<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'body' => $this->faker->sentence,
            'commentable_id' => rand(1, Post::count()),
            'commentable_type' => 'post',
            'created_by' => rand(1, User::count())
        ];
    }
}
