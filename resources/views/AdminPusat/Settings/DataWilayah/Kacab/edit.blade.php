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
                        <h4 class="card-title">Edit Data Kantor Cabang</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('kantor_cabang.update', $kacab->id_kacab) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="current_page" value="{{ request()->query('current_page', 0) }}">
                            <div class="form-group">
                                <label>Nama Kacab</label>
                                <input type="text" name="nama_kacab" class="form-control" value="{{ $kacab->nama_kacab }}" required>
                            </div>
                            <div class="form-group">
                                <label>No. Telepon</label>
                                <input type="text" name="no_telpon" class="form-control" value="{{ $kacab->no_telpon }}" required>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" rows="3" required>{{ $kacab->alamat }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Provinsi</label>
                                <select name="id_prov" id="provinsi" class="form-control" required>
                                    <option value="">Pilih Provinsi</option>
                                    @foreach($provinsi as $prov)
                                        <option value="{{ $prov['id_prov'] }}" @if($prov['id_prov'] == $kacab->id_prov) selected @endif>{{ $prov['nama'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kabupaten/Kota</label>
                                <select name="id_kab" id="kabupaten" class="form-control" required>
                                    <option value="">Pilih Kabupaten/Kota</option>
                                    @foreach($kabupaten as $kab)
                                        <option value="{{ $kab['id_kab'] }}" @if($kab['id_kab'] == $kacab->id_kab) selected @endif>{{ $kab['nama'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <select name="id_kec" id="kecamatan" class="form-control" required>
                                    <option value="">Pilih Kecamatan</option>
                                    @foreach($kecamatan as $kec)
                                        <option value="{{ $kec['id_kec'] }}" @if($kec['id_kec'] == $kacab->id_kec) selected @endif>{{ $kec['nama'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kelurahan/Desa</label>
                                <select name="id_kel" id="kelurahan" class="form-control" required>
                                    <option value="">Pilih Kelurahan/Desa</option>
                                    @foreach($kelurahan as $kel)
                                        <option value="{{ $kel['id_kel'] }}" @if($kel['id_kel'] == $kacab->id_kel) selected @endif>{{ $kel['nama'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
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
