@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Dosen' => route('admin.lecturers.index'),
        'Detail' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn_delete(route('admin.lecturers.destroy', [$lecturer->id]), $lecturer->id, 'icon-trash', 'Hapus Dosen', 'Anda yakin akan menghapus dosen ini?') !!}
    {!! cui_toolbar_btn(route('admin.lecturers.edit', $lecturer->id), 'icon-pencil', 'Edit Dosen') !!}
    {!! cui_toolbar_btn(route('admin.lecturers.index'), 'icon-list', 'List Dosen') !!}
    {!! cui_toolbar_btn(route('admin.lecturers.create'), 'icon-plus', 'Tambah Dosen') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong><i class="fa fa-eye"></i> Detail Dosen</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    {{ html()->modelForm($lecturer) }}

                    <div class="form-group">
                        <label class="form-label" for="nama">Nama</label>
                        {{ html()->text('name')->class('form-control-plaintext')->id('name')->placeholder('Nama Dosen')->readonly() }}
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="nip">NIP</label>
                        {{ html()->text('nip')->class('form-control-plaintext')->id('nip')->placeholder('NIP Dosen')->readonly() }}
                    </div>

                    <div class="form-group">
                        <label class="form-label" class="form-label" for="nidn">NIDN</label>
                        {{ html()->text('nidn')->class('form-control-plaintext')->id('nidn')->placeholder('NIDN Dosen')->readonly() }}
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="nik">NIK</label>
                        {{ html()->text('nik')->class('form-control-plaintext')->id('nik')->placeholder('NIK Dosen')->readonly() }}
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="tempat_lahir">Tempat Lahir</label>
                                {{ html()->text('birthplace')->class('form-control-plaintext')->id('birthplace')->placeholder('Tempat Lahir Dosen')->readonly() }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="tempat_lahir">Tanggal Lahir</label>
                                {{ html()->text('birthdate')->class('form-control-plaintext')->id('birthdate')->placeholder('Tanggal Lahir')->readonly() }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="email">email</label>
                        {{ html()->text('email')->class('form-control-plaintext')->id('email')->placeholder('Email Dosen')->readonly() }}
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="phone">No. HP</label>
                        {{ html()->text('phone')->class('form-control-plaintext')->id('phone')->placeholder('No Telpon Dosen')->readonly() }}
                    </div>

                    {{ html()->closeModelForm() }}

                </div>

            </div>
        </div>
    </div>
@endsection
