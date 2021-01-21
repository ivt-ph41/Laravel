<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use Faker\Generator as Faker;
use App\Post;
use App\Product;

$factory->define(Image::class, function (Faker $faker) {
    $listProductID = Product::pluck('id');
    return [
        'path' => $faker->imageUrl,
        'imageable_id' => $faker->randomElement($listProductID),
        'imageable_type' => $faker->randomElement(['App\Product', 'App\Post'])
    ];
});
