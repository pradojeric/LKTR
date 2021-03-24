<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EventUser;
use Faker\Generator as Faker;

$factory->define(EventUser::class, function (Faker $faker) {
    return [
        //
        'game_event_id' => 1,
        'full_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
    ];
});
