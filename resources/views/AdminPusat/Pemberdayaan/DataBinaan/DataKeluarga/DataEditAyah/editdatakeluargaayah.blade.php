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
                            <h4 class="card-title">Edit Data Ayah</h4>
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
                            <form action="{{ route('edit.prosess.keluarga.ayah', $ayah->id_keluarga) }}" method="POST">
                                @csrf
                                @method('POST')

                                <!-- Field yang diaktifkan untuk pengeditan -->
                                <div class="form-group">
                                    <label for="nama_ayah">Nama Ayah</label>
                                    <input type="text" name="nama_ayah" class="form-control"
                                        value="{{ $ayah->nama_ayah ?? '-' }}" id="nama_ayah">
                                </div>

                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" class="form-control"
                                        value="{{ $ayah->tempat_lahir ?? '-' }}" id="tempat_lahir">
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control"
                                        value="{{ $ayah->tanggal_lahir }}" id="tanggal_lahir">
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_kematian">Tanggal Kematian</label>
                                    <input type="date" name="tanggal_kematian" class="form-control"
                                        value="{{ $ayah->tanggal_kematian }}" id="tanggal_kematian">
                                </div>

                                <div class="form-group">
                                    <label for="penyebab_kematian">Penyebab Kematian</label>
                                    <input type="text" name="penyebab_kematian" class="form-control"
                                        value="{{ $ayah->penyebab_kematian ?? '-' }}" id="penyebab_kematian">
                                </div>

                                <!-- Dropdown untuk Agama -->
                                <div class="form-group">
                                    <label for="agama_ayah">Agama</label>
                                    <select name="agama" class="form-control" id="agama_ayah">
                                        <option value="">Pilih Agama</option>
                                        <option value="Islam" {{ $ayah->agama == 'Islam' ? 'selected' : '' }}>Islam
                                        </option>
                                        <option value="Kristen" {{ $ayah->agama == 'Kristen' ? 'selected' : '' }}>Kristen
                                        </option>
                                        <option value="Budha" {{ $ayah->agama == 'Budha' ? 'selected' : '' }}>Budha
                                        </option>
                                        <option value="Hindu" {{ $ayah->agama == 'Hindu' ? 'selected' : '' }}>Hindu
                                        </option>
                                        <option value="Konghucu" {{ $ayah->agama == 'Konghucu' ? 'selected' : '' }}>
                                            Konghucu</option>
                                    </select>
                                </div>

                                <!-- Dropdown untuk Provinsi -->
                                <div class="form-group">
                                    <label for="provinsi">Provinsi</label>
                                    <select name="id_prov" class="form-control" id="provinsi">
                                        <option value="">Pilih Provinsi</option>
                                        @foreach ($provinsi as $prov)
                                            <option value="{{ $prov->id_prov }}"
                                                {{ $ayah->id_prov == $prov->id_prov ? 'selected' : '' }}>
                                                {{ $prov->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Dropdown untuk Kabupaten -->
                                <div class="form-group">
                                    <label for="kabupaten">Kabupaten</label>
                                    <select name="id_kab" class="form-control" id="kabupaten">
                                        <option value="">Pilih Kabupaten</option>
                                    </select>
                                </div>

                                <!-- Dropdown untuk Kecamatan -->
                                <div class="form-group">
                                    <label for="kecamatan">Kecamatan</label>
                                    <select name="id_kec" class="form-control" id="kecamatan">
                                        <option value="">Pilih Kecamatan</option>
                                    </select>
                                </div>

                                <!-- Dropdown untuk Kelurahan -->
                                <div class="form-group">
                                    <label for="kelurahan">Kelurahan</label>
                                    <select name="id_kel" class="form-control" id="kelurahan">
                                        <option value="">Pilih Kelurahan</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="penghasilan">Penghasilan Ayah</label>
                                    <select name="penghasilan" class="form-control" id="penghasilan">
                                        <option value="">Pilih Penghasilan</option>
                                        <option value="500000" {{ $ayah->penghasilan == '500000' ? 'selected' : '' }}>Dibawah Rp.500.000,-</option>
                                        <option value="1500000" {{ $ayah->penghasilan == '1500000' ? 'selected' : '' }}>Rp.500.000,- s/d Rp.1.500.000,-</option>
                                        <option value="2500000" {{ $ayah->penghasilan == '2500000' ? 'selected' : '' }}>Rp.1.500.000,- s/d Rp.2.500.000,-</option>
                                        <option value="3500000" {{ $ayah->penghasilan == '3500000' ? 'selected' : '' }}>Rp.2.500.000,- s/d Rp.3.500.000,-</option>
                                        <option value="5000000" {{ $ayah->penghasilan == '5000000' ? 'selected' : '' }}>Rp.3.500.000,- s/d Rp.5.000.000,-</option>
                                        <option value="7000000" {{ $ayah->penghasilan == '7000000' ? 'selected' : '' }}>Rp.5.000.000,- s/d Rp.7.000.000,-</option>
                                        <option value="10000000" {{ $ayah->penghasilan == '10000000' ? 'selected' : '' }}>Diatas Rp.10.000.000,-</option>
                                    </select>
                                </div>                                                                

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    <a href="{{ route('Keluarga.show', ['id' => $ayah->id_keluarga, 'tab' => 'data-ayah']) }}"
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
    // Disable semua field jika tidak ada nilai yang valid
    $('input, select').each(function() {
        const value = $(this).val();
        if (value === '-' || value === '' || value === 'dd/mm/yyyy' || value === null) {
            $(this).prop('disabled', true);
        }
    });

    // Load Kabupaten, Kecamatan, dan Kelurahan saat halaman dimuat berdasarkan data yang tersimpan
    let id_provinsi = $('#provinsi').val();
    let id_kabupaten = "{{ $ayah->id_kab ?? '' }}";
    let id_kecamatan = "{{ $ayah->id_kec ?? '' }}";
    let id_kelurahan = "{{ $ayah->id_kel ?? '' }}";

    if (id_provinsi) {
        loadKabupaten(id_provinsi, id_kabupaten);
    }
    if (id_kabupaten) {
        loadKecamatan(id_kabupaten, id_kecamatan);
    }
    if (id_kecamatan) {
        loadKelurahan(id_kecamatan, id_kelurahan);
    }

    // Fungsi untuk memuat Kabupaten berdasarkan Provinsi
    $('#provinsi').on('change', function() {
        loadKabupaten($(this).val());
        $('#kecamatan, #kelurahan').empty().append('<option value="">Pilih Kecamatan</option>')
            .prop('disabled', true);
    });

    $('#kabupaten').on('change', function() {
        loadKecamatan($(this).val());
        $('#kelurahan').empty().append('<option value="">Pilih Kelurahan/Desa</option>').prop(
            'disabled', true);
    });

    $('#kecamatan').on('change', function() {
        loadKelurahan($(this).val());
    });

    function loadKabupaten(id_prov, selectedId = '') {
        $.ajax({
            url: '/kabupaten/' + id_prov,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#kabupaten').empty().append('<option value="">Pilih Kabupaten/Kota</option>')
                    .prop('disabled', false);
                $.each(data, function(key, value) {
                    $('#kabupaten').append(
                        `<option value="${value.id_kab}" ${selectedId === value.id_kab ? 'selected' : ''}>${value.nama}</option>`
                    );
                });
            }
        });
    }

    function loadKecamatan(id_kab, selectedId = '') {
        $.ajax({
            url: '/kecamatan/' + id_kab,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#kecamatan').empty().append('<option value="">Pilih Kecamatan</option>')
                    .prop('disabled', false);
                $.each(data, function(key, value) {
                    $('#kecamatan').append(
                        `<option value="${value.id_kec}" ${selectedId === value.id_kec ? 'selected' : ''}>${value.nama}</option>`
                    );
                });
            }
        });
    }

    function loadKelurahan(id_kec, selectedId = '') {
        $.ajax({
            url: '/kelurahan/' + id_kec,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#kelurahan').empty().append('<option value="">Pilih Kelurahan/Desa</option>')
                    .prop('disabled', false);
                $.each(data, function(key, value) {
                    $('#kelurahan').append(
                        `<option value="${value.id_kel}" ${selectedId === value.id_kel ? 'selected' : ''}>${value.nama}</option>`
                    );
                });
            }
        });
    }

    // Enable dropdown Kabupaten, Kecamatan, dan Kelurahan ketika data di-load, tapi tidak mengubah field lain
    if (id_provinsi && id_kabupaten) {
        $('#kabupaten').prop('disabled', false);
    }
    if (id_kabupaten && id_kecamatan) {
        $('#kecamatan').prop('disabled', false);
    }
    if (id_kecamatan && id_kelurahan) {
        $('#kelurahan').prop('disabled', false);
    }
});

    </script>
@endsection
