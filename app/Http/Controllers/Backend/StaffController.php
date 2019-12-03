<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
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
        $staffs = Staff::paginate(25);
        return view('backend.staffs.index', compact('staffs'));
    }

    public function create()
    {
        $departments = Department::all();
        $genders = config('central.gender');
        $marital_statuses = config('central.marital_status');
        $religions = config('central.religion');
        $association_types = config('central.employee_association');
        return view('backend.staffs.create', compact(
            'departments',
            'genders',
            'marital_statuses',
            'religions',
            'association_types'
        ));
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
        return redirect()->route('admin.staffs.show', [$user->id]);
    }

    public function show(Staff $staff)
    {
        $departments = Department::all();
        $genders = config('central.gender');
        $marital_statuses = config('central.marital_status');
        $religions = config('central.religion');
        $association_types = config('central.employee_association');
        return view('backend.staffs.show', compact(
            'staff',
            'departments',
            'genders',
            'marital_statuses',
            'religions',
            'association_types'
        ));
    }

    public function edit(Staff $staff)
    {
        $departments = Department::all();
        $genders = config('central.gender');
        $marital_statuses = config('central.marital_status');
        $religions = config('central.religion');
        $association_types = config('central.employee_association');
        return view('backend.staffs.edit', compact(
            'staff',
            'departments',
            'genders',
            'marital_statuses',
            'religions',
            'association_types'
        ));
    }

    public function update(Request $request, Staff $staff)
    {
        // dd('tes');
        $this->validate($request, Staff::$validation_rules);

        $staff->update($request->only(
            'nip',
            'nik',
            'name',
            'birthday',
            'birthplace',
            'phone',
            'gender',
            'karpeg',
            'npwp',
            'department_id',
            'address',
            'marital_status',
            'religion',
            'association_type'));

        $staff->user->update([
            'password' => bcrypt('secret'),
            'email' => request('email'),
            'status' => 1,
        ]);

        if($request->hasFile('photo')){
            $oldFile = $staff->photo;
            $fileExt = $request->photo->extension();
            $fileName = uniqid("photo").".".$fileExt;
            $request->photo->storeAs(
                config('central.folder.staff_photo'), $fileName
            );
            $staff->photo = $fileName;
            $staff->save();
            Storage::delete(config('central.folder.staff_photo').'/'.$oldFile);
        }

        session()->flash('flash_success', 'Berhasil mengupdate data tendik '.$staff->name);
        return redirect()->route('admin.staffs.show', [$staff->id]);

    }

    public function destroy(Staff $staff)
    {
        $user = User::find($staff->id);
        $staff->delete();

        optional($user)->delete();

        session()->flash('flash_success', 'Berhasil menghapus tendik '.$staff->name);
        return redirect()->route('admin.staffs.index');
    }
}
