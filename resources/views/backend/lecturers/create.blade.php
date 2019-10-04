@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Dosen' => route('admin.lecturers.index'),
        'Edit' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.lecturers.index'), 'icon-list', 'List Dosen') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{ html()->form('POST', route('admin.lecturers.store'))->open() }}

                {{-- CARD HEADER--}}
                <div class="card-header">
                    Tambah Dosen
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">
                    @include('backend.lecturers._form')
                </div>

                {{--CARD FOOTER--}}
                <div class="card-footer">
                    <input type="submit" value="Simpan" class="btn btn-primary"/>
                </div>

                {{ html()->form()->close() }}
            </div>

        </div>
    </div>
@endsection
