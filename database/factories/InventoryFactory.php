<?php

use App\Product;
use App\Inventory;
use Faker\Generator as Faker;


$factory->define(App\Inventory::class, function (Faker $faker) {
    return [
        'product_id' => function () {
            return factory(Product::class)->create()->id;
        },
        'size' => Inventory::M_SIZE,
        'color' => 'red',
    ];
});
