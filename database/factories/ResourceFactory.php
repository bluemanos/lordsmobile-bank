<?php

use App\Model\Bank;
use App\Model\Resource;
use App\Model\User;
use Faker\Generator as Faker;

$factory->define(Resource::class, function (Faker $faker) {
    return [
        'bank_id' => factory(Bank::class)->create()->id,
        'creator_id' => factory(User::class)->create()->id,
        'user_id' => factory(User::class)->create()->id,
        'accepted_by' => factory(User::class)->create()->id,
        'amount' => $faker->randomNumber(),
        'rss' => $faker->randomElement(Resource::TYPES),
        'comment' => $faker->sentence(),
    ];
});
