@extends('AdminPusat.App.master')

@section('style')
    <style>
        .btn-profile { margin-bottom: 20px; }
        .detail-title { font-size: 1.2rem; font-weight: bold; }
        .detail-value { font-size: 1rem; margin-bottom: 10px; }
        .info-section { display: flex; justify-content: space-between; align-items: center; padding: 10px; }
        .status-badge { display: flex; align-items: center; gap: 10px; }
        .nav-tabs .nav-link { color: #5a5a5a; font-size: 1.1rem; padding: 10px 15px; border: 1px solid transparent; }
        .nav-tabs .nav-link.active { color: #5a5a5a; border-color: #5a5a5a; border-bottom-color: white; }
        .nav-tabs { margin-bottom: 20px; }
        .data-center { text-align: center; font-size: 1.5rem; font-weight: bold; margin-top: 20px; margin-bottom: 20px; }
        .form-control { margin-bottom: 15px; }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header info-section">
                            <h4 class="card-title">Form Survey Calon Anak Binaan - Dari Kepala Keluarga
                                {{ $keluarga->kepala_keluarga }}</h4>
                        </div>
                        <div class="card-body">
                            <!-- Tab Navigation -->
                            @include('AdminPusat.Pemberdayaan.DataBinaan.DataIsiSurvey.navbarDataSurvey')

                            <!-- Form utama yang mencakup semua tab -->
                            <form action="{{ route('surveykeluarga.store', $keluarga->id_keluarga) }}" method="POST" id="surveyForm">
                                @csrf
                                <!-- Konten dinamis berdasarkan tab yang dipilih -->
                                <div class="row">
                                    <!-- Tab Data Ekonomi -->
                                    @if (request()->get('tab') == 'data-ekonomi')
                                        @include('AdminPusat.Pemberdayaan.DataBinaan.DataIsiSurvey.surveyekonomi')
                                    @endif

                                    <!-- Tab Data Asset -->
                                    @if (request()->get('tab') == 'data-asset')
                                        @include('AdminPusat.Pemberdayaan.DataBinaan.DataIsiSurvey.surveyasset')
                                    @endif

                                    <!-- Tab Data Kesehatan -->
                                    @if (request()->get('tab') == 'data-kesehatan')
                                        @include('AdminPusat.Pemberdayaan.DataBinaan.DataIsiSurvey.surveykesehatan')
                                    @endif

                                    <!-- Tab Data Ibadah -->
                                    @if (request()->get('tab') == 'data-ibadah')
                                        @include('AdminPusat.Pemberdayaan.DataBinaan.DataIsiSurvey.surveyibadah')
                                    @endif

                                    <!-- Tab Data Lainnya -->
                                    @if (request()->get('tab') == 'data-lainnya')
                                        @include('AdminPusat.Pemberdayaan.DataBinaan.DataIsiSurvey.surveylainnya')
                                    @endif

                                    <!-- Tab Data Survey -->
                                    @if (request()->get('tab') == 'data-survey')
                                        @include('AdminPusat.Pemberdayaan.DataBinaan.DataIsiSurvey.datasurvey')
                                    @endif

                                    <!-- Tab Data Keluarga -->
                                    @if (request()->get('tab') == 'data-keluarga')
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <input type="hidden" name="tab" value="data-keluarga">
                                        <div class="form-group">
                                            <label>No. Kartu Keluarga</label>
                                            <input type="text" class="form-control"
                                                value="{{ $keluarga->no_kk }} a/n {{ $keluarga->kepala_keluarga }}"
                                                readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="pendidikan_kepala_keluarga">Pendidikan Terakhir Kepala
                                                Keluarga</label>
                                            <select name="pendidikan_kepala_keluarga" id="pendidikan_kepala_keluarga"
                                                class="form-control" required>
                                                <option value="">Pilih Pendidikan</option>
                                                <option value="Tidak Sekolah"
                                                    {{ old('pendidikan_kepala_keluarga', $survey->pendidikan_kepala_keluarga ?? '') == 'Tidak Sekolah' ? 'selected' : '' }}>
                                                    Tidak Sekolah</option>
                                                <option value="Sekolah Dasar"
                                                    {{ old('pendidikan_kepala_keluarga', $survey->pendidikan_kepala_keluarga ?? '') == 'Sekolah Dasar' ? 'selected' : '' }}>
                                                    Sekolah Dasar</option>
                                                <option value="SMP/MTS/SEDERAJAT"
                                                    {{ old('pendidikan_kepala_keluarga', $survey->pendidikan_kepala_keluarga ?? '') == 'SMP/MTS/SEDERAJAT' ? 'selected' : '' }}>
                                                    SMP/MTS/SEDERAJAT</option>
                                                <option value="SMK/SMA/MA/SEDERAJAT"
                                                    {{ old('pendidikan_kepala_keluarga', $survey->pendidikan_kepala_keluarga ?? '') == 'SMK/SMA/MA/SEDERAJAT' ? 'selected' : '' }}>
                                                    SMK/SMA/MA/SEDERAJAT</option>
                                                <option value="DIPLOMA I"
                                                    {{ old('pendidikan_kepala_keluarga', $survey->pendidikan_kepala_keluarga ?? '') == 'DIPLOMA I' ? 'selected' : '' }}>
                                                    DIPLOMA I</option>
                                                <option value="DIPLOMA II"
                                                    {{ old('pendidikan_kepala_keluarga', $survey->pendidikan_kepala_keluarga ?? '') == 'DIPLOMA II' ? 'selected' : '' }}>
                                                    DIPLOMA II</option>
                                                <option value="DIPLOMA III"
                                                    {{ old('pendidikan_kepala_keluarga', $survey->pendidikan_kepala_keluarga ?? '') == 'DIPLOMA III' ? 'selected' : '' }}>
                                                    DIPLOMA III</option>
                                                <option value="STRATA-1"
                                                    {{ old('pendidikan_kepala_keluarga', $survey->pendidikan_kepala_keluarga ?? '') == 'STRATA-1' ? 'selected' : '' }}>
                                                    STRATA-1</option>
                                                <option value="STRATA-2"
                                                    {{ old('pendidikan_kepala_keluarga', $survey->pendidikan_kepala_keluarga ?? '') == 'STRATA-2' ? 'selected' : '' }}>
                                                    STRATA-2</option>
                                                <option value="STRATA-3"
                                                    {{ old('pendidikan_kepala_keluarga', $survey->pendidikan_kepala_keluarga ?? '') == 'STRATA-3' ? 'selected' : '' }}>
                                                    STRATA-3</option>
                                                <option value="LAINNYA"
                                                    {{ old('pendidikan_kepala_keluarga', $survey->pendidikan_kepala_keluarga ?? '') == 'LAINNYA' ? 'selected' : '' }}>
                                                    LAINNYA</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="jumlah_tanggungan">Jumlah Tanggungan Kepala Keluarga</label>
                                            <input type="number" name="jumlah_tanggungan" id="jumlah_tanggungan"
                                                class="form-control" min="0"
                                                value="{{ old('jumlah_tanggungan', $survey->jumlah_tanggungan ?? '') }}"
                                                required>
                                        </div>
                                    @endif

                                    <!-- Tombol Simpan hanya di tab terakhir -->
                                    @if (request()->get('tab') == 'data-survey')
                                        <div class="form-group btn-submit mt-4">
                                            @if(isset($survey->hasil_survey) && isset($survey->keterangan_hasil))
                                                <button type="submit" id="submitBtn" class="btn btn-primary">Ubah Data</button>
                                                <a href="{{ route('validasisurveykeluarga') }}" class="btn btn-secondary">Kembali</a>
                                            @else
                                                <button type="submit" id="submitBtn" class="btn btn-primary">Simpan Data</button>
                                                <a href="{{ route('surveykeluarga') }}" class="btn btn-secondary">Batal</a>
                                            @endif
                                        </div>
                                    @endif
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
        const keluargaId = "{{ $keluarga->id_keluarga }}";
        const fields = [
            // Tambahkan semua field yang diperlukan
            'pendidikan_kepala_keluarga', 'jumlah_tanggungan', // Keluarga
            'pekerjaan_kepala_keluarga', 'penghasilan', 'kepemilikan_tabungan', 'jumlah_makan', // Ekonomi
            'kepemilikan_tanah', 'kepemilikan_rumah', 'kondisi_rumah_dinding',
            'kondisi_rumah_lantai', 'kepemilikan_kendaraan', 'kepemilikan_elektronik', // Asset
            'sumber_air_bersih', 'jamban_limbah', 'tempat_sampah', 'perokok', 'konsumen_miras', 'persediaan_p3k', 'makan_buah_sayur', // Kesehatan
            'solat_lima_waktu', 'membaca_alquran', 'majelis_taklim', 'membaca_koran', 'pengurus_organisasi', 'pengurus_organisasi_sebagai', // Ibadah
            'status_anak', 'biaya_pendidikan_perbulan', 'bantuan_lembaga_formal_lain', 'bantuan_lembaga_formal_lain_sebesar', // Lainnya
            'kondisi_penerima_manfaat', 'petugas_survey' // Survey
        ];

        // Fungsi untuk memuat data dari localStorage
        function loadFormData() {
            fields.forEach(field => {
                const storedValue = localStorage.getItem(`${keluargaId}_${field}`);
                if (storedValue) {
                    if ($(`input[name=${field}]`).is(':radio')) {
                        $(`input[name=${field}][value="${storedValue}"]`).prop('checked', true);
                    } else {
                        $(`#${field}`).val(storedValue);
                    }
                }
            });
        }

        // Muat data saat halaman pertama kali dimuat atau tab dibuka
        loadFormData();

        // Simpan data ke localStorage setiap ada perubahan pada input
        $('#surveyForm').on('input change', 'input, select', function() {
            const fieldName = $(this).attr('name');
            const fieldValue = $(this).val();
            localStorage.setItem(`${keluargaId}_${fieldName}`, fieldValue);
        });

        // Deteksi perubahan tab
        let isTabChange = false;
        $('.nav-link').click(function() {
            isTabChange = true;
        });

        // Hapus data dari localStorage hanya jika halaman direfresh atau ditutup
        $(window).on('beforeunload', function(event) {
            if (!isTabChange) {
                fields.forEach(field => {
                    localStorage.removeItem(`${keluargaId}_${field}`);
                });
            }
        });
    });
</script>
@endsection
