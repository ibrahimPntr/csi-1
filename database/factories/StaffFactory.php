<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Staff;
use Faker\Generator as Faker;

$factory->define(Staff::class, function (Faker $faker) {

    $user = factory(\App\Models\User::class)->create();

    return [
        'id' => $user->id,
        'nip' => $user->username,
        'nik' => $faker->numerify('#############'),
        'name' => $faker->name,
        'birthdate' => $faker->date(),
        'birthplace' => $faker->city,
        'phone' => $faker->phoneNumber,
    ];
});
