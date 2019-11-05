<?php

namespace Tests\Feature\Lecture;

use App\Models\Lecturer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageLecturerTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function setUp():void
    {
        parent::setUp();
        $this->lecturer = create(Lecturer::class);
    }

    /** @test */
    public function authorized_user_can_browse_lecturers_list()
    {
        $this->signInWithPermission('manage_lecturers');

        $this->get(route('admin.lecturers.index'))
            ->assertSee($this->lecturer->name);

        $this->get(route('admin.lecturers.show', [$this->lecturer->id]))
            ->assertStatus(200)
            ->assertSee($this->lecturer->nama);
    }

    /** @test */
    public function authorized_user_can_delete_dosen()
    {
        $this->signInWithPermission('manage_lecturers');

        $lecturer = factory(Lecturer::class)->create();

        $this->assertDatabaseHas('lecturers', [
            'id' => $lecturer->id,
            'name' => $lecturer->name,
            'nip' => $lecturer->nip
        ]);

        $this->delete(route('admin.lecturers.destroy', [$lecturer->id]))
            ->assertRedirect();

        $this->assertDatabaseMissing('lecturers', [
            'nama' => $lecturer->name,
            'nip' => $lecturer->nip
        ]);
    }
}
