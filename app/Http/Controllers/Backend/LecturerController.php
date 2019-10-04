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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function edit(Lecturer $lecturer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lecturer $lecturer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecturer $lecturer)
    {
        //
    }
}
