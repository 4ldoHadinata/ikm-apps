@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Bidang</h1>
        </div>

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('bidang.store') }}" method="post">
                    @csrf
                    <section class="form-group">
                        <label for="nama_bidang">Nama Bidang</label>
                        <input type="text" class="form-control" name="nama_bidang" placeholder="Nama Bidang" value="{{ old('nama_bidang') }}">
                    </section>
                    <button type="submit" class="btn btn-primary btn-block">
                        Simpan
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection