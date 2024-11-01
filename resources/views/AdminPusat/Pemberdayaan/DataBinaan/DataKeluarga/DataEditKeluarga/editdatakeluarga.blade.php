@extends('AdminPusat.App.master')

@section('style')
    <style>
        /* Add custom CSS if needed */
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Data Keluarga</h4>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card-body">
                            <form action="{{ route('edit.prosess.keluarga', $keluarga->id_keluarga) }}" method="POST">
                                @csrf
                                @method('POST')

                                <div class="form-group">
                                    <label for="no_kk">No. Kartu Keluarga</label>
                                    <input type="text" name="no_kk" class="form-control" value="{{ $keluarga->no_kk }}"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label for="kepala_keluarga">Nama Kepala Keluarga</label>
                                    <input type="text" name="kepala_keluarga" class="form-control"
                                        value="{{ $keluarga->kepala_keluarga }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="status_ortu">Status Orang Tua</label>
                                    <input type="text" name="status_ortu" class="form-control"
                                        value="{{ $keluarga->status_ortu }}" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="id_kacab">Kacab</label>
                                    <select name="id_kacab" id="kacab" class="form-control">
                                        <option value="">Pilih Kacab</option>
                                        @foreach ($kacab as $kac)
                                            <option value="{{ $kac->id_kacab }}"
                                                {{ $kac->id_kacab == $keluarga->id_kacab ? 'selected' : '' }}>
                                                {{ $kac->nama_kacab }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="id_wilbin">Wilayah Binaan</label>
                                    <select name="id_wilbin" id="wilbin" class="form-control">
                                        <option value="">Pilih Wilayah Binaan</option>
                                        @foreach ($wilbin as $wil)
                                            <option value="{{ $wil->id_wilbin }}"
                                                {{ $wil->id_wilbin == $keluarga->id_wilbin ? 'selected' : '' }}>
                                                {{ $wil->nama_wilbin }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="id_shelter">Shelter</label>
                                    <select name="id_shelter" id="shelter" class="form-control">
                                        <option value="">Pilih Shelter</option>
                                        @foreach ($shelter as $sh)
                                            <option value="{{ $sh->id_shelter }}"
                                                {{ $sh->id_shelter == $keluarga->id_shelter ? 'selected' : '' }}>
                                                {{ $sh->nama_shelter }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="id_bank">Bank</label>
                                    <select name="id_bank" class="form-control">
                                        <option value="">Pilih Bank</option>
                                        @foreach ($bank as $bnk)
                                            <option value="{{ $bnk->id_bank }}"
                                                {{ $bnk->id_bank == $keluarga->id_bank ? 'selected' : '' }}>
                                                {{ $bnk->nama_bank }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="no_rek">No Rekening</label>
                                    <input type="text" name="no_rek" class="form-control"
                                        value="{{ $keluarga->no_rek }}">
                                </div>

                                <div class="form-group">
                                    <label for="an_rek">Atas Nama Rekening</label>
                                    <input type="text" name="an_rek" class="form-control"
                                        value="{{ $keluarga->an_rek }}">
                                </div>

                                <div class="form-group">
                                    <label for="no_telp">No Telepon</label>
                                    <input type="text" name="no_telp" class="form-control"
                                        value="{{ $keluarga->no_telp }}">
                                </div>

                                <div class="form-group">
                                    <label for="an_tlp">Atas Nama Telepon</label>
                                    <input type="text" name="an_tlp" class="form-control"
                                        value="{{ $keluarga->an_tlp }}">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    <a href="{{ route('Keluarga.show', $keluarga->id_keluarga) }}"
                                        class="btn btn-secondary">Batal</a>
                                </div>
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
        $(document).ready(function() {
            // Ketika Kacab dipilih
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
                                $('#wilbin').append('<option value="' + value
                                    .id_wilbin + '">' + value.nama_wilbin +
                                    '</option>');
                            });
                        },
                        error: function() {
                            alert('Gagal mengambil data Wilayah Binaan');
                        }
                    });
                }
            });

            // Ketika Wilbin dipilih, ambil data Shelter berdasarkan Wilbin
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
                                $('#shelter').append('<option value="' + value
                                    .id_shelter + '">' + value.nama_shelter +
                                    '</option>');
                            });
                        },
                        error: function() {
                            alert('Gagal mengambil data Shelter');
                        }
                    });
                }
            });
        });
    </script>
@endsection
