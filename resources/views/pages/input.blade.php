@extends('layouts.ikm')

@push('style')
    <style>
        .thead-green {
            background: #2ea3f2;
            color: #FFFFFF;
        }
        body {
            background: #2ea3f2;
        }
        .bg-green {
            /*background-color: #00C974;*/
            background-color : #2EA3F2;
        }
        table {
            text-align: center;
        }
        .align-left {
            text-align: left;
        }
    </style>
@endpush

@section('content')
<div class="container-fluid pt-4 pb-4 bg-green">

    <!-- Content Row -->
    @foreach ($jenis_pelayanan as $pelayanan)
        <div class="card mb-4">
            <div class="card-body">
                    <h2>{{ $pelayanan->nama_pelayanan }}</h2>
                    <div class="table-responsive">
                        <table class="table" width="100%" cellspacing="0">
                            <thead class="thead-green">
                                <tr>
                                    <th>No</th>
                                    <th class="align-left">Pernyataan</th>
                                    <th>Sangat Baik</th>
                                    <th>Baik</th>
                                    <th>Kurang</th>
                                    <th>Sangat Kurang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                @forelse ($data as $kuesioner)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td class="align-left">{{ $kuesioner->soal }}</td>
                                        <form id="input{{ $no }}{{ $pelayanan->id }}">
                                            @csrf
                                            <input type="hidden" name="id_pelayanan" value="{{ $pelayanan->id }}">
                                            <input type="hidden" name="id_responden" value="{{ $id }}">
                                            <input type="hidden" name="id_soal" value="{{ $kuesioner->id }}">
                                            <td>
                                                <input type="radio" name="nilai" value="4">
                                            </td>
                                            <td>
                                                <input type="radio" name="nilai" value="3">
                                            </td>
                                            <td>
                                                <input type="radio" name="nilai" value="2">
                                            </td>
                                            <td>
                                                <input type="radio" name="nilai" value="1">
                                            </td>
                                        </form>
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
    @endforeach
    <button type="submit" id="btnSubmit" class="btn btn-primary btn-block" onclick="submitAll();">Submit</button>

</div>
@endsection

@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        function validate(form){
            // get form id
            var formID = form.id;
            var formDetails = $('#'+formID);
                $.ajax({
                    type: "POST",
                    url: '/input', // tambahkan /ikm-apps sebelum /input
                    data: formDetails.serialize(),
                    success: function(data) {
                        // log result
                        console.log(data);
                        // for closing popup
                        window.location = '/thankyou'; // tambahkan /ikm-apps sebelum /thankyou
                    },
                    error: function(jqXHR, text, error) {
                        // Displaying if there are any errors
                        console.log(error);
                    }
                })
        }

        function submitAll() {
            for (let i=0, n=document.forms.length; i<n; i++) {
                validate(document.forms[i]);
            }
        }
    </script>
@endpush
