@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Kuesioner</h1>
      <a href="{{ route('kuesioner.create') }}" class="btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Soal
      </a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Soal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $kuesioner)
                            <tr>
                                <td>{{ $kuesioner->id }}</td>
                                <td>{{ $kuesioner->soal }}</td>
                                <td>
                                    <a href="{{ route('kuesioner.edit', $kuesioner->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('kuesioner.destroy', $kuesioner->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
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