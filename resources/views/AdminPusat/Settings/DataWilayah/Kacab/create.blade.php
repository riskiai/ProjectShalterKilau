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
                        <h4 class="card-title">Tambah Data Kantor Cabang</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('kantor_cabang.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="current_page" value="{{ request()->query('current_page', 0) }}">
                            <div class="form-group">
                                <label>Nama Kacab</label>
                                <input type="text" name="nama_kacab" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>No. Telepon</label>
                                <input type="text" name="no_telpon" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" rows="3" required></textarea>
                            </div>
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
                                <a href="{{ route('kantor_cabang') }}" class="btn btn-secondary mt-3">Batal</a>
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
            url: '/kabupaten/' + id_prov, // pastikan URL ini sesuai dengan route di web.php
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
