<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Models\Card::class, function (Faker $faker) {

    $datetime = Carbon::now()->toDateTimeString();

    return [
        'card_no' => $faker->creditCardNumber(),
        'card_secret' => $faker->creditCardNumber(),
        'created_at' => $datetime,
        'updated_at' => $datetime,
    ];
});
