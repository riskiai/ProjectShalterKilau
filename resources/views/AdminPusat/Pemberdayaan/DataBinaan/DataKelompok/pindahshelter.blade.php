@extends('AdminPusat.App.master')

@section('style')
    <style>
        .container {
            margin-top: 20px;
        }

        .form-control {
            color: #000 !important;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Pindah Shelter Anak Binaan</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('pindahanakshelterprosess', ['id_shelter' => $id_shelter]) }}"
                                method="POST">
                                @csrf

                                <!-- Anak Binaan -->
                                <div class="form-group">
                                    <label>Data Anak Binaan</label>
                                    <select name="id_anak" class="form-control" required>
                                        <option value="">Pilih Anak Binaan</option>
                                        @foreach ($anakBinaan as $anak)
                                            <option value="{{ $anak->id_anak }}">{{ $anak->full_name }} (Shelter:
                                                {{ $anak->shelter->nama_shelter }})</option>
                                        @endforeach
                                    </select>
                                </div>


                                <!-- Kantor Cabang -->
                                <div class="form-group">
                                    <label>Kantor Cabang</label>
                                    <select id="kacab" class="form-control" required>
                                        <option value="">Pilih Kantor Cabang</option>
                                        @foreach ($kacabList as $kacab)
                                            <option value="{{ $kacab->id_kacab }}">{{ $kacab->nama_kacab }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Wilayah Binaan -->
                                <div class="form-group">
                                    <label>Wilayah Binaan</label>
                                    <select id="wilbin" class="form-control" required>
                                        <option value="">Pilih Wilayah Binaan</option>
                                    </select>
                                </div>

                                <!-- Shelter -->
                                <div class="form-group">
                                    <label>Shelter Tujuan</label>
                                    <select name="id_shelter_baru" id="shelter" class="form-control" required>
                                        <option value="">Pilih Shelter</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary mt-3">Pindahkan</button>
                                <a href="{{ route('datakelompokshelter.show', ['id' => $id_shelter]) }}"
                                    class="btn btn-secondary mt-3">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Ambil data Wilayah Binaan berdasarkan Kantor Cabang
        $('#kacab').on('change', function() {
            var id_kacab = $(this).val();
            $('#wilbin').empty().append('<option value="">Pilih Wilayah Binaan</option>');
            $('#shelter').empty().append('<option value="">Pilih Shelter</option>');

            if (id_kacab) {
                $.ajax({
                    url: '/admin_pusat/settings/wilbin/' + id_kacab,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $.each(data, function(key, value) {
                            $('#wilbin').append('<option value="' + value.id_wilbin + '">' +
                                value.nama_wilbin + '</option>');
                        });
                    },
                    error: function() {
                        alert('Gagal mengambil data Wilayah Binaan');
                    }
                });
            }
        });

        // Ambil data Shelter berdasarkan Wilayah Binaan
        $('#wilbin').on('change', function() {
            var id_wilbin = $(this).val();
            $('#shelter').empty().append('<option value="">Pilih Shelter</option>');

            if (id_wilbin) {
                $.ajax({
                    url: '/admin_pusat/settings/shelter/' + id_wilbin,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $.each(data, function(key, value) {
                            $('#shelter').append('<option value="' + value.id_shelter + '">' +
                                value.nama_shelter + '</option>');
                        });
                    },
                    error: function() {
                        alert('Gagal mengambil data Shelter');
                    }
                });
            }
        });
    </script>
@endsection
