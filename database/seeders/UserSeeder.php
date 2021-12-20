<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        UserFactory::
        User::factory(3)->create()->each(function ($user){
            $user->posts()->saveMany(Post::factory(5)->make());
        });
    }
}
