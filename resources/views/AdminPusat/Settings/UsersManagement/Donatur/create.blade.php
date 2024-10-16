@extends('AdminPusat.App.master')

@section('style')
<style>
    /* Custom CSS jika diperlukan */
</style>
@endsection

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Data Donatur</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('donatur.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Menyimpan halaman pagination saat ini -->
                            <input type="hidden" name="current_page" value="{{ request()->query('current_page', 0) }}">

                            <!-- Tambahkan Email -->
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <!-- Tambahkan Password -->
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <!-- Tambahkan Dropdown untuk Diperuntukan -->
                            <div class="form-group">
                                <label>Diperuntukan</label>
                                <select name="diperuntukan" class="form-control" required>
                                    <option value="">Pilih Diperuntukan</option>
                                    <option value="Pengajuan Donatur (Calon Anak Penerima Beasiswa)">
                                        Pengajuan Donatur (Calon Anak Penerima Beasiswa)
                                    </option>
                                    <option value="Pengajuan Donatur (Calon Anak Non Beasiswa)">
                                        Pengajuan Donatur (Calon Anak Non Beasiswa)
                                    </option>
                                    <option value="Pengajuan Donatur CPB dan NPB">
                                        Pengajuan Donatur CPB dan NPB
                                    </option>
                                </select>
                            </div>

                            <!-- Relasi Kacab, Wilbin, dan Shelter -->
                            <div class="form-group">
                                <label>Kacab</label>
                                <select name="id_kacab" id="kacab" class="form-control" required>
                                    <option value="">Pilih Kacab</option>
                                    @foreach($kacab as $kac)
                                        <option value="{{ $kac->id_kacab }}">{{ $kac->nama_kacab }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Wilayah Binaan</label>
                                <select name="id_wilbin" id="wilbin" class="form-control" required>
                                    <option value="">Pilih Wilayah Binaan</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Shelter</label>
                                <select name="id_shelter" id="shelter" class="form-control" required>
                                    <option value="">Pilih Shelter</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" rows="3" required></textarea>
                            </div>

                            <div class="form-group">
                                <label>No. HP</label>
                                <input type="text" name="no_hp" class="form-control" required>
                            </div>

                            <!-- Tambahkan Nama Bank dari data Bank -->
                            <div class="form-group">
                                <label>Bank</label>
                                <select name="id_bank" class="form-control" required>
                                    <option value="">Pilih Bank</option>
                                    @foreach($banks as $bank)
                                        <option value="{{ $bank->id_bank }}">{{ $bank->nama_bank }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>No. Rekening</label>
                                <input type="text" name="no_rekening" class="form-control" required>
                            </div>

                            <!-- Input untuk upload foto -->
                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" name="foto" class="form-control">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mt-3">Tambah</button>
                                <a href="{{ route('donatur') }}" class="btn btn-secondary mt-3">Batal</a>
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
                            $('#wilbin').append('<option value="' + value.id_wilbin + '">' + value.nama_wilbin + '</option>');
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
                            $('#shelter').append('<option value="' + value.id_shelter + '">' + value.nama_shelter + '</option>');
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
