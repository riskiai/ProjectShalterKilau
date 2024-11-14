@extends('AdminPusat.App.master')

@section('style')
    <style>
        .container {
            margin-top: 20px;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
            padding: 15px;
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #f1f1f1;
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
        }

        .kelompok-card {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
            padding: 15px;
            margin-bottom: 20px;
            text-align: center;
        }

        .kelompok-title {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .kelompok-details {
            font-size: 14px;
            color: #555;
            margin-top: 5px;
        }

        .kelompok-buttons {
            margin-top: 10px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .button-kelompok {
            display: flex;
            flex-direction: row;
            gap: 10px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Kelompok di Shelter: {{ $shelter->nama_shelter }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="justify-content-end button-kelompok mb-3">
                                <a href="{{ route('kelompok.create', ['id_shelter' => $shelter->id_shelter]) }}" class="btn btn-primary mr-2">Tambah Kelompok</a>
                                <a href="{{ route('pindahanak', ['id_shelter' => $shelter->id_shelter]) }}" class="btn btn-warning">Pindah Shelter</a>
                            </div>
                            
                            @if($shelter->kelompok->isEmpty())
                                <div class="alert alert-warning mt-3">
                                    Tidak ada Kelompok yang terdaftar di Shelter ini.
                                </div>
                            @else
                                <div class="row">
                                    @foreach($shelter->kelompok as $index => $kelompok)
                                        <div class="col-md-4">
                                            <div class="kelompok-card">
                                                <div class="kelompok-details">Kelas: {{ $kelompok->levelAnakBinaan->nama_level_binaan  }}</div>
                                                <div class="kelompok-details">{{ $kelompok->nama_kelompok }}</div>
                                                <div class="kelompok-details">
                                                    Jumlah Anggota: <span id="jumlah-anggota-{{ $kelompok->id_kelompok }}">{{ $kelompok->anak->count() }}</span>
                                                </div>
                                                <div class="kelompok-buttons">
                                                    <a href="{{ route('kelompok.createanak', ['id_shelter' => $shelter->id_shelter, 'id_kelompok' => $kelompok->id_kelompok]) }}" class="btn btn-info btn-sm">Data Anggota</a>
                                                    <a href="{{ route('kelompok.edit', ['id_kelompok' => $kelompok->id_kelompok]) }}" class="btn btn-warning btn-sm">Edit Kelompok</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            <div class="d-flex justify-content-center mt-4">
                                <a href="{{ route('datakelompokshelter') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
           function updateJumlahAnggota(id_kelompok) {
            $.ajax({
                url: `/kelompok/${id_kelompok}/jumlahAnggota`,
                type: 'GET',
                success: function(response) {
                    $(`#jumlah-anggota-${id_kelompok}`).text(response.jumlah_anggota);
                },
                error: function() {
                    console.error("Gagal memperbarui jumlah anggota.");
                }
            });
        }

        $(document).ready(function() {
            @foreach($shelter->kelompok as $kelompok)
                updateJumlahAnggota({{ $kelompok->id_kelompok }});
            @endforeach
        });
    </script>

@endsection