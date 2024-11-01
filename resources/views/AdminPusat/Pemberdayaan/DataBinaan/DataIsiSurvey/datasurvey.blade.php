@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('surveykeluarga.store', $keluarga->id_keluarga) }}" method="POST" id="surveyForm">
    @csrf
    <input type="hidden" name="tab" value="data-survey">

    <!-- Kondisi Calon Penerima Manfaat -->
    <div class="form-group">
        <label for="kondisi_penerima_manfaat">Resume Diskriptiif, Kondisi Calon Penerima Manfaat</label>
        <textarea name="kondisi_penerima_manfaat" id="kondisi_penerima_manfaat" class="form-control"
            placeholder="Deskripsikan kondisi penerima manfaat">{{ old('kondisi_penerima_manfaat', $survey->kondisi_penerima_manfaat ?? '') }}</textarea>
    </div>

    <!-- Petugas Survey -->
    <div class="form-group">
        <label for="petugas_survey">Petugas Survey</label>
        <input type="text" name="petugas_survey" id="petugas_survey" class="form-control"
            value="{{ old('petugas_survey', $survey->petugas_survey ?? '') }}" placeholder="Nama petugas survey">
    </div>

    <!-- Hasil Survey dan Keterangan Hasil, Tampilkan Hanya Jika Data Survey Sudah Disimpan -->
    @if(isset($survey->hasil_survey) && isset($survey->keterangan_hasil))
        <div class="form-group">
            <label for="hasil_survey">Hasil Survey</label>
            <input type="text" name="hasil_survey" id="hasil_survey" class="form-control"
                value="{{ $survey->hasil_survey }}" readonly>
        </div>

        <div class="form-group">
            <label for="keterangan_hasil">Keterangan Hasil</label>
            <textarea name="keterangan_hasil" id="keterangan_hasil" class="form-control" readonly>{{ $survey->keterangan_hasil }}</textarea>
        </div>
    @endif

    <!-- Tombol Simpan hanya di tab terakhir -->
    {{-- @if (request()->get('tab') == 'data-survey')
     <div class="form-group btn-submit mt-4">
         <button type="submit" id="submitBtn" class="btn btn-primary">Simpan
             Data</button>
         <a href="{{ route('surveykeluarga') }}" class="btn btn-secondary">Batal</a>
     </div>
 @endif --}}
</form>

@section('scripts')
    <script>
        $(document).ready(function() {
            const keluargaId = "{{ $keluarga->id_keluarga }}";
            const fields = [
                'pendidikan_kepala_keluarga', 'jumlah_tanggungan', // Keluarga
                'pekerjaan_kepala_keluarga', 'penghasilan', 'kepemilikan_tabungan', 'jumlah_makan', // Ekonomi
                'kepemilikan_tanah', 'kepemilikan_rumah', 'kondisi_rumah_dinding',
                'kondisi_rumah_lantai', 'kepemilikan_kendaraan', 'kepemilikan_elektronik', // Asset
                'sumber_air_bersih', 'jamban_limbah', 'tempat_sampah', 'perokok', 'konsumen_miras',
                'persediaan_p3k', 'makan_buah_sayur', // Kesehatan
                'solat_lima_waktu', 'membaca_alquran', 'majelis_taklim', 'membaca_koran', 'pengurus_organisasi',
                'pengurus_organisasi_sebagai', // Ibadah
                'status_anak', 'biaya_pendidikan_perbulan', 'bantuan_lembaga_formal_lain',
                'bantuan_lembaga_formal_lain_sebesar', // Lainnya
                'kondisi_penerima_manfaat', 'petugas_survey' // Survey
            ];

            // Fungsi untuk memuat data dari localStorage ke dalam form
            function loadFormData() {
                fields.forEach(field => {
                    const storedValue = localStorage.getItem(`${keluargaId}_${field}`);
                    if (storedValue) {
                        if ($(`#${field}`).length) {
                            // Jika input sudah ada, gunakan langsung
                            $(`#${field}`).val(storedValue);
                        } else if (window.location.href.includes("tab=data-survey")) {
                            // Jika di tab 'data-survey', tambahkan sebagai input hidden
                            $('<input>').attr({
                                type: 'hidden',
                                id: `hidden_${field}`,
                                name: field,
                                value: storedValue
                            }).appendTo('#surveyForm');
                        }
                    }
                });
            }

            // Muat data saat halaman pertama kali dimuat atau tab dibuka
            loadFormData();

            // Simpan data ke localStorage setiap ada perubahan pada input
            $('#surveyForm').on('input change', 'input, select, textarea', function() {
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
                fields.forEach(field => {
                    localStorage.removeItem(`${keluargaId}_${field}`);
                });
            });
        });
    </script>
@endsection
