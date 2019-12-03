@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Pengabdian' => route('admin.community_services.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.community_services.create'), 'icon-plus', 'Tambah Pengabdian') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                  <div class="row">
                    <div class="col" align="left">
                      <strong><i class="fa fa-list"></i> List Pengabdian</strong>
                    </div>
                    <div class="col" align="right">
                      <a href="{{route ('admin.cetak_pengabdian')}}" class="btn btn-success">Export to PDF</a>
                    </div>
                  </div>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <div class="row justify-content-end">
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $community_services->links() }}
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">Judul Pengabdian</th>
                            <th class="text-center">Tanggal Pelaksanaan</th>
                            <th class="text-center">Partner</th>
                            <th class="text-center">Dana Pengabdian</th>
                            <th class="text-center">Ketua Pelaksana</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($community_services as $cs)
                            <tr>
                                <td class="text-center">{{ $cs->title }}</td>
                                <td class="text-center">{{ $cs->start_at }}</td>
                                <td class="text-center">{{ $cs->partner }}</td>
                                <td class="text-center">{{ $cs->fund_amount }}</td>
                                <td class="text-center">{{ $user [$members [$cs->id]] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="row justify-content-end">
                        <div class="col-md-6 text-right">

                        </div>
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $community_services->links() }}
                            </div>
                        </div>
                    </div>

                </div><!--card-body-->


            </div><!--card-->
        </div><!--col-->
    </div><!--row-->

@endsection
