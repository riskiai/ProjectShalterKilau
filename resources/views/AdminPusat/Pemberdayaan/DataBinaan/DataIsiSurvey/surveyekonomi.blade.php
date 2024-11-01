<form action="{{ route('surveykeluarga.store', $keluarga->id_keluarga) }}" method="POST" id="surveyForm">
    @csrf
    <input type="hidden" name="tab" value="data-ekonomi">

    <!-- Pekerjaan Kepala Keluarga -->
    <div class="form-group">
        <label for="pekerjaan_kepala_keluarga">Pekerjaan Kepala Keluarga</label>
        <select name="pekerjaan_kepala_keluarga" id="pekerjaan_kepala_keluarga" class="form-control" required>
            <option value="">Pilih Pekerjaan</option>
            <option value="Petani"
                {{ old('pekerjaan_kepala_keluarga', $survey->pekerjaan_kepala_keluarga ?? '') == 'Petani' ? 'selected' : '' }}>
                Petani</option>
            <option value="Nelayan"
                {{ old('pekerjaan_kepala_keluarga', $survey->pekerjaan_kepala_keluarga ?? '') == 'Nelayan' ? 'selected' : '' }}>
                Nelayan</option>
            <option value="Peternak"
                {{ old('pekerjaan_kepala_keluarga', $survey->pekerjaan_kepala_keluarga ?? '') == 'Peternak' ? 'selected' : '' }}>
                Peternak</option>
            <option value="PNS NON Dosen/Guru"
                {{ old('pekerjaan_kepala_keluarga', $survey->pekerjaan_kepala_keluarga ?? '') == 'PNS NON Dosen/Guru' ? 'selected' : '' }}>
                PNS NON Dosen/Guru</option>
            <option value="Guru PNS"
                {{ old('pekerjaan_kepala_keluarga', $survey->pekerjaan_kepala_keluarga ?? '') == 'Guru PNS' ? 'selected' : '' }}>
                Guru PNS</option>
            <option value="Guru Non PNS"
                {{ old('pekerjaan_kepala_keluarga', $survey->pekerjaan_kepala_keluarga ?? '') == 'Guru Non PNS' ? 'selected' : '' }}>
                Guru Non PNS</option>
            <option value="Karyawan Swasta"
                {{ old('pekerjaan_kepala_keluarga', $survey->pekerjaan_kepala_keluarga ?? '') == 'Karyawan Swasta' ? 'selected' : '' }}>
                Karyawan Swasta</option>
            <option value="Buruh"
                {{ old('pekerjaan_kepala_keluarga', $survey->pekerjaan_kepala_keluarga ?? '') == 'Buruh' ? 'selected' : '' }}>
                Buruh</option>
            <option value="Wiraswasta"
                {{ old('pekerjaan_kepala_keluarga', $survey->pekerjaan_kepala_keluarga ?? '') == 'Wiraswasta' ? 'selected' : '' }}>
                Wiraswasta</option>
            <option value="Wirausaha"
                {{ old('pekerjaan_kepala_keluarga', $survey->pekerjaan_kepala_keluarga ?? '') == 'Wirausaha' ? 'selected' : '' }}>
                Wirausaha</option>
            <option value="Pedagang Kecil"
                {{ old('pekerjaan_kepala_keluarga', $survey->pekerjaan_kepala_keluarga ?? '') == 'Pedagang Kecil' ? 'selected' : '' }}>
                Pedagang Kecil</option>
            <option value="Pedagang Besar"
                {{ old('pekerjaan_kepala_keluarga', $survey->pekerjaan_kepala_keluarga ?? '') == 'Pedagang Besar' ? 'selected' : '' }}>
                Pedagang Besar</option>
            <option value="Pensiunan"
                {{ old('pekerjaan_kepala_keluarga', $survey->pekerjaan_kepala_keluarga ?? '') == 'Pensiunan' ? 'selected' : '' }}>
                Pensiunan</option>
            <option value="Tidak Bekerja"
                {{ old('pekerjaan_kepala_keluarga', $survey->pekerjaan_kepala_keluarga ?? '') == 'Tidak Bekerja' ? 'selected' : '' }}>
                Tidak Bekerja</option>
            <option value="Sudah Meninggal"
                {{ old('pekerjaan_kepala_keluarga', $survey->pekerjaan_kepala_keluarga ?? '') == 'Sudah Meninggal' ? 'selected' : '' }}>
                Sudah Meninggal</option>
            <option value="Lainnya"
                {{ old('pekerjaan_kepala_keluarga', $survey->pekerjaan_kepala_keluarga ?? '') == 'Lainnya' ? 'selected' : '' }}>
                Lainnya</option>
        </select>
    </div>

    <!-- Penghasilan -->
    <div class="form-group">
        <label for="penghasilan">Rata-rata Penghasilan Perbulan Kepala Keluarga</label>
        <select name="penghasilan" id="penghasilan" class="form-control" required>
            <option value="">Pilih Penghasilan...</option>
            <option value="dibawah_500k"
                {{ old('penghasilan', $survey->penghasilan ?? '') == 'dibawah_500k' ? 'selected' : '' }}>Di bawah Rp.
                500.000</option>
            <option value="500k_1500k"
                {{ old('penghasilan', $survey->penghasilan ?? '') == '500k_1500k' ? 'selected' : '' }}>Rp.500.000,- s/d
                Rp.1.500.000,-</option>
            <option value="1500k_2500k"
                {{ old('penghasilan', $survey->penghasilan ?? '') == '1500k_2500k' ? 'selected' : '' }}>Rp.1.500.000,-
                s/d Rp.2.500.000,-</option>
            <option value="2500k_3500k"
                {{ old('penghasilan', $survey->penghasilan ?? '') == '2500k_3500k' ? 'selected' : '' }}>Rp.2.500.000,-
                s/d Rp.3.500.000,-</option>
            <option value="3500k_5000k"
                {{ old('penghasilan', $survey->penghasilan ?? '') == '3500k_5000k' ? 'selected' : '' }}>Rp.3.500.000,-
                s/d Rp.5.000.000,-</option>
            <option value="5000k_7000k"
                {{ old('penghasilan', $survey->penghasilan ?? '') == '5000k_7000k' ? 'selected' : '' }}>Rp.5.000.000,-
                s/d Rp.7.000.000,-</option>
            <option value="7000k_10000k"
                {{ old('penghasilan', $survey->penghasilan ?? '') == '7000k_10000k' ? 'selected' : '' }}>Rp.7.000.000,-
                s/d Rp.10.000.000,-</option>
            <option value="diatas_10000k"
                {{ old('penghasilan', $survey->penghasilan ?? '') == 'diatas_10000k' ? 'selected' : '' }}>Di atas
                Rp.10.000.000,-</option>
        </select>
    </div>

    <!-- Kepemilikan Tabungan -->
    <div class="form-group">
        <label>Kepemilikan Tabungan</label>
        <div>
            <label><input type="radio" name="kepemilikan_tabungan" value="Ya"
                    {{ old('kepemilikan_tabungan', $survey->kepemilikan_tabungan ?? '') == 'Ya' ? 'checked' : '' }}
                    required> Ya</label>
            <label><input type="radio" name="kepemilikan_tabungan" value="Tidak"
                    {{ old('kepemilikan_tabungan', $survey->kepemilikan_tabungan ?? '') == 'Tidak' ? 'checked' : '' }}
                    required> Tidak</label>
        </div>
    </div>

    <!-- Jumlah Makan -->
    <div class="form-group">
        <label>Makan 2x atau Lebih</label>
        <div>
            <label><input type="radio" name="jumlah_makan" value="Ya"
                    {{ old('jumlah_makan', $survey->jumlah_makan ?? '') == 'Ya' ? 'checked' : '' }} required>
                Ya</label>
            <label><input type="radio" name="jumlah_makan" value="Tidak"
                    {{ old('jumlah_makan', $survey->jumlah_makan ?? '') == 'Tidak' ? 'checked' : '' }} required>
                Tidak</label>
        </div>
    </div>

    <!-- Tombol Simpan hanya di tab terakhir -->
    @if (request()->get('tab') == 'data-survey')
        <div class="form-group btn-submit mt-4">
            <button type="submit" id="submitBtn" class="btn btn-primary">Simpan
                Data</button>
            <a href="{{ route('surveykeluarga') }}" class="btn btn-secondary">Batal</a>
        </div>
    @endif
</form>

@section('scripts')
    <script>
        $(document).ready(function() {
            const keluargaId = "{{ $keluarga->id_keluarga }}";
            const fields = ['pekerjaan_kepala_keluarga', 'penghasilan', 'kepemilikan_tabungan', 'jumlah_makan'];

            // Fungsi untuk memuat data dari localStorage
            function loadFormData() {
                fields.forEach(field => {
                    const storedValue = localStorage.getItem(`${keluargaId}_${field}`);
                    if (storedValue) {
                        if ($(`input[name=${field}]`).is(':radio')) {
                            // Jika input adalah radio button, gunakan prop checked
                            $(`input[name=${field}][value="${storedValue}"]`).prop('checked', true);
                        } else {
                            // Jika input bukan radio, gunakan val untuk mengatur nilai
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

            // Penanda untuk mengecek apakah halaman ditutup atau hanya pindah tab
            let isTabChange = false;

            // Deteksi perubahan tab
            $('.nav-link').click(function() {
                isTabChange = true;
            });

            // Hapus data dari localStorage hanya jika halaman direfresh atau ditutup
            $(window).on('beforeunload', function(event) {
                if (!isTabChange) {
                    // Jika bukan peralihan antar-tab, hapus data
                    fields.forEach(field => {
                        localStorage.removeItem(`${keluargaId}_${field}`);
                    });
                }
            });
        });
    </script>
@endsection
