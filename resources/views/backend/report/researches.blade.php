@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Penelitian' => route('admin.researches.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.researches.create'), 'icon-plus', 'Tambah Penelitian') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                  <div class="row">
                    <div class="col" align="left">
                      <strong><i class="fa fa-list"></i> List Penelitian</strong>
                    </div>
                    <div class="col" align="right">
                      <a href="{{route ('admin.cetak_penelitian')}}" class="btn btn-success">Export to PDF</a>
                    </div>
                  </div>
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

                    <table class="table table-striped" id="listpenelitian">
                        <thead>
                        <tr>
                            <th class="text-center">Judul Penelitian</th>
                            <th class="text-center">Tahun Pelaksanaan</th>
                            <th class="text-center">Dana</th>
                            <th class="text-center">Ketua Pelaksana</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($researches as $research)
                            <tr>
                                <td class="text-center">{{ $research->title }}</td>
                                <td class="text-center">{{ $research->start_at }}</td>
                                <td class="text-center">{{ $research->fund_amount }}</td>
                                <td class="text-center">{{ $user [$members [$research->id]] }}</td>
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

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
    <script>
    $(document).ready(function() {
      $('#listpenelitian').DataTable( {
        dom: 'Bflrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      } );
    });
    </script>

@endsection
