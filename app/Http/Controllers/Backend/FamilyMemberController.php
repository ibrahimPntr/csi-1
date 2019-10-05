<?php

namespace App\Http\Controllers\Backend;

use App\Models\FamilyMember;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class FamilyMemberController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:manage_family']);
    }

    public function create()
    {
        $family_relationship = config('central.family_relationship');
        $alive_status = config('central.alive_status');
        $gender = config('central.gender');

        return view('backend.family.create', compact(
            'family_relationship',
            'alive_status',
            'gender'
        ));
    }

    public function store(Request $request)
    {
        $this->validate($request, FamilyMember::$validation_rules);

        $user = User::findOrFail($request->input('user_id'));

        $user->families()->create($request);

        session()->flash('flash_success', 'Berhasil menambahkan data anggota keluarga ' . $user->name);

        switch ($user->type) {
            case User::STAFF:
                return redirect()->route('admin.staff.show', $user->id);
            case User::LECTURER:
                return redirect()->route('admin.lecturers.show', $user->id);
            case User::STUDENT:
                return redirect()->route('admin.students.show', $user->id);
        }
    }

    public function show(FamilyMember $familyMember)
    {
        return view('backend.family.show', compact('familyMember'));
    }

    public function edit(FamilyMember $familyMember)
    {
        $relationship = config('central.family_relationship');
        $alive_status = config('central.alive_status');
        $gender = config('central.gender');

        return view('backend.family.edit', compact(
            'familyMember',
            'gender',
            'alive_status',
            'relationship'
        ));
    }

    public function update(Request $request, FamilyMember $familyMember)
    {
        $this->validate($request, FamilyMember::$validation_rules);

        $user = User::findOrFail($familyMember->user_id);

        $familyMember->update($request);

        session()->flash('flash_success', 'Berhasil memperbaharui data anggota keluarga ' . $user->name);

        switch ($user->type) {
            case User::STAFF:
                return redirect()->route('admin.staff.show', $user->id);
            case User::LECTURER:
                return redirect()->route('admin.lecturers.show', $user->id);
            case User::STUDENT:
                return redirect()->route('admin.students.show', $user->id);
        }

    }

    public function destroy(FamilyMember $familyMember)
    {
        $familyMember->delete();

        $user = $familyMember->user;

        session()->flash('flash_success', 'Berhasil menghapus data anggota keluarga ' . $user->name);

        switch ($user->type) {
            case User::STAFF:
                return redirect()->route('admin.staff.show', $user->id);
            case User::LECTURER:
                return redirect()->route('admin.lecturers.show', $user->id);
            case User::STUDENT:
                return redirect()->route('admin.students.show', $user->id);
        }
    }
}
