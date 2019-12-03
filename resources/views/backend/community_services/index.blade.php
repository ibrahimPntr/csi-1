@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Pengabdian' => route('admin.community_services.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.community_services.create'), 'icon-plus', 'Tambah Pengabdian') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong><i class="fa fa-list"></i> List Pengabdian</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <div class="row justify-content-end">
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $community_services->links() }}
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped" id="tablepengabdian">
                        <thead>
                        <tr>
                            <th class="text-center">Judul Pengabdian</th>
                            <th class="text-center">Tanggal Pelaksanaan</th>
                            <th class="text-center">Skema yang digunakan</th>
                            <th class="text-center">Jumlah Anggota</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($community_services as $cs)
                            <tr>
                                <td class="text-center">{{ $cs->title }}</td>
                                <td class="text-center">{{ $cs->start_at }}</td>
                                <td class="text-center">{{ $community_service_schemas[$cs->community_service_schema_id] }}</td>
                                <td class="text-center">{{ $cs->community_service_members->count() }}</td>
                                <td class="text-center">
                                    {!! cui_btn_view(route('admin.community_services.show', [$cs->id])) !!}
                                    {!! cui_btn_edit(route('admin.community_services.edit', [$cs->id])) !!}
                                    <a href="{{ route('admin.community_service_members.show', [$cs->id]) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="nav-icon icon-people"> </i>
                                    </a>
                                    {!! cui_btn_delete(route('admin.community_services.destroy', [$cs->id]), "Anda yakin akan menghapus data pengabdian ini?") !!}
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
                                {{ $community_services->links() }}
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
      $('#tablepengabdian').DataTable();
    });
    </script>
@endsection
