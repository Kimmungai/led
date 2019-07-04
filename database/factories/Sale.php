<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Sale;
use Faker\Generator as Faker;

$factory->define(Sale::class, function (Faker $faker) {
    return [
      'user_id' => $faker->numberBetween(1,50),
      'amountReceived' => $faker->randomDigit,
      'remarks' => $faker->word,
    ];
});
