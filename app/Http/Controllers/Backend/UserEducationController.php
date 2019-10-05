<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserEducation;
use http\Exception;
use Illuminate\Http\Request;

class UserEducationController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $domestic = config('central.domestic');
        $level = config('central.education_level');
        return view('backend.education.create', compact('domestic', 'level'));
    }

    public function store(Request $request)
    {
        $this->validate($request, UserEducation::$validation_rules);

        $userEducation = new UserEducation();
        $userEducation->user_id = $request->input('user_id');
        $userEducation->education_level = $request->input('education_level');
        $userEducation->school_name = $request->input('school_name');
        $userEducation->year_start = $request->input('year_start');
        $userEducation->dept = $request->input('dept');
        $userEducation->year_finish = $request->input('year_finish');
        $userEducation->domestic = $request->input('domestic');
        $userEducation->school_address = $request->input('school_address');
        $userEducation->certificate_no = $request->input('certificate_no');

        if($request->file('certificate_file')->isValid())
        {
            $filename = uniqid('certificate-');
            $fileext = $request->file('certificate_file')->extension();
            $filenameext = $filename.'.'.$fileext;

            $filepath = $request->certificate_file->storeAs(config('central.folder.ijazah'),$filenameext);

            $userEducation->certificate_file = $filepath;
        }

        try {
            if($userEducation->save()){
                session()->flash('flash_success', 'Berhasil menambahkan data riwayat pendidikan dengan id user = '. $request->input('user_id'));

                $user = User::findOrFail($request->input('user_id'));

                switch ($user->type) {
                    case User::STAFF:
                        return redirect()->route('admin.staff.show', $user->id);
                    case User::LECTURER:
                        return redirect()->route('admin.lecturers.show', $user->id);
                    case User::STUDENT:
                        return redirect()->route('admin.students.show', $user->id);
                }
            }
        } catch (Exception $e) {
            session()->flash('flash_success', 'error'. $e);
            return redirect()->back();
        }
    }

    public function show(UserEducation $userEducation)
    {
        $domestic = config('central.domestic');
        $level = config('central.education_level');

        return view('backend.educations.show', compact(
            'userEducation',
            'domestic',
            'level'
        ));
    }

    public function edit(UserEducation $userEducation)
    {
        $domestic = config('central.domestic');
        $level = config('central.education_level');

        return view('backend.education.create', compact(
            'userEducation', 'domestic', 'level'));
    }

    public function update(Request $request, UserEducation $userEducation)
    {
        $this->validate($request, UserEducation::$validation_rules);

        $user = $userEducation->user;

        $userEducation->user_id = $request->input('user_id');
        $userEducation->education_level = $request->input('education_level');
        $userEducation->school_name = $request->input('school_name');
        $userEducation->year_start = $request->input('year_start');
        $userEducation->dept = $request->input('dept');
        $userEducation->year_finish = $request->input('year_finish');
        $userEducation->domestic = $request->input('domestic');
        $userEducation->school_address = $request->input('school_address');
        $userEducation->certificate_no = $request->input('certificate_no');


        if($request->file('certificate_file')->isValid())
        {
            if (\Storage::exists($userEducation->certificate_file))
            {
                \Storage::delete($userEducation->certificate_file);
            }
            $filename = uniqid('certificate-');
            $fileext = $request->file('certificate_file')->extension();
            $filenameext = $filename.'.'.$fileext;

            $filepath = $request->certificate_file->storeAs(config('central.folder.ijazah'),$filenameext);

            $userEducation->certificate_file = $filepath;
        }

        try {
            if($userEducation->save()){
                session()->flash('flash_success', 'Berhasil menambahkan data riwayat pendidikan dengan id user = '. $request->input('user_id'));

                $user = User::findOrFail($request->input('user_id'));

                switch ($user->type) {
                    case User::STAFF:
                        return redirect()->route('admin.staff.show', $user->id);
                    case User::LECTURER:
                        return redirect()->route('admin.lecturers.show', $user->id);
                    case User::STUDENT:
                        return redirect()->route('admin.students.show', $user->id);
                }
            }
        } catch (Exception $e) {
            session()->flash('flash_success', 'error'. $e);
            return redirect()->back();
        }
        switch ($user->type) {
            case User::STAFF:
                return redirect()->route('admin.staff.show', $user->id);
            case User::LECTURER:
                return redirect()->route('admin.lecturers.show', $user->id);
            case User::STUDENT:
                return redirect()->route('admin.students.show', $user->id);
        }
    }

    public function destroy(UserEducation $userEducation)
    {
        $user = $userEducation->user;
        $userEducation->delete();

        session()->flash('flash_success', 'Berhasil menghapus data pendidikan '. $user->name);
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
