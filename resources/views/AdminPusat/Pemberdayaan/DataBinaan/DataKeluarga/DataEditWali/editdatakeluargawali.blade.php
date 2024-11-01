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
                            <h4 class="card-title">Edit Data Wali</h4>
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
                            <form action="{{ route('edit.prosess.keluarga.wali', $wali->id_keluarga) }}" method="POST">
                                @csrf
                                @method('POST')

                                <!-- Field untuk Nama Wali -->
                                <div class="form-group">
                                    <label for="nama_wali">Nama Wali</label>
                                    <input type="text" name="nama_wali" class="form-control"
                                        value="{{ $wali->nama_wali ?? '-' }}" id="nama_wali">
                                </div>

                                <!-- Field untuk Tempat Lahir -->
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" class="form-control"
                                        value="{{ $wali->tempat_lahir ?? '-' }}" id="tempat_lahir">
                                </div>

                                <!-- Field untuk Tanggal Lahir -->
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control"
                                        value="{{ $wali->tanggal_lahir }}" id="tanggal_lahir">
                                </div>

                                <!-- Dropdown untuk Agama -->
                                <div class="form-group">
                                    <label for="agama_wali">Agama</label>
                                    <select name="agama" class="form-control" id="agama_wali">
                                        <option value="">Pilih Agama</option>
                                        <option value="Islam" {{ $wali->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                                        <option value="Kristen" {{ $wali->agama == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                        <option value="Budha" {{ $wali->agama == 'Budha' ? 'selected' : '' }}>Budha</option>
                                        <option value="Hindu" {{ $wali->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                        <option value="Konghucu" {{ $wali->agama == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                    </select>
                                </div>

                                <!-- Dropdown untuk Provinsi -->
                                <div class="form-group">
                                    <label for="provinsi">Provinsi</label>
                                    <select name="id_prov" class="form-control" id="provinsi">
                                        <option value="">Pilih Provinsi</option>
                                        @foreach ($provinsi as $prov)
                                            <option value="{{ $prov->id_prov }}"
                                                {{ $wali->id_prov == $prov->id_prov ? 'selected' : '' }}>
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

                                <!-- Dropdown untuk Penghasilan -->
                                <div class="form-group">
                                    <label for="penghasilan">Penghasilan Wali</label>
                                    <select name="penghasilan" class="form-control" id="penghasilan">
                                        <option value="">Pilih Penghasilan</option>
                                        <option value="500000" {{ $wali->penghasilan == '500000' ? 'selected' : '' }}>Dibawah Rp.500.000,-</option>
                                        <option value="1500000" {{ $wali->penghasilan == '1500000' ? 'selected' : '' }}>Rp.500.000,- s/d Rp.1.500.000,-</option>
                                        <option value="2500000" {{ $wali->penghasilan == '2500000' ? 'selected' : '' }}>Rp.1.500.000,- s/d Rp.2.500.000,-</option>
                                        <option value="3500000" {{ $wali->penghasilan == '3500000' ? 'selected' : '' }}>Rp.2.500.000,- s/d Rp.3.500.000,-</option>
                                        <option value="5000000" {{ $wali->penghasilan == '5000000' ? 'selected' : '' }}>Rp.3.500.000,- s/d Rp.5.000.000,-</option>
                                        <option value="7000000" {{ $wali->penghasilan == '7000000' ? 'selected' : '' }}>Rp.5.000.000,- s/d Rp.7.000.000,-</option>
                                        <option value="10000000" {{ $wali->penghasilan == '10000000' ? 'selected' : '' }}>Diatas Rp.10.000.000,-</option>
                                    </select>
                                </div> 

                                <!-- Dropdown untuk Hubungan Kerabat -->
                                <div class="form-group">
                                    <label for="hub_kerabat_wali">Hubungan Kerabat</label>
                                    <select name="hub_kerabat" class="form-control" id="hub_kerabat_wali">
                                        <option value="">Pilih Hubungan Kerabat</option>
                                        <option value="Kakak" {{ $wali->hub_kerabat == 'Kakak' ? 'selected' : '' }}>Kakak</option>
                                        <option value="Saudara dari Ayah" {{ $wali->hub_kerabat == 'Saudara dari Ayah' ? 'selected' : '' }}>Saudara dari Ayah</option>
                                        <option value="Saudara dari Ibu" {{ $wali->hub_kerabat == 'Saudara dari Ibu' ? 'selected' : '' }}>Saudara dari Ibu</option>
                                        <option value="Tidak Ada Hubungan Keluarga" {{ $wali->hub_kerabat == 'Tidak Ada Hubungan Keluarga' ? 'selected' : '' }}>Tidak Ada Hubungan Keluarga</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    <a href="{{ route('Keluarga.show', ['id' => $wali->id_keluarga, 'tab' => 'data-wali']) }}" class="btn btn-secondary">Batal</a>
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
            let id_kabupaten = "{{ $wali->id_kab ?? '' }}";
            let id_kecamatan = "{{ $wali->id_kec ?? '' }}";
            let id_kelurahan = "{{ $wali->id_kel ?? '' }}";

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
                        $('#kabupaten').empty().append('<option value="">Pilih Kabupaten/Kota</option>').prop('disabled', false);
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
                        $('#kecamatan').empty().append('<option value="">Pilih Kecamatan</option>').prop('disabled', false);
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
                        $('#kelurahan').empty().append('<option value="">Pilih Kelurahan/Desa</option>').prop('disabled', false);
                        $.each(data, function(key, value) {
                            $('#kelurahan').append(
                                `<option value="${value.id_kel}" ${selectedId === value.id_kel ? 'selected' : ''}>${value.nama}</option>`
                            );
                        });
                    }
                });
            }

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
