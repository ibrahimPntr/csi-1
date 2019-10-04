<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:manage_students']);
    }

    public function index()
    {
        $students = Student::paginate(25);
        return view('backend.students.index', compact('students'));
    }

    public function create()
    {
        return view('backend.students.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, Student::$validation_rules);

        $user = User::create([
            'username' => request('nim'),
            'email' => request('email'),
            'password' => bcrypt('nim'),
            'status' => 1,
            'type' => User::STUDENT
        ]);

        $user->student()->create($request->only(
            'nim',
            'name',
            'year',
            'birthdate',
            'birthplace',
            'phone'));

        session()->flash('flash_success', 'Berhasil menambah data mahasiswa atas nama '. $request->input('name'));
        return redirect()->route('admin.students.show', [$user->id]);
    }

    public function show(Student $student)
    {
        return view('backend.students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('backend.students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate(Student::$validation_rules);

        $student->update($request->only(
            'nim',
            'name',
            'year',
            'birthdate',
            'birthplace',
            'phone'
        ));

        $student->user->update([
            'password' => bcrypt('secret'),
            'email' => request('email'),
            'status' => 1,
        ]);

        session()->flash('flash_success', 'Berhasil mengupdate data mahasiswa '.$student->name);
        return redirect()->route('admin.students.show', [$student->id]);
    }

    public function destroy(Student $student)
    {
        $user = User::find($student->id);
        $student->delete();
        optional($user)->delete();

        session()->flash('flash_success', 'Berhasil menghapus data mahasiswa '.$student->name);
        return redirect()->route('admin.students.index');
    }
}
