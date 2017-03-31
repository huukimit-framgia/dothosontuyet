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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    $password = 'Admin123';

    return [
        'email' => $faker->unique()->email,
        'password' => bcrypt($password),
        'name' => $faker->name,
        'phone' => $faker->phoneNumber,
        'address' => $faker->sentence,
        'birthday' => $faker->dateTime,
        'avatar' => 'images/user.png',
        'actived' => rand(0, 1),
        'blocked' => rand(0, 1),
        'groupid' => rand(1, 3),
    ];
});
