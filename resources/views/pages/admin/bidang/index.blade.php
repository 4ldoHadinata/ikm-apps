@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Bidang</h1>
      <a href="{{ route('bidang.create') }}" class="btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Bidang
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
                            <th>Nama Bidang</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $bidang)
                            <tr>
                                <td>{{ $bidang->id }}</td>
                                <td>{{ $bidang->nama_bidang }}</td>
                                <td>
                                    <a href="{{ route('bidang.edit', $bidang->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('bidang.destroy', $bidang->id) }}" method="post" class="d-inline">
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