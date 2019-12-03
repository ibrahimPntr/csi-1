<?php

namespace App\Http\Controllers\Other;

use App\Http\Controllers\Controller;
use App\Models\ResearchMember;
use App\Models\Research;
use App\Models\ResearchSchema;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class ResearchMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Research $research)
    {
      $exist = DB::selectOne("SELECT EXISTS(SELECT * FROM research_members WHERE research_id='$research->id'AND position=0) as exist");
      $a = DB::select("SELECT user_id FROM research_members WHERE research_id='$research->id'");
      $us[] = 1;
      foreach ($a as $b) {
        $us[] = $b->user_id;
      }
      $user = User::whereNotIn('id',$us)->pluck('username','id');
      $position = config('central.position');
      return view('other.research_members.create',compact('exist','research','position','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ResearchMember::$validation_rules);
        foreach ($request->user_id as $user) {
          $members = new ResearchMember();
          $members->user_id = $user;
          $members->research_id = $request->research_id;
          $members->position = $request->position;
          $members->save();
        }
        return redirect()->route('admin.research_members.create', [$members->research_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ResearchMember  $researchMember
     * @return \Illuminate\Http\Response
     */
    public function show(Research $research)
    {
        $research_schemas = ResearchSchema::pluck('name','id');
        return view('other.research_members.show', compact('research','research_schemas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ResearchMember  $researchMember
     * @return \Illuminate\Http\Response
     */
    public function edit(Research $research)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ResearchMember  $researchMember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResearchMember $researchMember)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ResearchMember  $researchMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResearchMember $researchMember)
    {
      $researchMember = ResearchMember::find($researchMember->id);
      $researchMember->delete();
      Alert::success('Berhasil Menghapus', 'Data Penelitian berhasil dihapus');
      return redirect()->route('admin.research_members.create',[$researchMember->research_id]);
    }
}
