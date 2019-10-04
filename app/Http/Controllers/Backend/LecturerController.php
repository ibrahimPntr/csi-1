<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Lecturer;
use App\Models\User;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:manage_lecturers']);
    }

    public function index()
    {
        $lecturers = Lecturer::paginate(25);
        return view('backend.lecturers.index', compact('lecturers'));
    }

    public function create()
    {
        return view('backend.lecturers.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, Lecturer::$validation_rules);

        $user = User::create([
            'username' => request('nip'),
            'email' => request('email'),
            'password' => bcrypt('nip'),
            'status' => 1,
            'type' => User::LECTURER
        ]);

        $user->lecturer()->create($request->only(
            'nip',
            'nidn',
            'nik',
            'name',
            'birthdate',
            'birthplace',
            'phoneno'));

        session()->flash('flash_success', 'Berhasil menambahkan data dosen atas nama '. $request->input('name'));
        return redirect()->route('admin.lecturers.show', [$user->id]);
    }


    public function show(Lecturer $lecturer)
    {
        return view('backend.lecturers.show', compact('lecturer'));
    }

    public function edit(Lecturer $lecturer)
    {
        return view('backend.lecturers.edit', compact('lecturer'));
    }

    public function update(Request $request, Lecturer $lecturer)
    {
        $this->validate($request, Lecturer::$validation_rules);

        $lecturer->update($request->only(
            'nip',
            'nidn',
            'nik',
            'name',
            'birthplace',
            'birthdate',
            'phone'));

        $lecturer->user->update([
            'password' => bcrypt('secret'),
            'email' => request('email'),
            'status' => 1,
        ]);

        session()->flash('flash_success', 'Berhasil mengupdate data dosen '.$lecturer->name);
        return redirect()->route('admin.lecturers.show', [$lecturer->id]);
    }

    public function destroy(Lecturer $lecturer)
    {
        $user = User::find($lecturer->id);
        $lecturer->delete();
        optional($user)->delete();

        session()->flash('flash_success', "Berhasil menghapus dosen ".$lecturer->name);
        return redirect()->route('admin.lecturers.index');
    }
}
