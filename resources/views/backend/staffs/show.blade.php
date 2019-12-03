@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Tendik' => route('admin.staffs.index'),
        'Detail' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn_delete(route('admin.staffs.destroy', [$staff->id]), $staff->id, 'icon-trash', 'Hapus Tendik', 'Anda yakin akan menghapus tendik ini?') !!}
    {!! cui_toolbar_btn(route('admin.staffs.edit', $staff->id), 'icon-pencil', 'Edit Tendik') !!}
    {!! cui_toolbar_btn(route('admin.staffs.index'), 'icon-list', 'List Tendik') !!}
    {!! cui_toolbar_btn(route('admin.staffs.create'), 'icon-plus', 'Tambah Tendik') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">

                        {{ html()->modelForm($staff) }}

                        {{-- CARD HEADER--}}
                        <div class="card-header">
                            <i class="fa fa-edit"></i> <strong>Detail Tendik</strong>
                        </div>

                        {{-- CARD BODY--}}
                        <div class="card-body">
                            @include('backend.staffs._detail')
                        </div>

                        {{--CARD FOOTER--}}
                        <div class="card-footer">
                        </div>

                        {{ html()->closeModelForm() }}

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        {{-- CARD HEADER--}}
                        <div class="card-header">
                            <i class="fa fa-edit"></i> <strong>Foto Tendik</strong>
                        </div>

                        {{-- CARD BODY--}}
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{ asset($staff->getPhotoPath()) }}" class="img-fluid rounded" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
