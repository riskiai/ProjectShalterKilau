@extends('AdminPusat.App.master')

@section('style')
    <style>
        .form-section {
            margin-bottom: 30px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .form-section h5 {
            margin-bottom: 15px;
            font-weight: bold;
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
                            <h4 class="card-title">Tambah Pengajuan Anak Binaan</h4>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('form_keluarga_baru.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <!-- Bagian Keluarga -->
                                <div class="form-section" id="keluarga-section">
                                    <h5>1. Data Keluarga</h5>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>No. KK</label>
                                                <input type="text" name="no_kk" class="form-control" id="no_kk"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Kepala Keluarga</label>
                                                <input type="text" name="kepala_keluarga" class="form-control"
                                                    id="kepala_keluarga" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Status Orang Tua</label>
                                                <select name="status_ortu" class="form-control" id="status_ortu" required>
                                                    <option value="yatim">Yatim</option>
                                                    <option value="piatu">Piatu</option>
                                                    <option value="yatim piatu">Yatim Piatu</option>
                                                    <option value="dhuafa">Dhuafa</option>
                                                    <option value="non dhuafa">Non Dhuafa</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- Bagian Kontak -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Apakah Memiliki No Telepon?</label><br>
                                                <input type="radio" id="telp_yes" name="telp_choice" value="yes"
                                                    checked> Yes
                                                <input type="radio" id="telp_no" name="telp_choice" value="no"> No
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="telp_section">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>No. Telepon</label>
                                                <input type="text" name="no_telp" class="form-control" id="no_telp">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Atas Nama Telepon</label>
                                                <input type="text" name="an_tlp" class="form-control" id="an_tlp">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Bagian Bank -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Apakah Memiliki Bank?</label><br>
                                                <input type="radio" id="bank_yes" name="bank_choice" value="yes"
                                                    checked> Yes
                                                <input type="radio" id="bank_no" name="bank_choice" value="no"> No
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="bank_section">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nama Bank</label>
                                                <select name="id_bank" id="bank" class="form-control">
                                                    <option value="">Pilih Bank</option>
                                                    @foreach ($bank as $b)
                                                        <option value="{{ $b->id_bank }}">{{ $b->nama_bank }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>No. Rekening</label>
                                                <input type="text" name="no_rek" class="form-control" id="no_rek">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Atas Nama Rekening</label>
                                                <input type="text" name="an_rek" class="form-control" id="an_rek">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Dropdown Kacab, Wilbin, Shelter -->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Kantor Cabang</label>
                                                <select name="id_kacab" id="kacab" class="form-control" required>
                                                    <option value="">Pilih Kacab</option>
                                                    @foreach ($kacab as $k)
                                                        <option value="{{ $k->id_kacab }}">{{ $k->nama_kacab }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Wilayah Binaan</label>
                                                <select name="id_wilbin" id="wilbin" class="form-control" required>
                                                    <option value="">Pilih Wilayah Binaan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Shelter</label>
                                                <select name="id_shelter" id="shelter" class="form-control" required>
                                                    <option value="">Pilih Shelter</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Bagian Anak -->
                                        <div class="form-section" id="anak-section">
                                            <h5>2. Data Anak</h5>
                                            <div id="anak-pendidikan-section">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Jenjang Pendidikan</label>
                                                            <select name="jenjang" class="form-control"
                                                                id="jenjang_pendidikan" required>
                                                                <option value="">Pilih Jenjang Pendidikan</option>
                                                                <option value="belum_sd">Belum SD</option>
                                                                <option value="sd">SD</option>
                                                                <option value="smp">SMP</option>
                                                                <option value="sma">SMA</option>
                                                                <option value="perguruan_tinggi">Perguruan Tinggi</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row" id="sekolah_section" style="display: none;">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Kelas</label>
                                                            <input type="text" name="kelas" class="form-control"
                                                                id="kelas">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Nama Sekolah</label>
                                                            <input type="text" name="nama_sekolah"
                                                                class="form-control" id="nama_sekolah">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Alamat Sekolah</label>
                                                            <input type="text" name="alamat_sekolah"
                                                                class="form-control" id="alamat_sekolah">
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row" id="pt_section" style="display: none;">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Jurusan</label>
                                                            <input type="text" name="jurusan" class="form-control"
                                                                id="jurusan">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Semester</label>
                                                            <input type="number" name="semester" class="form-control"
                                                                id="semester">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Nama Perguruan Tinggi</label>
                                                            <input type="text" name="nama_pt" class="form-control"
                                                                id="nama_pt">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Alamat Perguruan Tinggi</label>
                                                            <input type="text" name="alamat_pt" class="form-control"
                                                                id="alamat_pt">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Data Anak Umum --}}
                                            <div id="anak-data-umum-section">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>NIK Anak</label>
                                                            <input type="text" name="nik_anak" class="form-control"
                                                                id="nik_anak" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Anak ke</label>
                                                            <input type="number" name="anak_ke" class="form-control"
                                                                id="anak_ke" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Dari Berapa Bersaudara</label>
                                                            <input type="number" name="dari_bersaudara"
                                                                class="form-control" id="dari_bersaudara" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Nama Panggilan Anak</label>
                                                            <input type="text" name="nick_name" class="form-control"
                                                                id="nick_name" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Nama Panggilan Anak, Nama Lengkap Anak -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Nama Lengkap Anak</label>
                                                            <input type="text" name="full_name" class="form-control"
                                                                id="full_name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Agama</label>
                                                            <select name="agama" class="form-control" required>
                                                                <option value="">Pilih Agama</option>
                                                                <option value="Islam">Islam</option>
                                                                <option value="Kristen">Kristen</option>
                                                                <option value="Budha">Budha</option>
                                                                <option value="Hindu">Hindu</option>
                                                                <option value="Konghucu">Konghucu</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Agama, Tempat Lahir, Tanggal Lahir -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Tempat Lahir</label>
                                                            <input type="text" name="tempat_lahir"
                                                                class="form-control" id="tempat_lahir" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Tanggal Lahir</label>
                                                            <input type="date" name="tanggal_lahir"
                                                                class="form-control" id="tanggal_lahir" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Jenis Kelamin</label>
                                                            <select name="jenis_kelamin" class="form-control" required>
                                                                <option value="">Pilih Jenis Kelamin</option>
                                                                <option value="Laki-laki">Laki-laki</option>
                                                                <option value="Perempuan">Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Tinggal Bersama</label>
                                                            <select name="tinggal_bersama" class="form-control" required>
                                                                <option value="">Pilih Tinggal Bersama</option>
                                                                <option value="Ayah">Tinggal Bersama Ayah</option>
                                                                <option value="Wali">Tinggal Bersama Wali</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Jenis Kelamin, Tinggal Bersama -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Jenis Binaan</label>
                                                            <select name="jenis_anak_binaan" class="form-control"
                                                                required>
                                                                <option value="">Pilih Jenis Binaan</option>
                                                                <option value="BPCB"
                                                                    {{ old('jenis_anak_binaan') == 'BPCB' ? 'selected' : '' }}>
                                                                    Bakal Calon Penerima Beasiswa (BPCB)</option>
                                                                <option value="NPB"
                                                                    {{ old('jenis_anak_binaan') == 'NPB' ? 'selected' : '' }}>
                                                                    Non Penerima Beasiswa (NPB)</option>
                                                            </select>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Jenis Tahfidz</label>
                                                            <select name="hafalan" class="form-control" required>
                                                                <option value="">Pilih Jenis Tahfidz</option>
                                                                <option value="Tahfidz">Tahfidz</option>
                                                                <option value="Non-Tahfidz">Non-Tahfidz</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Pelajaran Favorit, Prestasi -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Pelajaran Favorit</label>
                                                            <input type="text" name="pelajaran_favorit"
                                                                class="form-control" id="pelajaran_favorit">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Prestasi</label>
                                                            <input type="text" name="prestasi" class="form-control"
                                                                id="prestasi">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Hobi</label>
                                                            <input type="text" name="hobi" class="form-control"
                                                                id="hobi">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Jarak Rumah ke Shelter (km)</label>
                                                            <input type="number" name="jarak_rumah" class="form-control"
                                                                id="jarak_rumah">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Jarak Rumah ke Shelter, Transportasi -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Transportasi</label>
                                                            <select name="transportasi" class="form-control"
                                                                id="transportasi">
                                                                <option value="">Pilih Transportasi</option>
                                                                <option value="jalan_kaki">Jalan Kaki</option>
                                                                <option value="sepeda">Sepeda</option>
                                                                <option value="sepeda_motor">Sepeda Motor</option>
                                                                <option value="angkutan_umum">Angkutan Umum</option>
                                                                <option value="diantar_orang_tua_wali">Diantar Orang
                                                                    Tua/Wali</option>
                                                                <option value="lainnya">Lainnya</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Foto Anak</label>
                                                            <input type="file" name="foto" class="form-control"
                                                                id="foto">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Bagian Ayah -->
                                        <div class="form-section" id="ayah-section">
                                            <h5>3. Data Ayah</h5>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>NIK Ayah</label>
                                                        <input type="text" name="nik_ayah" class="form-control"
                                                            id="nik_ayah" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nama Ayah</label>
                                                        <input type="text" name="nama_ayah" class="form-control"
                                                            id="nama_ayah" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Agama</label>
                                                        <select name="agama_ayah" class="form-control" id="agama_ayah"
                                                            disabled>
                                                            <option value="">Pilih Agama</option>
                                                            <option value="Islam">Islam</option>
                                                            <option value="Kristen">Kristen</option>
                                                            <option value="Budha">Budha</option>
                                                            <option value="Hindu">Hindu</option>
                                                            <option value="Konghucu">Konghucu</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Tempat Lahir</label>
                                                        <input type="text" name="tempat_lahir_ayah"
                                                            class="form-control" id="tempat_lahir_ayah" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Tanggal Lahir</label>
                                                        <input type="date" name="tanggal_lahir_ayah"
                                                            class="form-control" id="tanggal_lahir_ayah" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Penghasilan Ayah</label>
                                                        <select name="penghasilan_ayah" class="form-control" id="penghasilan_ayah" disabled>
                                                            <option value="">Pilih Penghasilan</option>
                                                            <option value="500000">Dibawah Rp.500.000,-</option>
                                                            <option value="1500000">Rp.500.000,- s/d Rp.1.500.000,-</option>
                                                            <option value="2500000">Rp.1.500.000,- s/d Rp.2.500.000,-</option>
                                                            <option value="3500000">Rp.2.500.000,- s/d Rp.3.500.000,-</option>
                                                            <option value="5000000">Rp.3.500.000,- s/d Rp.5.000.000,-</option>
                                                            <option value="7000000">Rp.5.000.000,- s/d Rp.7.000.000,-</option>
                                                            <option value="10000000">Rp.7.000.000,- s/d Rp.10.000.000,-</option>
                                                            <option value="10000000">Diatas Rp.10.000.000,-</option>
                                                        </select>       
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Provinsi</label>
                                                        <select name="id_prov_ayah" id="provinsi_ayah" class="form-control" required>
                                                            <option value="">Pilih Provinsi</option>
                                                            @foreach ($provinsi as $prov)
                                                                <option value="{{ $prov->id_prov }}">{{ $prov->nama }}</option>
                                                            @endforeach
                                                        </select>                                                    
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Kabupaten/Kota</label>
                                                        <select name="id_kab_ayah" id="kabupaten_ayah"
                                                            class="form-control" disabled>
                                                            <option value="">Pilih Kabupaten</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Kecamatan</label>
                                                        <select name="id_kec_ayah" id="kecamatan_ayah"
                                                            class="form-control" disabled>
                                                            <option value="">Pilih Kecamatan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Kelurahan/Desa</label>
                                                        <select name="id_kel_ayah" id="kelurahan_ayah"
                                                            class="form-control" disabled>
                                                            <option value="">Pilih Kelurahan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Alamat</label>
                                                        <textarea name="alamat_ayah" class="form-control" id="alamat_ayah" rows="3" disabled></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" id="kematian-section">
                                                <small class="text-muted" style="margin-left:10px;">*isi jika
                                                    meninggal</small>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Tanggal Kematian</label>
                                                        <input type="date" name="tanggal_kematian_ayah"
                                                            class="form-control" id="tanggal_kematian_ayah">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Penyebab Kematian</label>
                                                        <input type="text" name="penyebab_kematian_ayah"
                                                            class="form-control" id="penyebab_kematian_ayah">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Bagian Ibu -->
                                        <div class="form-section" id="ibu-section">
                                            <h5>4. Data Ibu</h5>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>NIK Ibu</label>
                                                        <input type="text" name="nik_ibu" class="form-control"
                                                            id="nik_ibu" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nama Ibu</label>
                                                        <input type="text" name="nama_ibu" class="form-control"
                                                            id="nama_ibu" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Agama Ibu</label>
                                                        <select name="agama_ibu" class="form-control" id="agama_ibu"
                                                            disabled>
                                                            <option value="">Pilih Agama</option>
                                                            <option value="Islam">Islam</option>
                                                            <option value="Kristen">Kristen</option>
                                                            <option value="Budha">Budha</option>
                                                            <option value="Hindu">Hindu</option>
                                                            <option value="Konghucu">Konghucu</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Tempat Lahir Ibu</label>
                                                        <input type="text" name="tempat_lahir_ibu"
                                                            class="form-control" id="tempat_lahir_ibu" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Tanggal Lahir Ibu</label>
                                                        <input type="date" name="tanggal_lahir_ibu"
                                                            class="form-control" id="tanggal_lahir_ibu" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Penghasilan Ibu</label>
                                                        <select name="penghasilan_ibu" class="form-control"
                                                            id="penghasilan_ibu" disabled>
                                                            <option value="500000">Dibawah Rp.500.000,-</option>
                                                            <option value="1500000">Rp.500.000,- s/d Rp.1.500.000,-</option>
                                                            <option value="2500000">Rp.1.500.000,- s/d Rp.2.500.000,-</option>
                                                            <option value="3500000">Rp.2.500.000,- s/d Rp.3.500.000,-</option>
                                                            <option value="5000000">Rp.3.500.000,- s/d Rp.5.000.000,-</option>
                                                            <option value="7000000">Rp.5.000.000,- s/d Rp.7.000.000,-</option>
                                                            <option value="10000000">Rp.7.000.000,- s/d Rp.10.000.000,-</option>
                                                            <option value="10000000">Diatas Rp.10.000.000,-</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Provinsi</label>
                                                        <select name="id_prov_ibu" id="provinsi_ibu" class="form-control"
                                                            disabled>
                                                            <option value="">Pilih Provinsi</option>
                                                            @foreach ($provinsi as $prov)
                                                                <option value="{{ $prov->id_prov }}">{{ $prov->nama }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Kabupaten/Kota</label>
                                                        <select name="id_kab_ibu" id="kabupaten_ibu" class="form-control"
                                                            disabled>
                                                            <option value="">Pilih Kabupaten</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Kecamatan</label>
                                                        <select name="id_kec_ibu" id="kecamatan_ibu" class="form-control"
                                                            disabled>
                                                            <option value="">Pilih Kecamatan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Kelurahan/Desa</label>
                                                        <select name="id_kel_ibu" id="kelurahan_ibu" class="form-control"
                                                            disabled>
                                                            <option value="">Pilih Kelurahan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Alamat Ibu</label>
                                                        <textarea name="alamat_ibu" class="form-control" id="alamat_ibu" rows="3" disabled></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Tanggal Kematian & Penyebab Kematian -->
                                            <div class="row" id="kematian-ibu-section">
                                                <small class="text-muted" style="margin-left:10px;">*isi jika
                                                    meninggal</small>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Tanggal Kematian</label>
                                                        <input type="date" name="tanggal_kematian_ibu"
                                                            class="form-control" id="tanggal_kematian_ibu">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Penyebab Kematian</label>
                                                        <input type="text" name="penyebab_kematian_ibu"
                                                            class="form-control" id="penyebab_kematian_ibu">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Bagian Wali -->
                                        <div class="form-section" id="wali-section">
                                            <h5>5. Data Wali</h5>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>NIK Wali</label>
                                                        <input type="text" name="nik_wali" class="form-control"
                                                            id="nik_wali" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nama Wali</label>
                                                        <input type="text" name="nama_wali" class="form-control"
                                                            id="nama_wali" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Agama Wali</label>
                                                        <select name="agama_wali" class="form-control" id="agama_wali"
                                                            disabled>
                                                            <option value="">Pilih Agama</option>
                                                            <option value="Islam">Islam</option>
                                                            <option value="Kristen">Kristen</option>
                                                            <option value="Budha">Budha</option>
                                                            <option value="Hindu">Hindu</option>
                                                            <option value="Konghucu">Konghucu</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Tempat Lahir Wali</label>
                                                        <input type="text" name="tempat_lahir_wali"
                                                            class="form-control" id="tempat_lahir_wali" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Tanggal Lahir Wali</label>
                                                        <input type="date" name="tanggal_lahir_wali"
                                                            class="form-control" id="tanggal_lahir_wali" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Alamat Wali</label>
                                                        <textarea name="alamat_wali" class="form-control" rows="3" id="alamat_wali" disabled></textarea>
                                                    </div>
                                                </div>

                                                <!-- Cascading untuk Provinsi, Kabupaten, Kecamatan, Kelurahan -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Provinsi</label>
                                                        <select name="id_prov_wali" class="form-control" id="provinsi_wali">
                                                            <option value="">Pilih Provinsi</option>
                                                            @foreach ($provinsi as $prov)
                                                                <option value="{{ $prov->id_prov }}">{{ $prov->nama }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Kabupaten/Kota</label>
                                                        <select name="id_kab_wali" class="form-control" id="kabupaten_wali">
                                                            <option value="">Pilih Kabupaten</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Kecamatan</label>
                                                        <select name="id_kec_wali" class="form-control" id="kecamatan_wali">
                                                            <option value="">Pilih Kecamatan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Kelurahan/Desa</label>
                                                        <select name="id_kel_wali" class="form-control" id="kelurahan_wali">
                                                            <option value="">Pilih Kelurahan</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Penghasilan Wali -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Penghasilan Wali</label>
                                                        <select name="penghasilan_wali" class="form-control"
                                                            id="penghasilan_wali" disabled>
                                                            <option value="500000">Dibawah Rp.500.000,-</option>
                                                            <option value="1500000">Rp.500.000,- s/d Rp.1.500.000,-</option>
                                                            <option value="2500000">Rp.1.500.000,- s/d Rp.2.500.000,-</option>
                                                            <option value="3500000">Rp.2.500.000,- s/d Rp.3.500.000,-</option>
                                                            <option value="5000000">Rp.3.500.000,- s/d Rp.5.000.000,-</option>
                                                            <option value="7000000">Rp.5.000.000,- s/d Rp.7.000.000,-</option>
                                                            <option value="10000000">Rp.7.000.000,- s/d Rp.10.000.000,-</option>
                                                            <option value="10000000">Diatas Rp.10.000.000,-</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Hubungan Kerabat -->
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Hubungan Kerabat</label>
                                                        <select name="hub_kerabat_wali" class="form-control"
                                                            id="hub_kerabat_wali" disabled>
                                                            <option value="">Pilih Hubungan Kerabat</option>
                                                            <option value="Kakak">Kakak</option>
                                                            <option value="Saudara dari Ayah">Saudara dari Ayah</option>
                                                            <option value="Saudara dari Ibu">Saudara dari Ibu</option>
                                                            <option value="Tidak Ada Hubungan Keluarga">Tidak Ada Hubungan
                                                                Keluarga</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tombol Submit -->
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary mt-3"
                                        id="submit_button">Submit</button>
                                    <a href="{{ route('form_keluarga_baru') }}" class="btn btn-secondary mt-3">Reset</a>
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
            // Fungsi untuk mengaktifkan atau menonaktifkan section berdasarkan ID
            function toggleSection(sectionId, enable) {
                $('#' + sectionId + ' input, #' + sectionId + ' select, #' + sectionId + ' textarea').prop(
                    'disabled', !enable);
            }

            // Awal: nonaktifkan bagian Data Anak Pendidikan, Umum, Ayah, Ibu, Wali, dan Kematian
            toggleSection('anak-pendidikan-section', false);
            toggleSection('anak-data-umum-section', false);
            toggleSection('ayah-section', false);
            toggleSection('ibu-section', false);
            toggleSection('wali-section', false);
            toggleSection('kematian-section', false); // Tambahan untuk bagian kematian
            toggleSection('kematian-ibu-section', false);

            // Fungsi untuk mengaktifkan form pendidikan anak setelah data keluarga diisi
            function enablePendidikanAnak() {
                if ($('#no_kk').val() && $('#kepala_keluarga').val() && $('#status_ortu').val()) {
                    toggleSection('anak-pendidikan-section', true); // Aktifkan data pendidikan anak
                } else {
                    toggleSection('anak-pendidikan-section', false); // Nonaktifkan jika data keluarga belum lengkap
                }
            }

            // Fungsi untuk mengaktifkan data umum anak setelah data pendidikan anak diisi
            function enableDataUmumAnak() {
                if ($('#jenjang_pendidikan').val()) {
                    toggleSection('anak-data-umum-section', true); // Aktifkan data umum anak
                } else {
                    toggleSection('anak-data-umum-section', false); // Nonaktifkan jika data pendidikan belum diisi
                }
            }

            // Fungsi untuk mengaktifkan data Ayah setelah semua data anak diisi
            function enableDataAyah() {
                if ($('#transportasi')
                    .val()) {
                    // Periksa status orang tua
                    var statusOrtu = $('#status_ortu').val();
                    updateFieldsAyah(statusOrtu); // Aktifkan atau nonaktifkan field Ayah berdasarkan status ortu
                } else {
                    toggleSection('ayah-section',
                        false); // Nonaktifkan seluruh section Ayah jika data anak belum lengkap
                }
            }


            // Fungsi untuk mengaktifkan data Ibu setelah data Ayah dilengkapi
            function enableDataIbu() {
                if ($('#nama_ayah').val()) {
                    // Periksa status orang tua
                    var statusOrtu = $('#status_ortu').val();
                    updateFieldsIbu(statusOrtu); // Aktifkan atau nonaktifkan field Ibu berdasarkan status ortu
                } else {
                    toggleSection('ibu-section',
                        false); // Nonaktifkan seluruh section Ibu jika data ayah belum lengkap
                }
            }


            // Fungsi untuk mengaktifkan data Wali setelah data Ibu dilengkapi
            function enableDataWali() {
                if ($('#nik_ibu').val() && $('#nama_ibu').val()) {
                    toggleSection('wali-section', true); // Aktifkan data Wali
                } else {
                    toggleSection('wali-section', false); // Nonaktifkan jika data Ibu belum dilengkapi
                }
            }

            // Event untuk memeriksa apakah data keluarga sudah diisi
            $('#no_kk, #kepala_keluarga, #status_ortu').on('input', function() {
                enablePendidikanAnak(); // Periksa apakah data keluarga sudah diisi
            });

            // Event untuk memeriksa apakah data pendidikan anak sudah diisi
            $('#jenjang_pendidikan').on('change', function() {
                enableDataUmumAnak(); // Periksa apakah data pendidikan anak sudah diisi
            });

            // Event untuk memeriksa apakah semua data anak sudah diisi
            $('#transportasi').on('input', function() {
                enableDataAyah();
            });

            // Event untuk memeriksa apakah data Ayah sudah dilengkapi
            $('#nama_ayah').on('input', function() {
                enableDataIbu(); // Aktifkan data Ibu setelah data Ayah lengkap
            });


            function toggleFields(fields, enable) {
                fields.forEach(function(field) {
                    $('#' + field).prop('disabled', !enable);
                });
            }

            // Fungsi untuk menyesuaikan field Ayah berdasarkan status orang tua
            function updateFieldsAyah(statusOrtu) {
                if (statusOrtu === 'yatim' || statusOrtu === 'yatim piatu') {
                    // Aktifkan nama, agama, tempat lahir, tanggal lahir, tanggal kematian, dan penyebab kematian
                    toggleFields(['nama_ayah', 'agama_ayah', 'tempat_lahir_ayah', 'tanggal_lahir_ayah',
                        'tanggal_kematian_ayah', 'penyebab_kematian_ayah'
                    ], true);
                    // Nonaktifkan field lainnya
                    toggleFields(['nik_ayah', 'alamat_ayah', 'provinsi_ayah', 'kabupaten_ayah', 'kecamatan_ayah',
                        'kelurahan_ayah', 'penghasilan_ayah'
                    ], false);
                } else {
                    // Aktifkan semua field kecuali tanggal kematian dan penyebab kematian
                    toggleFields(['nik_ayah', 'nama_ayah', 'agama_ayah', 'tempat_lahir_ayah', 'tanggal_lahir_ayah',
                        'alamat_ayah', 'provinsi_ayah', 'kabupaten_ayah', 'kecamatan_ayah',
                        'kelurahan_ayah', 'penghasilan_ayah', 
                    ], true);
                    // Nonaktifkan tanggal kematian dan penyebab kematian
                    toggleFields(['tanggal_kematian_ayah', 'penyebab_kematian_ayah'], false);
                }
            }

            // Fungsi untuk menyesuaikan field Ibu berdasarkan status orang tua
            function updateFieldsIbu(statusOrtu) {
                if (statusOrtu === 'piatu' || statusOrtu === 'yatim piatu') {
                    // Aktifkan nama, agama, tempat lahir, tanggal lahir, tanggal kematian, dan penyebab kematian
                    toggleFields(['nama_ibu', 'agama_ibu', 'tempat_lahir_ibu', 'tanggal_lahir_ibu',
                        'tanggal_kematian_ibu', 'penyebab_kematian_ibu'
                    ], true);
                    // Nonaktifkan field lainnya
                    toggleFields(['nik_ibu', 'alamat_ibu', 'provinsi_ibu', 'kabupaten_ibu', 'kecamatan_ibu',
                        'kelurahan_ibu', 'penghasilan_ibu'
                    ], false);
                } else {
                    // Aktifkan semua field kecuali tanggal kematian dan penyebab kematian
                    toggleFields(['nik_ibu', 'nama_ibu', 'agama_ibu', 'tempat_lahir_ibu', 'tanggal_lahir_ibu',
                        'alamat_ibu', 'provinsi_ibu', 'kabupaten_ibu', 'kecamatan_ibu', 'kelurahan_ibu',
                        'penghasilan_ibu'
                    ], true);
                    // Nonaktifkan tanggal kematian dan penyebab kematian
                    toggleFields(['tanggal_kematian_ibu', 'penyebab_kematian_ibu'], false);
                }
            }

            // Fungsi untuk menyesuaikan field Wali berdasarkan status orang tua
            function updateFieldsWali(statusOrtu) {
                if (statusOrtu === 'yatim piatu') {
                    // Aktifkan semua field Wali
                    toggleFields(['nik_wali', 'nama_wali', 'agama_wali', 'tempat_lahir_wali', 'tanggal_lahir_wali',
                        'alamat_wali', 'provinsi_wali', 'kabupaten_wali', 'kecamatan_wali',
                        'kelurahan_wali',
                        'penghasilan_wali', 'hub_kerabat_wali',
                    ], true);
                } else {
                    // Nonaktifkan semua field Wali
                    toggleFields(['nik_wali', 'nama_wali', 'agama_wali', 'tempat_lahir_wali', 'tanggal_lahir_wali',
                        'alamat_wali', 'provinsi_wali', 'kabupaten_wali', 'kecamatan_wali',
                        'kelurahan_wali',
                        'penghasilan_wali'
                    ], false);
                }
            }

            // Event handler ketika status orang tua berubah
            $('#status_ortu').on('change', function() {
                var statusOrtu = $(this).val();
                updateFieldsAyah(statusOrtu); // Panggil fungsi untuk menyesuaikan field Ayah
                updateFieldsIbu(statusOrtu); // Panggil fungsi untuk menyesuaikan field Ibu
                updateFieldsWali(statusOrtu); // Panggil fungsi untuk menyesuaikan field Wali
            });

            // Inisialisasi field Ayah, Ibu, dan Wali saat halaman dimuat
            var currentStatusOrtu = $('#status_ortu').val();
            updateFieldsAyah(currentStatusOrtu);
            updateFieldsIbu(currentStatusOrtu);
            updateFieldsWali(currentStatusOrtu);

            // Menyembunyikan form tambahan (sekolah/perguruan tinggi) di awal
            $('#sekolah_section').hide();
            $('#pt_section').hide();

            // Mengatur tampilan form berdasarkan jenjang pendidikan yang dipilih
            $('#jenjang_pendidikan').on('change', function() {
                var jenjang = $(this).val();
                if (jenjang === 'sd' || jenjang === 'smp' || jenjang === 'sma') {
                    $('#sekolah_section').show(); // Tampilkan form sekolah untuk jenjang SD, SMP, SMA
                    $('#pt_section').hide(); // Sembunyikan form perguruan tinggi
                } else if (jenjang === 'perguruan_tinggi') {
                    $('#sekolah_section').hide(); // Sembunyikan form sekolah
                    $('#pt_section').show(); // Tampilkan form perguruan tinggi
                } else {
                    $('#sekolah_section').hide(); // Sembunyikan semua form tambahan
                    $('#pt_section').hide();
                }
            });

            // Fungsi umum untuk logika cascading provinsi, kabupaten, kecamatan, kelurahan
            function setupCascading(idProvinsi, idKabupaten, idKecamatan, idKelurahan) {
                // Logika cascading untuk Provinsi
                $('#' + idProvinsi).on('change', function() {
                    var id_prov = $(this).val();
                    $('#' + idKabupaten).empty().append('<option value="">Pilih Kabupaten</option>');
                    $('#' + idKecamatan).empty().append('<option value="">Pilih Kecamatan</option>');
                    $('#' + idKelurahan).empty().append('<option value="">Pilih Kelurahan</option>');

                    if (id_prov) {
                        $.ajax({
                            url: '/kabupaten/' + id_prov,
                            type: 'GET',
                            dataType: 'json',
                            success: function(data) {
                                $.each(data, function(key, value) {
                                    $('#' + idKabupaten).append('<option value="' +
                                        value.id_kab + '">' + value.nama +
                                        '</option>');
                                });
                            },
                            error: function() {
                                alert('Gagal mengambil data Kabupaten');
                            }
                        });
                    }
                });

                // Logika cascading untuk Kabupaten
                $('#' + idKabupaten).on('change', function() {
                    var id_kab = $(this).val();
                    $('#' + idKecamatan).empty().append('<option value="">Pilih Kecamatan</option>');
                    $('#' + idKelurahan).empty().append('<option value="">Pilih Kelurahan</option>');

                    if (id_kab) {
                        $.ajax({
                            url: '/kecamatan/' + id_kab,
                            type: 'GET',
                            dataType: 'json',
                            success: function(data) {
                                $.each(data, function(key, value) {
                                    $('#' + idKecamatan).append('<option value="' +
                                        value.id_kec + '">' + value.nama +
                                        '</option>');
                                });
                            },
                            error: function() {
                                alert('Gagal mengambil data Kecamatan');
                            }
                        });
                    }
                });

                // Logika cascading untuk Kecamatan
                $('#' + idKecamatan).on('change', function() {
                    var id_kec = $(this).val();
                    $('#' + idKelurahan).empty().append('<option value="">Pilih Kelurahan</option>');

                    if (id_kec) {
                        $.ajax({
                            url: '/kelurahan/' + id_kec,
                            type: 'GET',
                            dataType: 'json',
                            success: function(data) {
                                $.each(data, function(key, value) {
                                    $('#' + idKelurahan).append('<option value="' +
                                        value.id_kel + '">' + value.nama +
                                        '</option>');
                                });
                            },
                            error: function() {
                                alert('Gagal mengambil data Kelurahan');
                            }
                        });
                    }
                });
            }

            // Panggil fungsi untuk Ayah,Ibu,Wali
            setupCascading('provinsi_ayah', 'kabupaten_ayah', 'kecamatan_ayah', 'kelurahan_ayah');
            setupCascading('provinsi_ibu', 'kabupaten_ibu', 'kecamatan_ibu', 'kelurahan_ibu');
            setupCascading('provinsi_wali', 'kabupaten_wali', 'kecamatan_wali', 'kelurahan_wali');

            /* Logika cascading untuk Wilayah Binaan dan Shelter */
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

            // Fungsi untuk mengaktifkan/menonaktifkan telepon section
            function handleTeleponSection() {
                var telpChoice = $('input[name="telp_choice"]:checked').val();
                if (telpChoice === 'no') {
                    toggleSection('telp_section', false); // Nonaktifkan jika tidak memiliki telepon
                } else {
                    toggleSection('telp_section', true); // Aktifkan jika memiliki telepon
                }
            }

            // Fungsi untuk mengaktifkan/menonaktifkan bank section
            function handleBankSection() {
                var bankChoice = $('input[name="bank_choice"]:checked').val();
                if (bankChoice === 'no') {
                    toggleSection('bank_section', false); // Nonaktifkan jika tidak memiliki bank
                } else {
                    toggleSection('bank_section', true); // Aktifkan jika memiliki bank
                }
            }

            // Event handler ketika pilihan "Apakah Memiliki Telepon?" berubah
            $('input[name="telp_choice"]').on('change', function() {
                handleTeleponSection();
            });

            // Event handler ketika pilihan "Apakah Memiliki Bank?" berubah
            $('input[name="bank_choice"]').on('change', function() {
                handleBankSection();
            });

            // Inisialisasi awal ketika halaman dimuat
            handleTeleponSection();
            handleBankSection();
        });
    </script>
@endsection
