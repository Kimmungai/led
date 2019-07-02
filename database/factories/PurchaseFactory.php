<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Purchase;
use Faker\Generator as Faker;

$factory->define(Purchase::class, function (Faker $faker) {
    return [
      'user_id' => $faker->numberBetween(1,50),
      'amountPaid' => $faker->randomDigit,
      'remarks' => $faker->word,
    ];
});
