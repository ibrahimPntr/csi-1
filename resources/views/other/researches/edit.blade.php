@extends('other.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('home'),
        'Penelitian' => route('researches.index'),
        'Edit' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('researches.create'), 'icon-plus', 'Tambah Penelitian') !!}
    {!! cui_toolbar_btn(route('researches.index'), 'icon-list', 'List Penelitian') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                {{ html()->modelForm($research, 'PUT', route('researches.update', $research->id))->open() }}

                {{--CARD HEADER --}}
                <div class="card-header">
                    <strong><i class="fa fa-edit"></i>Edit Penelitian</strong>
                </div>

                {{-- CARD BODY--}}
                <?php $research->start_at=$research->start_at-2000?>
                <div class="card-body">
                    @include('other.researches._form')
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
