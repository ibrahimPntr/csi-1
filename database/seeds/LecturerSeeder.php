<?php

use Illuminate\Database\Seeder;

class LecturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Lecturer::class, 5)->create();
//        foreach ($lecturers as $lecturer){
//            $user = $lecturer->user;
//            $user->assignRole('lecturer');
//        }
    }
}
