@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Hasil Per Pelayanan</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Pelayanan</th>
                            <th>Nilai Akhir</th>
                            <th>Hasil</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($hasil_per_pelayanan as $hasil)
                            <tr>
                                <td>{{ $hasil->nama_pelayanan }}</td>
                                <td>{{ $hasil->nilai_akhir }}</td>
                                <td>{{ $hasil->hasil }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">
                                    Data Kosong
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Page Heading 2 -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Rincian Per Unsur</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Pelayanan</th>
                            <th>Nilai Akhir</th>
                            <th>Jumlah Sampel</th>
                            <th>Soal (Unsur)</th>
                            <th>Hasil</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($hasil_per_unsur as $hasil2)
                            <tr>
                                <td>{{ $hasil2->nama_pelayanan }}</td>
                                <td>{{ $hasil2->jumlah_sampel }}</td>
                                <td>{{ $hasil2->nilai_akhir }}</td>
                                <td>{{ $hasil2->soal }}</td>
                                <td>{{ $hasil2->hasil }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">
                                    Data Kosong
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection