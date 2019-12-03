@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Mahasiswa' => route('admin.students.index'),
        'Edit' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.students.create'), 'icon-plus', 'Tambah Mahasiswa') !!}
    {!! cui_toolbar_btn(route('admin.students.index'), 'icon-list', 'List Mahasiswa') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">

                        {{ html()->modelForm($student, 'PUT', route('admin.students.update', $student->id))->acceptsFiles()->open() }}

                        {{--CARD HEADER --}}
                        <div class="card-header">
                            <strong><i class="fa fa-edit"></i>Edit Mahasiswa</strong>
                        </div>

                        {{-- CARD BODY--}}
                        <div class="card-body">
                            @include('backend.students._form')
                        </div>

                        {{-- CARD FOOTER--}}
                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Simpan"/>
                        </div>

                        {{ html()->closeModelForm() }}
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        {{-- CARD HEADER--}}
                        <div class="card-header">
                            <i class="fa fa-edit"></i> <strong>Foto Dosen</strong>
                        </div>

                        {{-- CARD BODY--}}
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{ asset($student->getPhotoPath()) }}" class="img-fluid rounded" alt="...">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
