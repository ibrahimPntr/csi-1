@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Logbook TA' => route('admin.thesis-logbooks.index',[$thesis_id]),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.thesis-logbooks.create',[$thesis_id]), 'icon-plus', 'Tambah Logbook TA') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong><i class="fa fa-list"></i> List Logbook TA</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <div class="row justify-content-end">
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $theses->links() }}
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">Topik</th>
                            <th class="text-center">Nama Mahasiswa</th>
                            <th class="text-center">Judul</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($theses as $thesis)
                            <tr>
                                <td>{{ $thesis->thesisTopic->name }}</td>
                                <td class="text-center">{{ $thesis->student->name }}</td>
                                <td class="text-center">{{ $thesis->title }}</td>
                                <td class="text-center">{{ $thesis->status }}</td>
                                <td class="text-center">
                                    {!! cui_btn_view(route('admin.theses.show', [$thesis->id])) !!}
                                    {!! cui_btn_edit(route('admin.theses.edit', [$thesis->id])) !!}
                                    {!! cui_btn_delete(route('admin.theses.destroy', [$thesis->id]), "Anda yakin akan menghapus data tugas akhir ini?") !!}
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
                                {{ $theses->links() }}
                            </div>
                        </div>
                    </div>

                </div><!--card-body-->


            </div><!--card-->
        </div><!--col-->
    </div><!--row-->

@endsection
