<?php

use Illuminate\Database\Seeder;

class UserEducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\UserEducation::class, 5)->create();
    }
}
