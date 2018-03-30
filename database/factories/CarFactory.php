<?php

use Faker\Generator as Faker;

$factory->define(/**
 * @param Faker $faker
 * @return array
 */
    App\Car::class, function (Faker $faker) {

        /* Fake a Make and then fake Model accordingly
            - consider faking a randomElement where the element is a pair of info
        */
        $fakedMake = $faker->randomElement(['Ford','Honda','Toyota']);
        if($fakedMake == 'Ford'){
            $fakedModel = $faker->randomElement(['Edge','Escape','Expedition', 'Explorer']);
        } elseif ($fakedMake == 'Honda'){
            $fakedModel = $faker->randomElement(['Accord Coupe','Accord Hybrid','Accord Sedan',
                'Civic Coupe','Civic Hatchback','Civic Sedan',
                'CR-V','Fit','Odyssey'
                ]);
        } else {
            $fakedModel = $faker->randomElement(['Avalon','Camry','Highlander', 'Tundra']);
        }

    return [
        //
        'make' => $fakedMake,
        'model' => $fakedModel,
        'year' => $faker->numberBetween(1989, 2019),
    ];
});
