<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Org;
use Faker\Generator as Faker;

$factory->define(Org::class, function (Faker $faker) {
    return [
      'name' => $faker->name,
      'email' => $faker->email,
      'description' => $faker->word,
    ];
});
