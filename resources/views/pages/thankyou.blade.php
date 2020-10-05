@extends('layouts.ikm')

@push('style')
    <style>
        .bg-green {
            background-color: #2EA3F2;
        }
        .thankyou {
            height: 90vh;
        }
    </style>
@endpush

@section('content')
<div class="container-fluid bg-green pt-4 pb-4">

    <!-- Content Row -->
    <div class="thankyou d-flex align-items-center text-white">
        <div class="col text-center">
            <h1>Terima Kasih</h1>
            <p>
                Terima kasih telah mengisi kuesioner kami.
                <br>
                Dengan ini, Anda turut membantu kami <br> untuk menjadi lebih baik.
                <br>
                Silakan kembali ke halaman utama atau <br> silakan mengunjungi website kami.
            </p>
            <a href="{{ route('home') }}" class="btn btn-primary mt-3 mb-3 px-5">
                Kembali
            </a>
            <br>
            <span>Atau</span>
            <br>
            <a href="https://kemuning.palembang.go.id/" class="btn btn-primary mt-3 px-5">
                Website Kami
            </a>
        </div>
    </div>

</div>
@endsection