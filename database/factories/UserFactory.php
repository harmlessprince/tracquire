<?php

namespace Database\Factories;

use App\Helper\UserStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Stevebauman\Location\Facades\Location;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $ip = $this->faker->ipv4();
        $location = Location::get($ip);
        $lat = $location->latitude ?? 0.00;
        $long = $location->longitude ?? 0.00;
        $country = $location->countryName ?? '';
        $state = $location->regionName ?? '';
        $city = $location->cityName ?? '';
        $usersStatus = UserStatus::toArray();
        unset($usersStatus['NONE']);
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'username' => $this->faker->userName(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'device_name' => $this->faker->userAgent(),
            'status' => Arr::random($usersStatus),
            'ip' => $this->faker->ipv4(),
            'latitude' => $lat,
            'longitude' => $long,
            'country' => $country,
            'state' => $state,
            'city' => $city,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
//        return $this->state(function (array $attributes) {
//            return [
//                'email_verified_at' => null,
//            ];
//        });
    }
}
