<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Country;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    $listCountryID = Country::pluck('id');
    return [
        'username' => $faker->name,
        'password' => bcrypt('1322434'),
        'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->email,
        'gender' => rand(0,1),
        'country_id'=> $faker->randomElement($listCountryID)
    ];
});
