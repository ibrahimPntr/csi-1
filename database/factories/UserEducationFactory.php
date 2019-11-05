<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UserEducation;
use Faker\Generator as Faker;

$factory->define(UserEducation::class, function (Faker $faker) {

    $lecturer = factory(\App\Models\Lecturer::class)->create();
    $education_level = config('central.education_level');
    $domestic = config('central.domestic');

    return [
        'user_id' => $lecturer->id,
        'education_level' => $faker->randomKey($education_level),
        'school_name' => $faker->company,
        'dept' => $faker->company,
        'year_start' => $faker->year(),
        'year_finish' => $faker->year(),
        'domestic' => $faker->randomKey($domestic),
        'school_address' => $faker->address,
        'certificate_no' => $faker->creditCardNumber,
    ];
});
