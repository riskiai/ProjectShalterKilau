<form action="{{ route('surveykeluarga.store', $keluarga->id_keluarga) }}" method="POST" id="surveyForm">
    @csrf
    <input type="hidden" name="tab" value="data-asset">

    <!-- Kepemilikan Tanah -->
    <div class="form-group">
        <label>Kepemilikan Tanah</label>
        <div>
            <label><input type="radio" name="kepemilikan_tanah" value="Ya"
                    {{ old('kepemilikan_tanah', $survey->kepemilikan_tanah ?? '') == 'Ya' ? 'checked' : '' }} required>
                Ya</label>
            <label><input type="radio" name="kepemilikan_tanah" value="Tidak"
                    {{ old('kepemilikan_tanah', $survey->kepemilikan_tanah ?? '') == 'Tidak' ? 'checked' : '' }}
                    required> Tidak</label>
        </div>
    </div>

    <!-- Kepemilikan Rumah -->
    <div class="form-group">
        <label for="kepemilikan_rumah">Kepemilikan Rumah</label>
        <select name="kepemilikan_rumah" id="kepemilikan_rumah" class="form-control" required>
            <option value="">Pilih Kepemilikan Rumah...</option>
            <option value="Hak Milik"
                {{ old('kepemilikan_rumah', $survey->kepemilikan_rumah ?? '') == 'Hak Milik' ? 'selected' : '' }}>Hak
                Milik</option>
            <option value="Sewa"
                {{ old('kepemilikan_rumah', $survey->kepemilikan_rumah ?? '') == 'Sewa' ? 'selected' : '' }}>Sewa
            </option>
            <option value="Orang Tua"
                {{ old('kepemilikan_rumah', $survey->kepemilikan_rumah ?? '') == 'Orang Tua' ? 'selected' : '' }}>Orang
                Tua</option>
            <option value="Saudara"
                {{ old('kepemilikan_rumah', $survey->kepemilikan_rumah ?? '') == 'Saudara' ? 'selected' : '' }}>Saudara
            </option>
            <option value="Kerabat"
                {{ old('kepemilikan_rumah', $survey->kepemilikan_rumah ?? '') == 'Kerabat' ? 'selected' : '' }}>Kerabat
            </option>
        </select>
    </div>

    <!-- Kondisi Rumah -->
    <div class="form-group">
        <label>Kondisi Rumah:</label>

        <!-- Lantai -->
        <div class="mt-2">
            <label for="kondisi_rumah_lantai">Lantai</label>
            <select name="kondisi_rumah_lantai" id="kondisi_rumah_lantai" class="form-control" required>
                <option value="">Pilih Lantai...</option>
                <option value="Keramik"
                    {{ old('kondisi_rumah_lantai', $survey->kondisi_rumah_lantai ?? '') == 'Keramik' ? 'selected' : '' }}>
                    Keramik</option>
                <option value="Ubin"
                    {{ old('kondisi_rumah_lantai', $survey->kondisi_rumah_lantai ?? '') == 'Ubin' ? 'selected' : '' }}>
                    Ubin</option>
                <option value="Marmer"
                    {{ old('kondisi_rumah_lantai', $survey->kondisi_rumah_lantai ?? '') == 'Marmer' ? 'selected' : '' }}>
                    Marmer</option>
                <option value="Kayu"
                    {{ old('kondisi_rumah_lantai', $survey->kondisi_rumah_lantai ?? '') == 'Kayu' ? 'selected' : '' }}>
                    Kayu</option>
                <option value="Tanah"
                    {{ old('kondisi_rumah_lantai', $survey->kondisi_rumah_lantai ?? '') == 'Tanah' ? 'selected' : '' }}>
                    Tanah</option>
                <option value="Lainnya"
                    {{ old('kondisi_rumah_lantai', $survey->kondisi_rumah_lantai ?? '') == 'Lainnya' ? 'selected' : '' }}>
                    Lainnya</option>
            </select>
            <input type="text" name="kondisi_rumah_lantai_lainnya" class="form-control mt-2"
                placeholder="Isi disini jika lantai lainnya"
                style="{{ old('kondisi_rumah_lantai', $survey->kondisi_rumah_lantai ?? '') == 'Lainnya' ? '' : 'display: none;' }}">
        </div>

        <!-- Dinding -->
        <div class="mt-2">
            <label for="kondisi_rumah_dinding">Dinding</label>
            <select name="kondisi_rumah_dinding" id="kondisi_rumah_dinding" class="form-control" required>
                <option value="">Pilih Dinding...</option>
                <option value="Tembok"
                    {{ old('kondisi_rumah_dinding', $survey->kondisi_rumah_dinding ?? '') == 'Tembok' ? 'selected' : '' }}>
                    Tembok</option>
                <option value="Kayu"
                    {{ old('kondisi_rumah_dinding', $survey->kondisi_rumah_dinding ?? '') == 'Kayu' ? 'selected' : '' }}>
                    Kayu</option>
                <option value="Papan"
                    {{ old('kondisi_rumah_dinding', $survey->kondisi_rumah_dinding ?? '') == 'Papan' ? 'selected' : '' }}>
                    Papan</option>
                <option value="Geribik"
                    {{ old('kondisi_rumah_dinding', $survey->kondisi_rumah_dinding ?? '') == 'Geribik' ? 'selected' : '' }}>
                    Geribik</option>
                <option value="Lainnya"
                    {{ old('kondisi_rumah_dinding', $survey->kondisi_rumah_dinding ?? '') == 'Lainnya' ? 'selected' : '' }}>
                    Lainnya</option>
            </select>
            <input type="text" name="kondisi_rumah_dinding_lainnya" class="form-control mt-2"
                placeholder="Isi disini jika dinding lainnya"
                style="{{ old('kondisi_rumah_dinding', $survey->kondisi_rumah_dinding ?? '') == 'Lainnya' ? '' : 'display: none;' }}">
        </div>
    </div>

    <!-- Kepemilikan Kendaraan -->
    <div class="form-group">
        <label>Kepemilikan Kendaraan</label>
        <div>
            <label><input type="radio" name="kepemilikan_kendaraan" value="Sepeda"
                    {{ old('kepemilikan_kendaraan', $survey->kepemilikan_kendaraan ?? '') == 'Sepeda' ? 'checked' : '' }} required> Sepeda</label>
            <label><input type="radio" name="kepemilikan_kendaraan" value="Motor"
                    {{ old('kepemilikan_kendaraan', $survey->kepemilikan_kendaraan ?? '') == 'Motor' ? 'checked' : '' }} required> Motor</label>
            <label><input type="radio" name="kepemilikan_kendaraan" value="Mobil"
                    {{ old('kepemilikan_kendaraan', $survey->kepemilikan_kendaraan ?? '') == 'Mobil' ? 'checked' : '' }} required> Mobil</label>
        </div>
    </div>

    <!-- Kepemilikan Elektronik -->
    <div class="form-group">
        <label for="kepemilikan_elektronik">Kepemilikan Elektronik</label>
        <select name="kepemilikan_elektronik" id="kepemilikan_elektronik" class="form-control" required>
            <option value="">Pilih Kepemilikan Elektronik...</option>
            <option value="Radio" {{ old('kepemilikan_elektronik', $survey->kepemilikan_elektronik ?? '') == 'Radio' ? 'selected' : '' }}>Radio</option>
            <option value="Televisi" {{ old('kepemilikan_elektronik', $survey->kepemilikan_elektronik ?? '') == 'Televisi' ? 'selected' : '' }}>Televisi</option>
            <option value="Handphone" {{ old('kepemilikan_elektronik', $survey->kepemilikan_elektronik ?? '') == 'Handphone' ? 'selected' : '' }}>Handphone</option>
            <option value="Kulkas" {{ old('kepemilikan_elektronik', $survey->kepemilikan_elektronik ?? '') == 'Kulkas' ? 'selected' : '' }}>Kulkas</option>
        </select>
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
            'kepemilikan_tanah', 'kepemilikan_rumah', 'kondisi_rumah_lantai', 
            'kondisi_rumah_lantai_lainnya', 'kondisi_rumah_dinding', 
            'kondisi_rumah_dinding_lainnya', 'kepemilikan_kendaraan', 'kepemilikan_elektronik'
        ];

        // Fungsi untuk memuat data dari localStorage
        function loadFormData() {
            fields.forEach(field => {
                const storedValue = localStorage.getItem(`${keluargaId}_${field}`);
                if (storedValue) {
                    if ($(`input[name=${field}]`).is(':radio')) {
                        // Set nilai radio button
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
            console.log(`Saved ${fieldName}: ${fieldValue}`); // Debug log
        });

        // Tambahkan hidden input di tab 'data-survey' agar data tetap tersedia
        if (window.location.href.includes("tab=data-survey")) {
            fields.forEach(field => {
                const storedValue = localStorage.getItem(`${keluargaId}_${field}`);
                if (storedValue) {
                    $('<input>').attr({
                        type: 'hidden',
                        id: `hidden_${field}`,
                        name: field,
                        value: storedValue
                    }).appendTo('#surveyForm');
                    console.log(`Added hidden field for ${field} with value ${storedValue}`);
                }
            });
        }

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
