@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Penelitian' => route('admin.researches.index'),
        'Anggota Penelitian' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.researches.edit', $research->id), 'icon-pencil', 'Edit Penelitian') !!}
    {!! cui_toolbar_btn(route('admin.researches.index'), 'icon-list', 'List Penelitian') !!}
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">

            {{-- CARD HEADER--}}
            <div class="card-header">
                <strong><i class="fa fa-eye"></i> Detail Penelitian</strong>
            </div>

            {{-- CARD BODY--}}
            <div class="card-body">

                {{ html()->modelForm($research) }}

                <div class="form-group">
                    <label class="form-label" for="nama">Judul Penelitian</label>
                    {{ html()->text('title')->class('form-control-plaintext')->id('title')->placeholder('Judul Penelitian')->readonly() }}
                </div>

                <div class="form-group">
                    <label class="form-label" for="nip">Skema yang digunakan</label>
                    <div class="form-control-plaintext">
                      {{ $research_schemas[$research->research_schema_id] }}
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" class="form-label" for="nidn">Tahun Pelaksanaan</label>
                    {{ html()->text('start_at')->class('form-control-plaintext')->id('start_at')->placeholder('Tahun Pelaksanaan')->readonly() }}
                </div>

                <div class="form-group">
                    <label class="form-label" for="nik">Dana Penelitian</label>
                    {{ html()->text('fund_amount')->class('form-control-plaintext')->id('fund_amount')->placeholder('Dana Penelitian')->readonly() }}
                </div>

                <div class="form-group">
                    <label class="form-label" for="email">File Proposal</label>
                    {{ html()->text('proposal_file')->class('form-control-plaintext')->id('proposal_file')->placeholder('File Proposal')->readonly() }}
                </div>

                <div class="form-group">
                    <label class="form-label" for="phone">File Laporan</label>
                    {{ html()->text('report_file')->class('form-control-plaintext')->id('report_file')->placeholder('File Laporan')->readonly() }}
                </div>

                {{ html()->closeModelForm() }}

            </div>

        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">

            {{-- CARD HEADER--}}
            <div class="card-header">
                <strong><i class="fa fa-eye"></i> Anggota Penelitian "{{$research->title}}"</strong>
            </div>

            {{-- CARD BODY--}}
            <div class="card-body">
              {!! cui_toolbar_btn(route('admin.research_members.create',[$research->id]), 'icon-plus', 'Tambah Anggota') !!}
              <table class="table table-striped" id="tablemembers">
                  <thead>
                  <tr>
                      <th class="text-center">Username</th>
                      <th class="text-center">Nama</th>
                      <th class="text-center">Posisi</th>
                      <th class="text-center">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($research->research_members as $member)
                      <tr>
                          <td class="text-center">{{ $member->user->username }}</td>
                          <td class="text-center">{{ $member->user->name }}</td>
                          <td class="text-center">
                            @if($member->position == 0)
                               <a>Ketua</a>
                            @else
                               <a>Anggota</a>
                            @endif
                          </td>
                          <td class="text-center">
                              {!! cui_btn_delete(route('admin.research_members.destroy', [$member->id]), "Anda yakin akan menghapus data penelitian ini?") !!}
                          </td>
                      </tr>
                  @endforeach
                  </tbody>
              </table>

            </div>

        </div>
    </div>
</div>

<script src="//code.jquery.com/jquery-2.2.0.min.js"></script>
<script>
$(document).ready(function() {
  $('#tablemembers').DataTable();
});
</script>

@endsection