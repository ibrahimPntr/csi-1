<?php

namespace App\Http\Controllers\Backend;

use App\Models\CommunityService;
use App\Models\CommunityServiceSchema;
use App\Models\CommunityServiceMember;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class CommunityServiceMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CommunityService $community_service)
    {
      $exist = DB::selectOne("SELECT EXISTS(SELECT * FROM community_service_members WHERE community_service_id='$community_service->id'AND position=0) as exist");
      $a = DB::select("SELECT user_id FROM community_service_members WHERE community_service_id='$community_service->id'");
      $us[] = 1;
      foreach ($a as $b) {
        $us[] = $b->user_id;
      }
      $user = User::whereNotIn('id',$us)->pluck('username','id');
      $position = config('central.position');
      return view('backend.community_service_members.create',compact('exist','community_service','position','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, CommunityServiceMember::$validation_rules);
        foreach ($request->user_id as $user) {
          $members = new CommunityServiceMember();
          $members->user_id = $user;
          $members->community_service_id = $request->community_service_id;
          $members->position = $request->position;
          $members->save();
        }
        return redirect()->route('admin.community_service_members.create', [$members->community_service_id]);
  }

    /**
     * Display the specified resource.
     *
     * @param  \App\CommunityServiceMember  $communityServiceMember
     * @return \Illuminate\Http\Response
     */
    public function show(CommunityService $community_service)
    {
        $community_service_schemas = CommunityServiceSchema::pluck('name','id');
        return view('backend.community_service_members.show', compact('community_service','community_service_schemas'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CommunityServiceMember  $communityServiceMember
     * @return \Illuminate\Http\Response
     */
    public function edit(CommunityService $community_service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CommunityServiceMember  $communityServiceMember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommunityServiceMember $communityServiceMember)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CommunityServiceMember  $communityServiceMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommunityServiceMember $communityServiceMember)
    {
      $communityServiceMember = CommunityServiceMember::find($communityServiceMember->id);
      $communityServiceMember->delete();
      Alert::success('Berhasil Menghapus', 'Data Penelitian berhasil dihapus');
      return redirect()->route('admin.community_service_members.create',[$communityServiceMember->community_service_id]);
    }
}
