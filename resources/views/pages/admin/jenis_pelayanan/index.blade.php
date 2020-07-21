@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Jenis Pelayanan</h1>
      <a href="{{ route('jenis_pelayanan.create') }}" class="btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Jenis Pelayanan
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
                            <th>Nama Jenis Pelayanan</th>
                            <th>Bidang</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $jenis_pelayanan)
                            <tr>
                                <td>{{ $jenis_pelayanan->id }}</td>
                                <td>{{ $jenis_pelayanan->nama_pelayanan }}</td>
                                <td>{{ $jenis_pelayanan->bidang->nama_bidang }}</td>
                                <td>
                                    <a href="{{ route('jenis_pelayanan.edit', $jenis_pelayanan->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('jenis_pelayanan.destroy', $jenis_pelayanan->id) }}" method="post" class="d-inline">
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