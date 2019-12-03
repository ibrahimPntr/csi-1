<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--    Styles--}}
    @stack('before-styles')
    <link href="{{ mix('css/backend.css') }}" rel="stylesheet" >
    @stack('after-styles')
    <title>Laporan Penelitian</title>
  </head>
  <body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Penelitian</h4>
	</center>

	<table class='table table-bordered'>
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
  {{--Scripts--}}
  @stack('before-scripts')
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  @include('sweetalert::alert')
  <script src="{{ asset('js/manifest.js') }}"></script>
  <script src="{{ asset('js/vendor.js') }}"></script>
  <script src="{{ asset('js/backend.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
  @stack('after-scripts')

  @isset(Auth::user()->id)

  @endisset
  @yield('javascript')
</body>
</html>
