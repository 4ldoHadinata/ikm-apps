@extends('layouts.app')

@push('style')
    <style>
        .bg-green {
            background-color: #00C974;
        }
    </style>
@endpush

@section('content')
<div class="container-fluid bg-green pt-4 pb-4">

    <!-- Content Row -->
    <h1 class="text-center text-white">IKM Apps</h1>
    <h5 class="text-center text-white mb-4">Selamat datang di halaman IKM Apps, silahkan mengisi data-data Anda terlebih dahulu kemudian melanjutkan ke halaman selanjutnya untuk mengisi review terhadap layanan-layanan kami.</h5>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('respond') }}" method="post">
                @csrf
                <section class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{ old('nama') }}">
                </section>
                <section class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" name="nik" placeholder="NIK" value="{{ old('nik') }}">
                </section>
                <section class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option value="laki-laki">Laki-Laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </section>
                <section class="form-group">
                    <label for="usia">Usia</label>
                    <input type="number" class="form-control" name="usia" placeholder="Usia" value="{{ old('usia') }}">
                </section>
                <section class="form-group">
                    <label for="pendidikan">Pendidikan</label>
                    <select name="pendidikan" class="form-control">
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                    </select>
                </section>
                <section class="form-group">
                    <label for="pekerjaan">Pekerjaan</label>
                    <select name="pekerjaan" class="form-control">
                        <option value="PNS">PNS</option>
                        <option value="TNI">TNI</option>
                        <option value="POLRI">POLRI</option>
                        <option value="SWASTA">SWASTA</option>
                        <option value="WIRAUSAHA">WIRAUSAHA</option>
                    </select>
                </section>
                <button type="submit" class="btn btn-primary btn-block">
                    Lanjut
                </button>
            </form>
        </div>
    </div>

</div>
@endsection