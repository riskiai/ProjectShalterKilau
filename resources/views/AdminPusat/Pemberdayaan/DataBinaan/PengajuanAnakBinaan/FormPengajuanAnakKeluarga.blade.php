@extends('AdminPusat.App.master')

@section('style')
    <style>
        .form-section {
            margin-bottom: 40px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .form-section h5 {
            margin-bottom: 15px;
            font-weight: bold;
        }

        .form-inline {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-inline .form-group {
            margin-right: 10px;
        }

        .form-inline .btn {
            margin-left: 10px;
        }

        #error-message {
            text-align: center;
        }

        /* Style untuk memastikan modal berada di tengah */
        .modal-dialog-centered {
            display: flex;
            margin-right: 430px !important;
            margin-top: 60px !important;
        }

        button {}
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
                            <h4 class="text-center">Validasi Kartu Keluarga</h4>
                            <form id="form-validasi-kk" class="form-inline">
                                <div class="form-group col-md-4">
                                    <label for="no_kk" class="sr-only">Nomor Kartu Keluarga</label>
                                    <input type="text" name="no_kk" id="no_kk" class="form-control w-100"
                                        placeholder="a\n" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary w-100"
                                        style="background-color: #6861ce !important;">Cek No KK</button>
                                </div>
                            </form>
                            <div id="error-message" class="alert alert-danger mt-3" style="display:none;"></div>
                        </div>
                    </div>
                </div>

                <!-- Modal Bootstrap untuk Menampilkan Data KK -->
                <div class="modal fade" id="kkInfoModal" tabindex="-1" role="dialog" aria-labelledby="kkInfoModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="kkInfoModalLabel">Data Kartu Keluarga</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p><strong>No KK:</strong> <span id="modal-info-no-kk"></span></p>
                                <p><strong>Kepala Keluarga:</strong> <span id="modal-info-kepala-keluarga"></span></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                                    style="background-color: #6861ce !important;">OK</button>
                            </div>
                        </div>
                    </div>
                </div>
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
            <!-- Form Pengajuan Anak -->
            <div class="row mt-5" id="anak-form-section" style="display:none;">
                <div class="col-md-12">
                    <h4>Pengajuan Anak</h4>
                    <form id="form-pengajuan-anak" action="{{ route('pengajuan_anak_store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-section">
                            <h5>2. Data Anak</h5>

                            <!-- Hidden input to store no_kk -->
                            <div class="form-group">
                                <input type="hidden" name="no_kk" id="no_kk_hidden">
                            </div>

                            <!-- Data Pendidikan Anak -->
                            <div class="form-group">
                                <label for="jenjang">Jenjang Pendidikan</label>
                                <select name="jenjang" id="jenjang_pendidikan" class="form-control" required>
                                    <option value="">Pilih Jenjang Pendidikan</option>
                                    <option value="belum_sd">Belum SD</option>
                                    <option value="sd">SD</option>
                                    <option value="smp">SMP</option>
                                    <option value="sma">SMA</option>
                                    <option value="perguruan_tinggi">Perguruan Tinggi</option>
                                </select>
                            </div>
                            <div class="row" id="sekolah_section" style="display: none;">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Kelas</label>
                                        <input type="text" name="kelas" class="form-control" id="kelas">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nama Sekolah</label>
                                        <input type="text" name="nama_sekolah" class="form-control" id="nama_sekolah">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Alamat Sekolah</label>
                                        <input type="text" name="alamat_sekolah" class="form-control"
                                            id="alamat_sekolah">
                                    </div>
                                </div>
                            </div>

                            <div class="row" id="pt_section" style="display: none;">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Jurusan</label>
                                        <input type="text" name="jurusan" class="form-control" id="jurusan">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Semester</label>
                                        <input type="number" name="semester" class="form-control" id="semester">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nama Perguruan Tinggi</label>
                                        <input type="text" name="nama_pt" class="form-control" id="nama_pt">
                                    </div>
                                </div>
                            </div>

                            <!-- Data Umum Anak -->
                            <div class="form-group">
                                <label for="nik_anak">NIK Anak</label>
                                <input type="text" name="nik_anak" id="nik_anak" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="anak_ke">Anak Ke</label>
                                <input type="number" name="anak_ke" id="anak_ke" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="dari_bersaudara">Dari Berapa Bersaudara</label>
                                <input type="number" name="dari_bersaudara" id="dari_bersaudara" class="form-control"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="nick_name">Nama Panggilan Anak</label>
                                <input type="text" name="nick_name" id="nick_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="full_name">Nama Lengkap Anak</label>
                                <input type="text" name="full_name" id="full_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <select name="agama" class="form-control" id="agama" required>
                                    <option value="">Pilih Agama</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tinggal_bersama">Tinggal Bersama</label>
                                <select name="tinggal_bersama" class="form-control" id="tinggal_bersama" required>
                                    <option value="">Pilih Tinggal Bersama</option>
                                    <option value="Ayah">Ayah</option>
                                    <option value="Ibu">Ibu</option>
                                    <option value="Wali">Wali</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jenis_anak_binaan">Jenis Anak Binaan</label>
                                <select name="jenis_anak_binaan" class="form-control" id="jenis_anak_binaan" required>
                                    <option value="">Pilih Jenis Anak Binaan</option>
                                    <option value="BPCB">Bakal Calon Penerima Beasiswa (BPCB)</option>
                                    <option value="NPB">Non Penerima Beasiswa (NPB)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="hafalan">Jenis Tahfidz</label>
                                <select name="hafalan" class="form-control" id="hafalan" required>
                                    <option value="">Pilih Jenis Tahfidz</option>
                                    <option value="Tahfidz">Tahfidz</option>
                                    <option value="Non-Tahfidz">Non-Tahfidz</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pelajaran_favorit">Pelajaran Favorit</label>
                                <input type="text" name="pelajaran_favorit" id="pelajaran_favorit"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="prestasi">Prestasi</label>
                                <input type="text" name="prestasi" id="prestasi" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="hobi">Hobi</label>
                                <input type="text" name="hobi" id="hobi" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="jarak_rumah">Jarak Rumah ke Shelter (km)</label>
                                <input type="number" name="jarak_rumah" id="jarak_rumah" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="transportasi">Transportasi</label>
                                <select name="transportasi" class="form-control" id="transportasi" required>
                                    <option value="">Pilih Transportasi</option>
                                    <option value="jalan_kaki">Jalan Kaki</option>
                                    <option value="sepeda">Sepeda</option>
                                    <option value="sepeda_motor">Sepeda Motor</option>
                                    <option value="angkutan_umum">Angkutan Umum</option>
                                    <option value="diantar_orang_tua_wali">Diantar Orang Tua/Wali</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="foto">Foto Anak</label>
                                <input type="file" name="foto" id="foto" class="form-control"
                                    accept="image/*">
                            </div>


                            <!-- Form lainnya -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                <button type="reset" class="btn btn-secondary mt-3">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Validasi nomor KK
            $('#form-validasi-kk').on('submit', function(e) {
                e.preventDefault();
                let no_kk = $('#no_kk').val();

                $.ajax({
                    url: "{{ route('validasi_kk') }}", // Pastikan route validasi sudah ada
                    method: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        no_kk: no_kk,
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            // Tampilkan form pengajuan anak
                            $('#anak-form-section').show();
                            $('#error-message').hide();

                            // Tampilkan data KK di modal
                            $('#modal-info-no-kk').text(response.keluarga.no_kk);
                            $('#modal-info-kepala-keluarga').text(response.keluarga
                                .kepala_keluarga);

                            // Isi hidden input dengan nomor KK
                            $('#no_kk_hidden').val(response.keluarga.no_kk);

                            // Tampilkan modal
                            $('#kkInfoModal').modal('show');
                        } else if (response.status === 'error') {
                            // Tampilkan pesan error dan alihkan halaman setelah 3 detik
                            $('#error-message').text(response.message).show();
                            setTimeout(function() {
                                window.location.href = response.redirect;
                            }, 1000);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Tampilkan pesan error dari server jika ada kesalahan lain
                        let errorMessage = xhr.status + ': ' + xhr.statusText;
                        $('#error-message').text('Error - ' + errorMessage).show();
                    }
                });
            });

            // Logic untuk menampilkan form sekolah/perguruan tinggi berdasarkan jenjang
            $('#jenjang_pendidikan').on('change', function() {
                let jenjang = $(this).val();
                if (jenjang === 'sd' || jenjang === 'smp' || jenjang === 'sma') {
                    $('#sekolah_section').show();
                    $('#pt_section').hide();
                } else if (jenjang === 'perguruan_tinggi') {
                    $('#sekolah_section').hide();
                    $('#pt_section').show();
                } else {
                    $('#sekolah_section').hide();
                    $('#pt_section').hide();
                }
            });
        });
    </script>
@endsection
