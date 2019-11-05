<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\FamilyMember;
use Faker\Generator as Faker;

$factory->define(FamilyMember::class, function (Faker $faker) {

    $lecturer = factory(\App\Models\Lecturer::class)->create();

    $relationship = config('central.family_relationship');
    $gender = config('central.gender');
    $alive_status = config('central.alive_status');

    return [
        'id' => $lecturer->id,
        'name' => $faker->name,
        'relationship' => $faker->randomKey($relationship),
        'gender' => $faker->randomKey($gender),
        'birthday' => $faker->date(),
        'birthplace' => $faker->city,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
        'job' => $faker->jobTitle,
        'alive' => $faker->randomKey($alive_status),
    ];
});
