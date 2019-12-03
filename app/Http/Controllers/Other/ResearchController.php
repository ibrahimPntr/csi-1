<?php

namespace App\Http\Controllers\Other;

use App\Http\Controllers\Controller;
use App\Models\Research;
use App\Models\ResearchSchema;
use App\Models\ResearchMember;
use DB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ResearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = auth()->user();
      $member = DB::select("SELECT research_id FROM research_members where user_id='$user->id'");
      foreach ($member as $g) {
        $a[] = $g->research_id;
      }
      $researches = Research::whereIn('id',$a)->paginate(25);
      $research_schemas = ResearchSchema::pluck('name','id');
      return view('other.researches.index', compact('user','researches','research_schemas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $research_schemas = ResearchSchema::pluck('name','id');
        return view('other.researches.create', compact('research_schemas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Research::$validation_rules);
        $user = auth()->user();

        $researches = new Research();
        $researches->title = $request->title;
        $researches->research_schema_id = $request->research_schema_id;
        $researches->start_at = $request->start_at+2000;
        $researches->fund_amount = $request->fund_amount;
        $researches->proposal_file = $request->proposal_file;
        $researches->report_file = $request->report_file;
        $researches->save();

        $members = new ResearchMember();
        $members->user_id = $user->id;
        $members->research_id = $researches->id;
        $members->position = 0;
        $members->save();

        return redirect()->route('research_members.create', [$researches->id])->withSuccessMessage('Berhasil Menambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Research  $research
     * @return \Illuminate\Http\Response
     */
    public function show(Research $research)
    {
        $research_schemas = ResearchSchema::pluck('name','id');
        return view('other.researches.show', compact('research','research_schemas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Research  $research
     * @return \Illuminate\Http\Response
     */
    public function edit(Research $research)
    {
        $research_schemas = ResearchSchema::pluck('name','id');
        return view('other.researches.edit', compact('research','research_schemas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Research  $research
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Research $research)
    {
      $researchUpdate = Research :: where ('id', $research->id)
      ->update([
          'title'=>$request->input('title'),
          'research_schema_id' => $request->input('research_schema_id'),
          'start_at' => $request->input('start_at')+2000,
          'fund_amount' => $request->input('fund_amount'),
          'proposal_file' => $request->input('proposal_file'),
          'report_file' => $request->input('report_file')
      ]);
      if($researchUpdate){
          return redirect()->route('researches.show',[$research->id])
          ->with('success','Data Penelian terupdate');
      }
      return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Research  $research
     * @return \Illuminate\Http\Response
     */
    public function destroy(Research $research)
    {
      $research = Research::find($research->id);
      $member = ResearchMember::where('research_id', $research->id);
      $member->delete();
      $research->delete();
      Alert::success('Berhasil Menghapus', 'Data Penelitian berhasil dihapus');
      return redirect()->route('researches.index');
    }
}
