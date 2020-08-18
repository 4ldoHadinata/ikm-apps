@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Content Row -->
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
                <select name="jenis_kelamin">
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
                <select name="pendidikan">
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
                <select name="pekerjaan">
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
@endsection