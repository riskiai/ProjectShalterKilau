<form action="{{ route('surveykeluarga.store', $keluarga->id_keluarga) }}" method="POST" id="surveyForm">
    @csrf
    <input type="hidden" name="tab" value="data-ibadah">

    <!-- Solat 5 Waktu -->
    <div class="form-group">
        <label>Solat 5 Waktu</label>
        <div>
            <label><input type="radio" name="solat_lima_waktu" value="Lengkap" {{ old('solat_lima_waktu', $survey->solat_lima_waktu ?? '') == 'Lengkap' ? 'checked' : '' }} required> Lengkap</label>
            <label><input type="radio" name="solat_lima_waktu" value="Kadang-kadang" {{ old('solat_lima_waktu', $survey->solat_lima_waktu ?? '') == 'Kadang-kadang' ? 'checked' : '' }} required> Kadang-kadang</label>
            <label><input type="radio" name="solat_lima_waktu" value="Tidak Pernah" {{ old('solat_lima_waktu', $survey->solat_lima_waktu ?? '') == 'Tidak Pernah' ? 'checked' : '' }} required> Tidak Pernah</label>
        </div>
    </div>

    <!-- Membaca Al-Quran -->
    <div class="form-group">
        <label>Membaca Al-Quran</label>
        <div>
            <label><input type="radio" name="membaca_alquran" value="Lancar" {{ old('membaca_alquran', $survey->membaca_alquran ?? '') == 'Lancar' ? 'checked' : '' }} required> Lancar</label>
            <label><input type="radio" name="membaca_alquran" value="Terbata-bata" {{ old('membaca_alquran', $survey->membaca_alquran ?? '') == 'Terbata-bata' ? 'checked' : '' }} required> Terbata-bata</label>
            <label><input type="radio" name="membaca_alquran" value="Tidak Bisa" {{ old('membaca_alquran', $survey->membaca_alquran ?? '') == 'Tidak Bisa' ? 'checked' : '' }} required> Tidak Bisa</label>
        </div>
    </div>

    <!-- Majelis Taklim -->
    <div class="form-group">
        <label>Majelis Taklim</label>
        <div>
            <label><input type="radio" name="majelis_taklim" value="Rutin" {{ old('majelis_taklim', $survey->majelis_taklim ?? '') == 'Rutin' ? 'checked' : '' }} required> Rutin</label>
            <label><input type="radio" name="majelis_taklim" value="Jarang" {{ old('majelis_taklim', $survey->majelis_taklim ?? '') == 'Jarang' ? 'checked' : '' }} required> Jarang</label>
            <label><input type="radio" name="majelis_taklim" value="Tidak Pernah" {{ old('majelis_taklim', $survey->majelis_taklim ?? '') == 'Tidak Pernah' ? 'checked' : '' }} required> Tidak Pernah</label>
        </div>
    </div>

    <!-- Membaca Koran -->
    <div class="form-group">
        <label>Membaca Koran</label>
        <div>
            <label><input type="radio" name="membaca_koran" value="Selalu" {{ old('membaca_koran', $survey->membaca_koran ?? '') == 'Selalu' ? 'checked' : '' }} required> Selalu</label>
            <label><input type="radio" name="membaca_koran" value="Jarang" {{ old('membaca_koran', $survey->membaca_koran ?? '') == 'Jarang' ? 'checked' : '' }} required> Jarang</label>
            <label><input type="radio" name="membaca_koran" value="Tidak Pernah" {{ old('membaca_koran', $survey->membaca_koran ?? '') == 'Tidak Pernah' ? 'checked' : '' }} required> Tidak Pernah</label>
        </div>
    </div>

    <!-- Pengurus Organisasi -->
    <div class="form-group">
        <label>Pengurus Organisasi</label>
        <div>
            <label><input type="radio" name="pengurus_organisasi" value="Ya" {{ old('pengurus_organisasi', $survey->pengurus_organisasi ?? '') == 'Ya' ? 'checked' : '' }} required> Ya</label>
            <label><input type="radio" name="pengurus_organisasi" value="Tidak" {{ old('pengurus_organisasi', $survey->pengurus_organisasi ?? '') == 'Tidak' ? 'checked' : '' }} required> Tidak</label>
        </div>
    </div>

    <!-- Jika Tidak sebagai pengurus organisasi, tampilkan input tambahan -->
    <div class="form-group" id="pengurusOrganisasiLainnya" style="{{ old('pengurus_organisasi', $survey->pengurus_organisasi ?? '') == 'Ya' ? '' : 'display: none;' }}">
        <label for="pengurus_organisasi_sebagai">Sebagai</label>
        <input type="text" name="pengurus_organisasi_sebagai" class="form-control" value="{{ old('pengurus_organisasi_sebagai', $survey->pengurus_organisasi_sebagai ?? '') }}">
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
            'solat_lima_waktu', 'membaca_alquran', 'majelis_taklim',
            'membaca_koran', 'pengurus_organisasi', 'pengurus_organisasi_sebagai'
        ];

        // Fungsi untuk memuat data dari localStorage
        function loadFormData() {
            fields.forEach(field => {
                const storedValue = localStorage.getItem(`${keluargaId}_${field}`);
                if (storedValue) {
                    if ($(`input[name=${field}]`).is(':radio')) {
                        $(`input[name=${field}][value=${storedValue}]`).prop('checked', true);
                    } else {
                        $(`input[name="${field}"], #${field}`).val(storedValue);
                    }
                }
            });

            // Tampilkan atau sembunyikan input "Sebagai" sesuai kondisi "Pengurus Organisasi"
            togglePengurusOrganisasi();
        }

        // Toggle untuk input tambahan "Sebagai" jika "Ya" dipilih pada pengurus_organisasi
        function togglePengurusOrganisasi() {
            const isPengurus = $('input[name="pengurus_organisasi"]:checked').val() === 'Ya';
            $('#pengurusOrganisasiLainnya').toggle(isPengurus);
        }

        // Muat data saat halaman pertama kali dimuat atau tab dibuka
        loadFormData();

        // Simpan data ke localStorage setiap ada perubahan pada input
        $('#surveyForm').on('input change', 'input, select', function() {
            const fieldName = $(this).attr('name');
            const fieldValue = $(this).val();
            localStorage.setItem(`${keluargaId}_${fieldName}`, fieldValue);
        });

        // Deteksi perubahan untuk pengurus organisasi
        $('input[name="pengurus_organisasi"]').change(function() {
            togglePengurusOrganisasi();

            // Hapus input "pengurus_organisasi_sebagai" dari localStorage jika "Tidak" dipilih
            if ($(this).val() === 'Tidak') {
                $('#pengurusOrganisasiLainnya input').val('');
                localStorage.removeItem(`${keluargaId}_pengurus_organisasi_sebagai`);
            }
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

