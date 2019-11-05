<?php

namespace Tests;

use App\Models\Lecturer;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp():void
    {
        parent::setUp();
        $this->app->make(PermissionRegistrar::class)->registerPermissions();
    }

    public function signIn($user = null)
    {
        if($user == null) {
            $lecturer = create(Lecturer::class);
            $user = $lecturer->user;
        }
        $this->actingAs($user);
        return $user;
    }

    public function signInAsDosen()
    {
        $dosen = create(Lecturer::class);
        $this->signIn($dosen);
    }

    public function signInWithPermission($permission)
    {
        $user = $this->signIn();
        $permission = Permission::create(['name' => $permission]);
        $user->givePermissionTo($permission);
        return $user;
    }
}
