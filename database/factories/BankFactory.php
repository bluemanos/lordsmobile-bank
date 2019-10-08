<?php

use App\Model\Bank;
use Faker\Generator as Faker;

$factory->define(Bank::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
