@extends('other.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('home'),
        'Penelitian' => route('researches.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('researches.create'), 'icon-plus', 'Tambah Penelitian') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong><i class="fa fa-list"></i> List Penelitian</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <div class="row justify-content-end">
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $researches->links() }}
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">Judul Penelitian</th>
                            <th class="text-center">Tahun Pelaksanaan</th>
                            <th class="text-center">Skema yang digunakan</th>
                            <th class="text-center">Jumlah Anggota</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($researches as $research)
                            <tr>
                                <td class="text-center">{{ $research->title }}</td>
                                <td class="text-center">{{ $research->start_at }}</td>
                                <td class="text-center">{{ $research_schemas[$research->research_schema_id] }}</td>
                                <td class="text-center">{{ $research->research_members->count() }}</td>
                                <td class="text-center">
                                    {!! cui_btn_view(route('researches.show', [$research->id])) !!}
                                    <?php $tes = $research->research_members->where('user_id',$user->id)->where('position',0);

                                    if($tes->toArray()!=null) {?>
                                    {!! cui_btn_edit(route('researches.edit', [$research->id])) !!}
                                    <a href="{{ route('research_members.show', [$research->id]) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="nav-icon icon-people"> </i>
                                    </a>
                                    {!! cui_btn_delete(route('researches.destroy', [$research->id]), "Anda yakin akan menghapus data penelitian ini?") !!}
                                  <?php } ?>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="row justify-content-end">
                        <div class="col-md-6 text-right">

                        </div>
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $researches->links() }}
                            </div>
                        </div>
                    </div>

                </div><!--card-body-->


            </div><!--card-->
        </div><!--col-->
    </div><!--row-->

@endsection
