<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'level' => $faker->numberBetween(1, 20),
        'experience' => 0,
        'energy' => $faker->numberBetween(0, 3000),
    ];
});

$factory->define(App\Dungeon::class, function(Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'min_level' => $faker->numberBetween(1, 20),
    ];
});

$factory->define(App\Monster::class, function(Faker\Generator $faker) {
    return [
        'experience_drop' => $faker->numberBetween(10, 100),
        'energy_drop' => $faker->numberBetween(10, 100),
    ];
});
