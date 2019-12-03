@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Pengabdian' => route('admin.community_services.index'),
        'Tambah' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.community_services.index'), 'icon-list', 'List Pengabdian') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">

                        {{ html()->form('POST', route('admin.community_services.store'))->open() }}

                        {{-- CARD HEADER--}}
                        <div class="card-header">
                            <i class="fa fa-edit"></i> <strong>Tambah Pengabdian</strong>
                        </div>

                        {{-- CARD BODY--}}
                        <div class="card-body">
                            @include('backend.community_services._form')
                        </div>

                        {{--CARD FOOTER--}}
                        <div class="card-footer">
                            <input type="submit" value="Simpan" class="btn btn-primary"/>
                        </div>

                        {{ html()->form()->close() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
