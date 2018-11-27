<?php

use Faker\Generator as Faker;
use App\Lead;
use App\Note;

$factory->define(App\Note::class, function (Faker $faker) {

    $user_id = rand(1, 4);
    $lead_id = rand(1, 4);
    return [
        'lead_id' => $lead_id,
        'user_id' => $user_id,
        'priority' => Note::HIGH_PRIORITY,
        'title' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'body' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
    ];
});
