@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Jenis Pelayanan</h1>
        </div>

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('jenis_pelayanan.store') }}" method="post">
                    @csrf
                    <section class="form-group">
                        <label for="nama_pelayanan">Nama Pelayanan</label>
                        <input type="text" class="form-control" name="nama_pelayanan" placeholder="Nama Pelayanan" value="{{ old('nama_pelayanan') }}">
                    </section>
                    <section class="form-group">
                        <label for="id_bidang">Bidang</label>
                        <select name="id_bidang" required class="form-control">
                            <option value="">Pilih Bidang</option>
                            @foreach ($data as $bidang)
                                <option value="{{ $bidang->id }}">
                                    {{ $bidang->nama_bidang }}
                                </option>
                            @endforeach
                        </select>
                    </section>
                    <button type="submit" class="btn btn-primary btn-block">
                        Simpan
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection