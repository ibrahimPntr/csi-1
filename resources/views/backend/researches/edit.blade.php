@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Penelitian' => route('admin.researches.index'),
        'Edit' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.researches.create'), 'icon-plus', 'Tambah Penelitian') !!}
    {!! cui_toolbar_btn(route('admin.researches.index'), 'icon-list', 'List Penelitian') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                {{ html()->modelForm($research, 'PUT', route('admin.researches.update', $research->id))->open() }}

                {{--CARD HEADER --}}
                <div class="card-header">
                    <strong><i class="fa fa-edit"></i>Edit Penelitian</strong>
                </div>

                {{-- CARD BODY--}}
                <?php $research->start_at=$research->start_at-2000?>
                <div class="card-body">
                    @include('backend.researches._form')
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
