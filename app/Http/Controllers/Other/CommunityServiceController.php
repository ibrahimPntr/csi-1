<?php

namespace App\Http\Controllers\Other;

use App\Models\CommunityService;
use App\Models\CommunityServiceSchema;
use App\Models\CommunityServiceMember;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class CommunityServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = auth()->user();
      $member = DB::select("SELECT community_service_id FROM community_service_members where user_id='$user->id'");
      foreach ($member as $g) {
        $a[] = $g->community_service_id;
      }
      $community_services = CommunityService::whereIn('id',$a)->paginate(25);
      $community_service_schemas = CommunityServiceSchema::pluck('name','id');
      return view('other.community_services.index', compact('community_services','community_service_schemas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $community_service_schemas = CommunityServiceSchema::pluck('name','id');
      return view('other.community_services.create', compact('community_service_schemas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, CommunityService::$validation_rules);
      $user = auth()->user();

      $community_services = new CommunityService();
      $community_services->title = $request->title;
      $community_services->community_service_schema_id = $request->community_service_schema_id;
      $community_services->partner = $request->partner;
      $community_services->start_at = $request->start_at;
      $community_services->fund_amount = $request->fund_amount;
      $community_services->proposal_file = $request->proposal_file;
      $community_services->report_file = $request->report_file;
      $community_services->save();

      $members = new CommunityServiceMember();
      $members->user_id = $user->id;
      $members->community_service_id = $community_services->id;
      $members->position = 0;
      $members->save();

      return redirect()->route('community_service_members.show', [$community_services->id])->withSuccessMessage('Berhasil Menambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CommunityService  $communityService
     * @return \Illuminate\Http\Response
     */
    public function show(CommunityService $community_service)
    {
      $community_service_schemas = CommunityServiceSchema::pluck('name','id');
      return view('other.community_services.show', compact('community_service','community_service_schemas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CommunityService  $communityService
     * @return \Illuminate\Http\Response
     */
    public function edit(CommunityService $community_service)
    {
      $community_service_schemas = CommunityServiceSchema::pluck('name','id');
      return view('other.community_services.edit', compact('community_service','community_service_schemas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CommunityService  $communityService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommunityService $community_service)
    {
      $community_serviceUpdate = CommunityService :: where ('id', $community_service->id)
      ->update([
          'title'=>$request->input('title'),
          'community_service_schema_id' => $request->input('community_service_schema_id'),
          'start_at' => $request->input('start_at'),
          'partner' => $request->input('partner'),
          'fund_amount' => $request->input('fund_amount'),
          'proposal_file' => $request->input('proposal_file'),
          'report_file' => $request->input('report_file')
      ]);
      if($community_serviceUpdate){
          return redirect()->route('community_services.show',[$community_service->id])
          ->with('success','Data Penelian terupdate');
      }
      return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CommunityService  $communityService
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommunityService $communityService)
    {
        $communityService = CommunityService::find($communityService->id);
        $member = CommunityServiceMember::where('community_service_id', $communityService->id);
        $member->delete();
        $communityService->delete();
        Alert::success('Berhasil Menghapus', 'Data Pengabdian berhasil dihapus');
        return redirect()->route('community_services.index');
    }
}
