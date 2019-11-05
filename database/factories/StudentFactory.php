<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Student;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {

    $user = factory(User::class)->create();

    return [
        'id' => $user->id,
        'nim' => $user->username,
        'name' => $faker->name,
        'year' => $faker->numerify('201#'),
        'birthdate' => $faker->date(),
        'birthplace' => $faker->city,
        'phone' => $faker->phoneNumber,
    ];
});
