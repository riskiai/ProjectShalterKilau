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
                        <h4 class="card-title">Edit Data SDM</h4>
                    </div>
                    <div class="card-body">
                        <!-- Pastikan form action diarahkan ke rute update dengan parameter id -->
                        <form action="{{ route('sdm.update', $sdm->id_sdm) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="current_page" value="{{ request()->query('current_page', 0) }}">

                            <div class="form-group">
                                <label>NIK</label>
                                <input type="text" name="nik" class="form-control" value="{{ $sdm->nik }}" required>
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" value="{{ $sdm->nama }}" required>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" required>
                                    <option value="L" {{ $sdm->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="P" {{ $sdm->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" rows="3" required>{{ $sdm->alamat }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Pendidikan</label>
                                <input type="text" name="pendidikan" class="form-control" value="{{ $sdm->pendidikan }}" required>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Gabung</label>
                                <input type="date" name="tgl_gabung" class="form-control" value="{{ $sdm->tgl_gabung }}" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Tanggal Keluar</label>
                                <input type="date" name="tgl_keluar" class="form-control" value="{{ $sdm->tgl_keluar }}">
                            </div>
                            <div class="form-group">
                                <label>No. Telepon</label>
                                <input type="text" name="no_telp" class="form-control" value="{{ $sdm->no_telp }}" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $sdm->email }}" required>
                            </div>
                            <div class="form-group">
                                <label>Keaktifan Edukasi</label>
                                <input type="text" name="keaktifan_edu" class="form-control" value="{{ $sdm->keaktifan_edu }}">
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea name="keterangan" class="form-control" rows="3">{{ $sdm->keterangan }}</textarea>
                            </div>

                            <!-- Relasi Struktur, Wilbin, dan Kacab -->
                            <div class="form-group">
                                <label>Jabatan</label>
                                <select name="id_struktur" class="form-control">
                                    <option value="">Pilih Struktur</option>
                                    @foreach($struktur as $struk)
                                        <option value="{{ $struk->id_struktur }}" {{ $sdm->id_struktur == $struk->id_struktur ? 'selected' : '' }}>
                                            {{ $struk->struktur }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kacab</label>
                                <select name="id_kacab" class="form-control" required>
                                    <option value="">Pilih Kacab</option>
                                    @foreach($kacab as $kac)
                                        <option value="{{ $kac->id_kacab }}" {{ $sdm->id_kacab == $kac->id_kacab ? 'selected' : '' }}>
                                            {{ $kac->nama_kacab }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Wilayah Binaan</label>
                                <select name="id_wilbin" class="form-control">
                                    <option value="">Pilih Wilayah Binaan</option>
                                    @foreach($wilbin as $wil)
                                        <option value="{{ $wil->id_wilbin }}" {{ $sdm->id_wilbin == $wil->id_wilbin ? 'selected' : '' }}>
                                            {{ $wil->nama_wilbin }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Pilihan Provinsi, Kabupaten, Kecamatan, dan Kelurahan -->
                            <div class="form-group">
                                <label>Provinsi</label>
                                <select name="id_prov" id="provinsi" class="form-control" required>
                                    <option value="">Pilih Provinsi</option>
                                    @foreach($provinsi as $prov)
                                        <option value="{{ $prov->id_prov }}" {{ $sdm->id_prov == $prov->id_prov ? 'selected' : '' }}>
                                            {{ $prov->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kabupaten/Kota</label>
                                <select name="id_kab" id="kabupaten" class="form-control" required>
                                    <option value="">Pilih Kabupaten/Kota</option>
                                    @foreach($kabupaten as $kab)
                                        <option value="{{ $kab->id_kab }}" {{ $sdm->id_kab == $kab->id_kab ? 'selected' : '' }}>
                                            {{ $kab->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <select name="id_kec" id="kecamatan" class="form-control" required>
                                    <option value="">Pilih Kecamatan</option>
                                    @foreach($kecamatan as $kec)
                                        <option value="{{ $kec->id_kec }}" {{ $sdm->id_kec == $kec->id_kec ? 'selected' : '' }}>
                                            {{ $kec->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kelurahan/Desa</label>
                                <select name="id_kel" id="kelurahan" class="form-control" required>
                                    <option value="">Pilih Kelurahan/Desa</option>
                                    @foreach($kelurahan as $kel)
                                        <option value="{{ $kel->id_kel }}" {{ $sdm->id_kel == $kel->id_kel ? 'selected' : '' }}>
                                            {{ $kel->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            
                           

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
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
