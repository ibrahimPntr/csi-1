<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Research;
use App\Models\ResearchSchema;
use App\Models\User;
use App\Models\ResearchMember;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
use PDF;

class ResearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $researches = Research::paginate(25);
      $research_schemas = ResearchSchema::pluck('name','id');
      return view('backend.researches.index', compact('researches','research_schemas'));
    }

    public function list()
    {
      $researches = DB::table('researches')->select('*');
        return datatables()->of($researches)
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $research_schemas = ResearchSchema::pluck('name','id');
        return view('backend.researches.create', compact('research_schemas'));
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

        $researches = new Research();
        $researches->title = $request->title;
        $researches->research_schema_id = $request->research_schema_id;
        $researches->start_at = $request->start_at+2000;
        $researches->fund_amount = $request->fund_amount;
        $researches->proposal_file = $request->proposal_file;
        $researches->report_file = $request->report_file;

        $researches->save();
        return redirect()->route('admin.research_members.create', [$researches->id])->withSuccessMessage('Berhasil Menambahkan');
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
        return view('backend.researches.show', compact('research','research_schemas'));
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
        return view('backend.researches.edit', compact('research','research_schemas'));
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
          return redirect()->route('admin.researches.show',[$research->id])
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
      return redirect()->route('admin.researches.index');
    }

    public function report()
    {
      $researches = Research::paginate(25);
      $user = User::pluck('name','id');
      $members = ResearchMember::where('position','0')->pluck('user_id','research_id');
      return view('backend.report.researches', compact('user','researches','members'));
    }

    public function cetak_pdf()
    {
      $researches = Research::paginate(25);
      $user = User::pluck('name','id');
      $members = ResearchMember::where('position','0')->pluck('user_id','research_id');
      $pdf = PDF::loadview('backend.report.researches_pdf',['researches'=>$researches,'user'=>$user,'members'=>$members]);
    	return $pdf->download('laporan-penelitian-pdf');
    }

}
