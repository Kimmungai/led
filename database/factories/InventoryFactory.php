<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Inventory;
use Faker\Generator as Faker;

$factory->define(Inventory::class, function (Faker $faker) {
    return [
      'product_id' => factory(App\Product::class)->create()->id,
      'availableQuantity' => $faker->randomNumber,
    ];
});
