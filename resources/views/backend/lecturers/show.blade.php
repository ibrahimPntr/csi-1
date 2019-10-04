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
    {!! cui_toolbar_btn(route('admin.lecturers.index'), 'icon-list', 'List Dosen') !!}
    {!! cui_toolbar_btn(route('admin.lecturers.create'), 'icon-plus', 'Tambah Dosen') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    Dosen
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    {{ Form::model($lecturer, []) }}

                    <div class="form-group">
                        <label for="name"><strong>Nama</strong></label>
                        {{ Form::text('name', null, ['class' => 'form-control-plaintext', 'id' => 'name', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="nip"><strong>NIP</strong></label>
                        {{ Form::text('nip', null, ['class' => 'form-control-plaintext', 'id' => 'nip', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="nip"><strong>NIDN</strong></label>
                        {{ Form::text('nidn', null, ['class' => 'form-control-plaintext', 'id' => 'nidn', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="nik"><strong>NIK</strong></label>
                        {{ Form::text('nik', null, ['class' => 'form-control-plaintext', 'id' => 'nik', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="birthplace"><strong>Tempat Lahir</strong></label>
                        {{ Form::text('birthplace', null, ['class' => 'form-control-plaintext', 'id' => 'tempat_lahir', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="birthdate"><strong>Tanggal Lahir</strong></label>
                        {{ Form::input('date', 'birthdate', null, ['class' => 'form-control-plaintext', 'id' => 'nip', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="email"><strong>Email</strong></label>
                        {{ Form::text('email', null, ['class' => 'form-control-plaintext', 'id' => 'email', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="phone"><strong>No. HP</strong></label>
                        {{ Form::text('phone', null, ['class' => 'form-control-plaintext', 'id' => 'nohp', 'readonly' => 'readonly']) }}
                    </div>

                    {{ Form::close() }}

                </div>

                {{-- CARD FOOTER --}}
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
@endsection
