<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Thesis;
use Illuminate\Http\Request;

class ThesisSupervisorController extends Controller
{
    public function destroy($thesis_id, $lecturer_id)
    {
        $thesis = Thesis::find($thesis_id);
        $thesis->supervisor()->detach($lecturer_id);
        session()->flash('flash_success', "Berhasil menghapus Tugas Akhir ".$thesis->title);
        return redirect()->back();
    }

    public function store($thesis_id, $lecturer_id)
    {
        $thesis = Thesis::find($thesis_id);
        $thesis->supervisor()->detach($lecturer_id);
        session()->flash('flash_success', "Berhasil menghapus Tugas Akhir ".$thesis->title);
        return redirect()->back();
    }
}
