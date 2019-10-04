<?php

namespace Tests\Feature\Lecture;

use App\Models\Lecturer;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateLectureTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function setUp():void
    {
        parent::setUp();
        $this->lecture = create(Lecturer::class);
    }

    /** @test */
    public function authorized_user_can_create_lecturer()
    {
        $this->withoutExceptionHandling();

        $this->signInWithPermission('manage_lecturers');

        $attributes = make(Lecturer::class)->toArray();
        $attributes['email'] = $this->faker->email;

        $this->get(route('admin.lecturers.create'))
            ->assertStatus(200);

        $response = $this->post('admin/lecturers', $attributes)
            ->assertRedirect();

        $this->assertDatabaseHas('users', ['email' => $attributes['email']]);
        $this->assertDatabaseHas('lecturers', ['nip' => $attributes['nip']]);

        $this->get($response->headers->get('Location'))
            ->assertSee($attributes['email'])
            ->assertSee($attributes['name']);
    }

    /** @test */
    public function admin_cannot_create_incomplete_data_leturer()
    {
        $this->signInWithPermission('manage_lecturers');

        $attributes = make(Lecturer::class)->toArray();
        $attributes['nik'] = null;
        $attributes['email'] = null;
        $attributes['name'] = null;
        $attributes['nidn'] = null;

        $this->get(route('admin.lecturers.create'))
            ->assertStatus(200);

        $this->post('admin/lecturers', $attributes)
            ->assertSessionHasErrors(['email', 'nidn', 'name', 'nik']);

        $attributes['email'] = 'my email address';
        $this->post('admin/lecturers', $attributes)
            ->assertSessionHasErrors(['email', 'nik', 'name', 'nidn']);
    }

    /** @test */
    public function unauthorized_user_cannot_create_student()
    {
        $this->get(route('admin.lecturers.create'))
            ->assertForbidden();
//            ->assertRedirect(route('login'));

        $this->post(route('admin.lecturers.store'), [])
            ->assertForbidden();
//            ->assertRedirect(route('login'));
    }
}
