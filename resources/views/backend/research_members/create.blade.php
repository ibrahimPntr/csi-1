@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Penelitian' => route('admin.researches.index'),
        'Tambah' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.researches.edit', $research->id), 'icon-pencil', 'Edit Penelitian') !!}
    {!! cui_toolbar_btn(route('admin.research_members.show',$research->id), 'icon-list', 'Detail Penelitian') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        {{ html()->form('POST', route('admin.research_members.store'))->open() }}

                        {{-- CARD HEADER--}}
                        <div class="card-header">
                            <i class="fa fa-edit"></i> <strong>Tambah Anggota</strong>
                        </div>

                        {{-- CARD BODY--}}
                        <div class="card-body">
                            @include('backend.research_members._form')
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

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong><i class="fa fa-eye"></i> Anggota Penelitian "{{$research->title}}"</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">
                  <table class="table table-striped" id="tablemembers">
                      <thead>
                      <tr>
                          <th class="text-center">Username</th>
                          <th class="text-center">Nama</th>
                          <th class="text-center">Posisi</th>
                          <th class="text-center">Aksi</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($research->research_members as $member)
                          <tr>
                              <td class="text-center">{{ $member->user->username }}</td>
                              <td class="text-center">{{ $member->user->name }}</td>
                              <td class="text-center">
                                @if($member->position == 0)
                                   <a>Ketua</a>
                                @else
                                   <a>Anggota</a>
                                @endif
                              </td>
                              <td class="text-center">
                                  {!! cui_btn_delete(route('admin.research_members.destroy', [$member->id]), "Anda yakin akan menghapus data penelitian ini?") !!}
                              </td>
                          </tr>
                      @endforeach
                      </tbody>
                  </table>

                </div>

            </div>
        </div>
    </div>
    <script src="//code.jquery.com/jquery-2.2.0.min.js"></script>

    <script>
    $(document).ready(function() {
      var x = "<?php echo $exist->exist; ?>";
      console.log(x);
      if(x==0){
        $('#user_id').select2({
          placeholder: "Pilih Nama...",
          minimumInputLength: 1,
          maximumSelectionLength: 1,
        });
      }else{
        $('#user_id').select2({
          placeholder: "Pilih Nama...",
          minimumInputLength: 1,
        });
      }
      $('#tablemembers').DataTable();
    });
    </script>

@endsection
