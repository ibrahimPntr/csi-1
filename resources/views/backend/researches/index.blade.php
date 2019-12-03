@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Penelitian' => route('admin.researches.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.researches.create'), 'icon-plus', 'Tambah Penelitian') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong><i class="fa fa-list"></i> List Penelitian</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <div class="row justify-content-end">
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $researches->links() }}
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped" id="tablepenelitian">
                        <thead>
                        <tr>
                            <th class="text-center">Judul Penelitian</th>
                            <th class="text-center">Tahun Pelaksanaan</th>
                            <th class="text-center">Skema yang digunakan</th>
                            <th class="text-center">Jumlah Anggota</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($researches as $research)
                            <tr>
                                <td class="text-center">{{ $research->title }}</td>
                                <td class="text-center">{{ $research->start_at }}</td>
                                <td class="text-center">{{ $research_schemas[$research->research_schema_id] }}</td>
                                <td class="text-center">{{ $research->research_members->count() }}</td>
                                <td class="text-center">
                                    {!! cui_btn_view(route('admin.researches.show', [$research->id])) !!}
                                    {!! cui_btn_edit(route('admin.researches.edit', [$research->id])) !!}
                                    <a href="{{ route('admin.research_members.show', [$research->id]) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="nav-icon icon-people"> </i>
                                    </a>
                                    {!! cui_btn_delete(route('admin.researches.destroy', [$research->id]), "Anda yakin akan menghapus data penelitian ini?") !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="row justify-content-end">
                        <div class="col-md-6 text-right">

                        </div>
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $researches->links() }}
                            </div>
                        </div>
                    </div>

                </div><!--card-body-->


            </div><!--card-->
        </div><!--col-->
    </div><!--row-->

    <script src="//code.jquery.com/jquery-2.2.0.min.js"></script>
    <script>
    $(document).ready(function() {
      $('#tablepenelitian').DataTable();
    });
    </script>

@endsection
