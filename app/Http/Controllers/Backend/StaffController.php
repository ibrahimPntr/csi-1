<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:manage_staff']);
    }

    public function index()
    {
        $staffs = Staff::paginage('25');
        return view('backend.staff.index', compact('staffs'));
    }

    public function create()
    {
        return view('backend.staff.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, Staff::$validation_rules);

        $user = User::create([
            'username' => request('nip'),
            'email' => request('email'),
            'password' => bcrypt('nip'),
            'status' => 1,
            'type' => User::STAFF
        ]);

        if ($request->file('photo')->isValid()) {
            $filename = uniqid('staff-');
            $fileext = $request->file('photo')->extension();
            $filenameext = $filename.'.'.$fileext;

            $filepath = $request->photo->storeAs(config('central.folder.staff_photo'), $filenameext);
        }

        $data=$request->except('photo', 'email');
        $data['photo'] = $filenameext;
        $user->staff()->create($data);

        session()->flash('flash_success', 'Berhasil menambahkan data tendik atas nama '. $request->input('name'));
        return redirect()->route('admin.staff.show', [$user->id]);
    }

    public function show(Staff $staff)
    {
        return view('backend.staff.show', compact('staff'));
    }

    public function edit(Staff $staff)
    {
        return view('backend.staff.edit', compact('staff'));
    }

    public function update(Request $request, Staff $staff)
    {
        $this->validate($request, Staff::$validation_rules);

        $staff->user->update([
            'password' => bcrypt('secret'),
            'email' => request('email'),
            'status' => 1,
        ]);

        if ($request->file('photo')->isValid()) {

            Storage::disk('public')->delete(config('central.folder.staff_photo').$staff->photo);

            $filename = uniqid('staff-');
            $fileext = $request->file('photo')->extension();
            $filenameext = $filename.'.'.$fileext;

            $filepath = $request->photo->storeAs(config('central.folder.staff_photo'), $filenameext);
        }
        $data=$request->except('photo', 'email');
        $data['photo'] = $filenameext;
        $staff->update($data);

        session()->flash('flash_success', 'Berhasil mengupdate data tendik '.$staff->name);
        return redirect()->route('admin.staff.show', [$staff->id]);

    }

    public function destroy(Staff $staff)
    {
        $user = User::find($staff->id);
        $staff->delete();

        optional($user)->delete();

        session()->flash('flash_success', 'Berhasil menghapus tendik '.$staff->name);
        return redirect()->route('admin.staff.index');
    }
}
