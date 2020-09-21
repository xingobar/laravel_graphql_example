<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Jobs::class, function (Faker $faker) {
    return [
        'user_id' => factory(\App\User::class)->create()->id,
        'name' => $faker->name,
        'description' => $faker->text(100),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
