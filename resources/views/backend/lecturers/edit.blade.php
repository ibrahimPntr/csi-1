@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Dosen' => route('admin.lecturers.index'),
        'Edit' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.lecturers.create'), 'icon-plus', 'Tambah Dosen') !!}
    {!! cui_toolbar_btn(route('admin.lecturers.index'), 'icon-list', 'List Dosen') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                {{ html()->modelForm($lecturer, 'PUT', route('admin.lecturers.update', $lecturer->id))->open() }}

                {{--CARD HEADER --}}
                <div class="card-header">
                    <strong><i class="fa fa-edit"></i>Edit Dosen</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">
                    @include('backend.lecturers._form')
                </div>

                {{-- CARD FOOTER--}}
                <div class="card-footer">
                    <input type="submit" class="btn btn-primary" value="Simpan"/>
                </div>

                {{ html()->closeModelForm() }}

            </div>
        </div>
    </div>
@endsection
