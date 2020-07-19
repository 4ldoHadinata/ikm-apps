@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Berita</h1>
        </div>

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('berita.update', $berita->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <section class="form-group">
                        <label for="judul_berita">Judul Berita</label>
                        <input type="text" class="form-control" name="judul_berita" placeholder="Judul Berita" value="{{ old('judul_berita') ?? $berita->judul_berita }}">
                    </section>
                    <section class="form-group">
                        <label for="isi_berita">Isi Berita</label>
                        <textarea name="isi_berita"rows="10" class="d-block w-100 form-control">{{ old('isi_berita') ?? $berita->isi_berita }}</textarea>
                    </section>
                    <button type="submit" class="btn btn-primary btn-block">
                        Simpan
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection