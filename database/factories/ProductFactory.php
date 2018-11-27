<?php

use App\Product;


use Faker\Generator as Faker;


$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'type' => Product::SOCK_TYPE,
        'status' => Product::ACTIVE_STATUS,
        'title' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'price' => 1000,
        'cost' => 100,
        'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'preview_image_url' => $faker->imageUrl(),

    ];
});
