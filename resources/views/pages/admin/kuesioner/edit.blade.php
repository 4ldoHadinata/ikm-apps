@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Soal</h1>
        </div>

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('kuesioner.update', $kuesioner->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <section class="form-group">
                        <label for="soal">Soal</label>
                        <textarea name="soal"rows="10" class="d-block w-100 form-control">{{ old('soal') ?? $kuesioner->soal }}</textarea>
                    </section>
                    <button type="submit" class="btn btn-primary btn-block">
                        Simpan
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection