<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Message::class, function (Faker $faker) {
    return [
		'name' => $faker->name(),
		'email' => $faker->email,
		'message' => $faker->text()
    ];
});
