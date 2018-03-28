<?php

use Faker\Generator as Faker;

$factory->define(App\Car::class, function (Faker $faker) {
    return [
        //
        'make' => $faker->randomElement('Ford','Honda','Toyota'),
        'model' => $faker->domainWord,
        'year' => $faker->numberBetween(1989, 2019), // secret
    ];
});
