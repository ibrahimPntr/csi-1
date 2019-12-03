@extends('other.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('home'),
        'Pengabdian' => route('community_services.index'),
        'Detail' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn_delete(route('community_services.destroy', [$community_service->id]), $community_service->id, 'icon-trash', 'Hapus Pengabdian', 'Anda yakin akan menghapus pengabdian ini?') !!}
    {!! cui_toolbar_btn(route('community_services.edit', $community_service->id), 'icon-pencil', 'Edit Pengabdian') !!}
    {!! cui_toolbar_btn(route('community_services.index'), 'icon-list', 'List Pengabdian') !!}
    {!! cui_toolbar_btn(route('community_services.create'), 'icon-plus', 'Tambah Pengabdian') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong><i class="fa fa-eye"></i> Detail Pengabdian</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    {{ html()->modelForm($community_service) }}

                    <div class="form-group">
                        <label class="form-label" for="nama">Judul Pengabdian</label>
                        {{ html()->text('title')->class('form-control-plaintext')->id('title')->placeholder('Judul Pengabdian')->readonly() }}
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="nip">Skema yang digunakan</label>
                        <div class="form-control-plaintext">
                          {{ $community_service_schemas[$community_service->community_service_schema_id] }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" class="form-label" for="nidn">Tahun Pelaksanaan</label>
                        {{ html()->text('start_at')->class('form-control-plaintext')->id('start_at')->placeholder('Tahun Pelaksanaan')->readonly() }}
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="nik">Dana Pengabdian</label>
                        {{ html()->text('fund_amount')->class('form-control-plaintext')->id('fund_amount')->placeholder('Dana Pengabdian')->readonly() }}
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="email">File Proposal</label>
                        {{ html()->text('proposal_file')->class('form-control-plaintext')->id('proposal_file')->placeholder('File Proposal')->readonly() }}
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="phone">File Laporan</label>
                        {{ html()->text('report_file')->class('form-control-plaintext')->id('report_file')->placeholder('File Laporan')->readonly() }}
                    </div>

                    <div class="form-group">
                      <label class="form-label" for="member">Anggota Pengabdian</label>
                      <table class="table table-striped">
                          <thead>
                          <tr>
                              <th class="text-center">Posisi</th>
                              <th class="text-center">Username</th>
                              <th class="text-center">Nama</th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach($community_service->community_service_members as $member)
                              <tr>
                                <td class="text-center">
                                  @if($member->position == 0)
                                     <a>Ketua</a>
                                  @else
                                     <a>Anggota</a>
                                  @endif
                                </td>
                                  <td class="text-center">{{ $member->user->username }}</td>
                                  <td class="text-center">{{ $member->user->name }}</td>
                              </tr>
                          @endforeach
                          </tbody>
                      </table>

                    </div>

                    {{ html()->closeModelForm() }}

                </div>

            </div>
        </div>
    </div>
@endsection