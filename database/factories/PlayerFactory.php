<?php

use Faker\Generator as Faker;


$factory->define(\CartHook\Entities\Player::class, function(Faker $faker) {
    return [
        'playerId' => random_int(100000, 999999),
        'teamId' => random_int(1000000000, 9999999999),
        'firstName' => $faker->name('male'),
        'lastName' => $faker->lastName,
    ];
});
