<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
      'name' => $faker->word,
      'cost' => $faker->randomDigit,
      'salePrice' => $faker->randomDigit,
      'sku' => $faker->word,
    ];
});
