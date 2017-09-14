<?php

use Faker\Generator as Faker;


$teams = [
    ['name' => 'Boston Celtics', 'abbr' => 'BST'],
    ['name' => 'Brooklyn Nets', 'abbr' => 'BKN'],
    ['name' => 'Chicago Bulls', 'abbr' => 'CHI'],
    ['name' => 'Dallas Mavericks', 'abbr' => 'DAL'],
    ['name' => 'Minnesota Timberwolves', 'abbr' => 'MIN'],
    ['name' => 'San Antonio Spurs', 'abbr' => 'SAS']
];

$factory->define(\CartHook\Entities\Team::class, function(Faker $faker) use ($teams) {

    $team = array_random($teams);
    [$simpleName, $location] = explode(' ', strrev($team['name']), 2);


    return [
        'teamId' => random_int(1000000000, 9999999999),
        'teamName' => $team['name'],
        'abbreviation' => $team['abbr'],
        'simpleName' => $simpleName,
        'location' => $location
    ];
});
