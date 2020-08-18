@extends('layouts.app')

@push('style')
    <style>
        .thead-green {
            background: #00C974;
            color: #FFFFFF;
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
<div class="container-fluid">

    <!-- Content Row -->
    @foreach ($jenis_pelayanan as $pelayanan)
    <div class="row">
        <h1>{{ $pelayanan->nama_pelayanan }}</h1>
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
                    @forelse ($data as $kuesioner)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td class="align-left">{{ $kuesioner->soal }}</td>
                            <form action="{{ route('input') }}" method="POST" id="input{{ $no }}{{ $pelayanan->id }}">
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
    @endforeach
    <button type="submit" id="btnSubmit" class="btn btn-primary mx-3" onclick="submitAll();">Submit</button>

</div>
@endsection

@push('scripts')
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script type="text/javascript">
        function validate(form){
            // get form id
            var formID = form.id;
            var formDetails = $('#'+formID);
                $.ajax({
                    type: "POST",
                    url: '/input',
                    data: formDetails.serialize(),
                    success: function(data) {
                        // log result
                        console.log(data);
                        // for closing popup
                        location.reload();
                        window.location = '/';
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
        // $(document).ready(function() {
        //     $('.inputForm').submit(function() {
        //         alert('success');
        //         return true;
        //     });
        //     $('#btnSubmit').click(function() {
        //         $('.inputForm').trigger('submit');
        //     });
            // $('#btnSubmit').on('click', function() {
            //     event.preventDefault();
            //     for (i=1; i<{{ $no }}; i++) {
            //         alert('success'+i);
            //         $('#input'+i).submit();
            //     }
            // });
        // });
    </script>
@endpush