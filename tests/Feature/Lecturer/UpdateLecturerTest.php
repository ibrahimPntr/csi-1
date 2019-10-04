<?php

namespace Tests\Feature;

use App\Models\Lecturer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateLecturerTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->lecturer = create(Lecturer::class);
    }

    /** @test */
    public function authorized_user_can_update_dosen()
    {
        $this->signInWithPermission('manage_lecturers');

        $attributes = make(Lecturer::class)->toArray();
        $attributes['email'] = $this->faker->email;

        $this->get(route('admin.lecturers.edit', [$this->lecturer->id]))
            ->assertStatus(200);

        $response = $this->patch(
            route('admin.lecturers.update', [$this->lecturer->id]),  $attributes)
            ->assertRedirect();

        $this->assertDatabaseHas('users', ['email' => $attributes['email']]);
        $this->assertDatabaseHas('lecturers', ['nip' => $attributes['nip']]);

        $this->get($response->headers->get('Location'))
            ->assertSee($attributes['email'])
            ->assertSee($attributes['name']);
    }

    /** @test */
    public function authorized_user_cannot_update_incomplete_data()
    {
        $this->signInWithPermission('manage_lecturers');

        $attributes = make(Lecturer::class)->toArray();
        $attributes['nik'] = null;
        $attributes['email'] = null;
        $attributes['name'] = null;
        $attributes['nidn'] = null;

        $this->get(route('admin.lecturers.edit', [$this->lecturer->id]))
            ->assertStatus(200);

        $this->patch(route('admin.lecturers.update', [$this->lecturer->id]), $attributes)
            ->assertSessionHasErrors(['email', 'nik', 'name', 'nidn']);

        $attributes['email'] = 'my email address';
        $this->patch(route('admin.lecturers.update', [$this->lecturer->id]), $attributes)
            ->assertSessionHasErrors(['email', 'nik', 'name', 'nidn']);
    }

    /** @test */
    public function unregistered_user_cannot_update_student()
    {
        $this->get(route('admin.lecturers.edit', [$this->lecturer->id]))
            ->assertForbidden();
//            ->assertRedirect(route('login'));

        $this->patch(route('admin.lecturers.update', [$this->lecturer->id]), [])
            ->assertForbidden();
//            ->assertRedirect(route('login'));
    }
}
