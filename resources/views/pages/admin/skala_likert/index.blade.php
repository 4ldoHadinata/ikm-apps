@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800"> Skala Likert (Input Responden)</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Pelayanan</th>
                            <th>Nilai</th>
                            <th>Soal</th>
                            <th>Responden</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $skala_likert)
                            <tr>
                                <td>{{ $skala_likert->id }}</td>
                                <td>{{ $skala_likert->pelayanan->nama_pelayanan }}</td>
                                <td>{{ $skala_likert->nilai }}</td>
                                <td>{{ $skala_likert->kuesioner->soal }}</td>
                                <td>{{ $skala_likert->responden->nama }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">
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