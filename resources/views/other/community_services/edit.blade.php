@extends('other.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('home'),
        'Pengabdian' => route('community_services.index'),
        'Edit' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('community_services.create'), 'icon-plus', 'Tambah Pengabdian') !!}
    {!! cui_toolbar_btn(route('community_services.index'), 'icon-list', 'List Pengabdian') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                {{ html()->modelForm($community_service, 'PUT', route('community_services.update', $community_service->id))->open() }}

                {{--CARD HEADER --}}
                <div class="card-header">
                    <strong><i class="fa fa-edit"></i>Edit Pengabdian</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">
                    @include('other.community_services._form')
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
