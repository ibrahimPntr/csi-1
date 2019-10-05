<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(App\Models\User::class)->create([
            'username' => 'admin',
            'name' => 'Administrator',
            'password' => bcrypt('admin'),
            'email' => 'admin@admin.com',
            'type' => 3,
            'active' => 1
        ]);

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $manage_lecturers = Permission::create(['name' => 'manage_lecturers']);
        $manage_students = Permission::create(['name' => 'manage_students']);
        $manage_staff = Permission::create(['name' => 'manage_staff']);
        $manage_users = Permission::create(['name' => 'manage_users']);
        $manage_proposalkp = Permission::create(['name' => 'manage_proposalkp']);

        $adminRole = Role::create(['name' => 'admin']);
        $lecturerRole = Role::create(['name' => 'lecturers']);
        $studentRole = Role::create(['name' => 'students']);

        $adminRole->givePermissionTo($manage_lecturers);
        $adminRole->givePermissionTo($manage_students);
        $adminRole->givePermissionTo($manage_staff);
        $adminRole->givePermissionTo($manage_users);
        $adminRole->givePermissionTo($manage_proposalkp);

        $user->assignRole('admin');
    }
}
