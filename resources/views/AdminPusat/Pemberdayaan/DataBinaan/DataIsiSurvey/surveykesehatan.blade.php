<form action="{{ route('surveykeluarga.store', $keluarga->id_keluarga) }}" method="POST" id="surveyForm">
    @csrf
    <input type="hidden" name="tab" value="data-kesehatan">

    <!-- Sumber Air Bersih -->
    <div class="form-group">
        <label for="sumber_air_bersih">Sumber Air Bersih</label>
        <select name="sumber_air_bersih" id="sumber_air_bersih" class="form-control" required>
            <option value="">Pilih Sumber Air Bersih...</option>
            <option value="Sumur" {{ old('sumber_air_bersih', $survey->sumber_air_bersih ?? '') == 'Sumur' ? 'selected' : '' }}>Sumur</option>
            <option value="Sungai" {{ old('sumber_air_bersih', $survey->sumber_air_bersih ?? '') == 'Sungai' ? 'selected' : '' }}>Sungai</option>
            <option value="PDAM" {{ old('sumber_air_bersih', $survey->sumber_air_bersih ?? '') == 'PDAM' ? 'selected' : '' }}>PDAM</option>
            <option value="Lainnya" {{ old('sumber_air_bersih', $survey->sumber_air_bersih ?? '') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
        </select>
    </div>

    <!-- Jamban dan Saluran Limbah -->
    <div class="form-group">
        <label for="jamban_limbah">Jamban dan Saluran Limbah</label>
        <select name="jamban_limbah" id="jamban_limbah" class="form-control" required>
            <option value="">Pilih Jamban dan Saluran Limbah...</option>
            <option value="Sungai" {{ old('jamban_limbah', $survey->jamban_limbah ?? '') == 'Sungai' ? 'selected' : '' }}>Sungai</option>
            <option value="Sepitank" {{ old('jamban_limbah', $survey->jamban_limbah ?? '') == 'Sepitank' ? 'selected' : '' }}>Sepitank</option>
            <option value="Lainnya" {{ old('jamban_limbah', $survey->jamban_limbah ?? '') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
        </select>
    </div>

    <!-- Tempat Pembuangan Sampah -->
    <div class="form-group">
        <label>Tempat Pembuangan Sampah</label>
        <div>
            <label><input type="radio" name="tempat_sampah" value="TPS" {{ old('tempat_sampah', $survey->tempat_sampah ?? '') == 'TPS' ? 'checked' : '' }} required> TPS</label>
            <label><input type="radio" name="tempat_sampah" value="Sungai" {{ old('tempat_sampah', $survey->tempat_sampah ?? '') == 'Sungai' ? 'checked' : '' }} required> Sungai</label>
            <label><input type="radio" name="tempat_sampah" value="Pekarangan" {{ old('tempat_sampah', $survey->tempat_sampah ?? '') == 'Pekarangan' ? 'checked' : '' }} required> Pekarangan</label>
        </div>
    </div>

    <!-- Terdapat Perokok -->
    <div class="form-group">
        <label>Terdapat Perokok</label>
        <div>
            <label><input type="radio" name="perokok" value="Ya" {{ old('perokok', $survey->perokok ?? '') == 'Ya' ? 'checked' : '' }} required> Ya</label>
            <label><input type="radio" name="perokok" value="Tidak" {{ old('perokok', $survey->perokok ?? '') == 'Tidak' ? 'checked' : '' }} required> Tidak</label>
        </div>
    </div>

    <!-- Terdapat Konsumen Miras -->
    <div class="form-group">
        <label>Terdapat Konsumen Miras</label>
        <div>
            <label><input type="radio" name="konsumen_miras" value="Ya" {{ old('konsumen_miras', $survey->konsumen_miras ?? '') == 'Ya' ? 'checked' : '' }} required> Ya</label>
            <label><input type="radio" name="konsumen_miras" value="Tidak" {{ old('konsumen_miras', $survey->konsumen_miras ?? '') == 'Tidak' ? 'checked' : '' }} required> Tidak</label>
        </div>
    </div>

    <!-- Terdapat Persediaan Obat P3K -->
    <div class="form-group">
        <label>Terdapat Persediaan Obat P3K</label>
        <div>
            <label><input type="radio" name="persediaan_p3k" value="Ya" {{ old('persediaan_p3k', $survey->persediaan_p3k ?? '') == 'Ya' ? 'checked' : '' }} required> Ya</label>
            <label><input type="radio" name="persediaan_p3k" value="Tidak" {{ old('persediaan_p3k', $survey->persediaan_p3k ?? '') == 'Tidak' ? 'checked' : '' }} required> Tidak</label>
        </div>
    </div>

    <!-- Makan Buah dan Sayur Setiap Hari -->
    <div class="form-group">
        <label>Makan Buah dan Sayur Setiap Hari</label>
        <div>
            <label><input type="radio" name="makan_buah_sayur" value="Ya" {{ old('makan_buah_sayur', $survey->makan_buah_sayur ?? '') == 'Ya' ? 'checked' : '' }} required> Ya</label>
            <label><input type="radio" name="makan_buah_sayur" value="Tidak" {{ old('makan_buah_sayur', $survey->makan_buah_sayur ?? '') == 'Tidak' ? 'checked' : '' }} required> Tidak</label>
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
        const fields = [
            'sumber_air_bersih', 'jamban_limbah', 'tempat_sampah',
            'perokok', 'konsumen_miras', 'persediaan_p3k', 'makan_buah_sayur'
        ];

        // Fungsi untuk memuat data dari localStorage
        function loadFormData() {
            fields.forEach(field => {
                const storedValue = localStorage.getItem(`${keluargaId}_${field}`);
                if (storedValue) {
                    if ($(`input[name=${field}]`).is(':radio')) {
                        $(`input[name=${field}][value=${storedValue}]`).prop('checked', true);
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
