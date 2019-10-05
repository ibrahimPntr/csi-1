<?php

use Illuminate\Database\Seeder;

class FamilyMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 4; $i++){
            $lecturer = factory(\App\Models\Lecturer::class)->create();
            for($j = 1; $j < 4; $j++){
                factory(\App\Models\FamilyMember::class)->create(['user_id' => $lecturer->id]);
            }
        }
    }
}
