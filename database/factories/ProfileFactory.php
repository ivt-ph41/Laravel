<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use Faker\Generator as Faker;
use App\User;

$factory->define(Profile::class, function (Faker $faker) {
    $listUserID = User::pluck('id');
    return [
        'address' => $faker->address,
        'age' => rand(1,100),
        'user_id' => $faker->randomElement($listUserID)
    ];
});
