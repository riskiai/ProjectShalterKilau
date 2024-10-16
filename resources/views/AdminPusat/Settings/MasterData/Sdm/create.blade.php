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
                        <h4 class="card-title">Tambah Data SDM</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('sdm.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="current_page" value="{{ request()->query('current_page', 0) }}">

                            <div class="form-group">
                                <label>NIK</label>
                                <input type="text" name="nik" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Pendidikan</label>
                                <input type="text" name="pendidikan" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Gabung</label>
                                <input type="date" name="tgl_gabung" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Tanggal Keluar</label>
                                <input type="date" name="tgl_keluar" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>No. Telepon</label>
                                <input type="text" name="no_telp" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Keaktifan Edukasi</label>
                                <input type="text" name="keaktifan_edu" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea name="keterangan" class="form-control" rows="3"></textarea>
                            </div>

                             <!-- Relasi Struktur, Wilbin, dan Kacab -->
                             <div class="form-group">
                                <label>Struktur</label>
                                <select name="id_struktur" class="form-control">
                                    <option value="">Pilih Struktur</option>
                                    @foreach($struktur as $struk)
                                        <option value="{{ $struk->id_struktur }}">{{ $struk->struktur }}</option>
                                    @endforeach
                                </select>
                            </div>

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

                            <!-- Pilihan Provinsi, Kabupaten, Kecamatan, dan Kelurahan -->
                            <div class="form-group">
                                <label>Provinsi</label>
                                <select name="id_prov" id="provinsi" class="form-control" required>
                                    <option value="">Pilih Provinsi</option>
                                    @foreach($provinsi as $prov)
                                        <option value="{{ $prov['id_prov'] }}">{{ $prov['nama'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kabupaten/Kota</label>
                                <select name="id_kab" id="kabupaten" class="form-control" required>
                                    <option value="">Pilih Kabupaten/Kota</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <select name="id_kec" id="kecamatan" class="form-control" required>
                                    <option value="">Pilih Kecamatan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kelurahan/Desa</label>
                                <select name="id_kel" id="kelurahan" class="form-control" required>
                                    <option value="">Pilih Kelurahan/Desa</option>
                                </select>
                            </div>

                           
                            

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mt-3">Tambah</button>
                                <a href="{{ route('sdm') }}" class="btn btn-secondary mt-3">Batal</a>
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
        // Ketika Kacab dipilih, ambil Wilayah Binaan berdasarkan Kacab
        $('#kacab').on('change', function() {
            var id_kacab = $(this).val();
            $('#wilbin').empty().append('<option value="">Pilih Wilayah Binaan</option>');
            
            if (id_kacab) {
                $.ajax({
                    url: '/admin_pusat/settings/wilbin/' + id_kacab,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        if (data.length > 0) {
                            $.each(data, function(key, value) {
                                $('#wilbin').append('<option value="' + value.id_wilbin + '">' + value.nama_wilbin + '</option>');
                            });
                        } else {
                            $('#wilbin').append('<option value="">Wilayah Binaan tidak ditemukan</option>');
                        }
                    },
                    error: function() {
                        alert('Gagal mengambil data Wilayah Binaan');
                    }
                });
            }
        });

        // Ajax untuk mengisi Kabupaten berdasarkan Provinsi
        $('#provinsi').on('change', function() {
            var id_prov = $(this).val();
            $('#kabupaten').empty().append('<option value="">Pilih Kabupaten/Kota</option>');
            $('#kecamatan').empty().append('<option value="">Pilih Kecamatan</option>');
            $('#kelurahan').empty().append('<option value="">Pilih Kelurahan/Desa</option>');

            if (id_prov) {
                $.ajax({
                    url: '/kabupaten/' + id_prov,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $.each(data, function(key, value) {
                            $('#kabupaten').append('<option value="' + value.id_kab + '">' + value.nama + '</option>');
                        });
                    }
                });
            }
        });

        // Ajax untuk mengisi Kecamatan berdasarkan Kabupaten
        $('#kabupaten').on('change', function() {
            var id_kab = $(this).val();
            $('#kecamatan').empty().append('<option value="">Pilih Kecamatan</option>');
            $('#kelurahan').empty().append('<option value="">Pilih Kelurahan/Desa</option>');

            if (id_kab) {
                $.ajax({
                    url: '/kecamatan/' + id_kab,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $.each(data, function(key, value) {
                            $('#kecamatan').append('<option value="' + value.id_kec + '">' + value.nama + '</option>');
                        });
                    }
                });
            }
        });

        // Ajax untuk mengisi Kelurahan berdasarkan Kecamatan
        $('#kecamatan').on('change', function() {
            var id_kec = $(this).val();
            $('#kelurahan').empty().append('<option value="">Pilih Kelurahan/Desa</option>');

            if (id_kec) {
                $.ajax({
                    url: '/kelurahan/' + id_kec,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $.each(data, function(key, value) {
                            $('#kelurahan').append('<option value="' + value.id_kel + '">' + value.nama + '</option>');
                        });
                    }
                });
            }
        });
    });
</script>
@endsection
