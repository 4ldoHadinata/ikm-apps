@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Admin</h1>
        </div>

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('admin.store') }}" method="post">
                    @csrf
                    <section class="form-group">
                        <label for="name">Nama Admin</label>
                        <input type="text" class="form-control" name="name" placeholder="Nama Admin" value="{{ old('name') }}">
                    </section>
                    <section class="form-group">
                        <label for="email">E-Mail</label>
                        <input type="email" class="form-control" name="email" placeholder="E-Mail" value="{{ old('email') }}">
                    </section>
                    <section class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </section>
                    <button type="submit" class="btn btn-primary btn-block">
                        Simpan
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection