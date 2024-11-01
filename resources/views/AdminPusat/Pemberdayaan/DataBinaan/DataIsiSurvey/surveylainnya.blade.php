<form action="{{ route('surveykeluarga.store', $keluarga->id_keluarga) }}" method="POST" id="surveyForm">
    @csrf
    <input type="hidden" name="tab" value="data-lainnya">

    <!-- Status Anak -->
    <div class="form-group">
        <label>Status Anak</label>
        <div>
            <label><input type="radio" name="status_anak" value="Yatim" {{ old('status_anak', $survey->status_anak ?? '') == 'Yatim' ? 'checked' : '' }} required> Yatim</label>
            <label><input type="radio" name="status_anak" value="Dhuafa" {{ old('status_anak', $survey->status_anak ?? '') == 'Dhuafa' ? 'checked' : '' }} required> Dhuafa</label>
            <label><input type="radio" name="status_anak" value="Non Dhuafa" {{ old('status_anak', $survey->status_anak ?? '') == 'Non Dhuafa' ? 'checked' : '' }} required> Non Dhuafa</label>
        </div>
    </div>

    <!-- Biaya Pendidikan Anak/Bulan -->
    <div class="form-group">
        <label for="biaya_pendidikan_perbulan">Biaya Pendidikan Anak/Bulan</label>
        <input type="text" name="biaya_pendidikan_perbulan" id="biaya_pendidikan_perbulan" class="form-control" value="{{ old('biaya_pendidikan_perbulan', $survey->biaya_pendidikan_perbulan ?? '') }}" placeholder="Contoh: Rp 2.000.000" required>
    </div>

    <!-- Bantuan Rutin dari Lembaga Formal Lainnya -->
    <div class="form-group">
        <label>Bantuan Rutin dari Lembaga Formal Lainnya</label>
        <div>
            <label><input type="radio" name="bantuan_lembaga_formal_lain" value="Ya" {{ old('bantuan_lembaga_formal_lain', $survey->bantuan_lembaga_formal_lain ?? '') == 'Ya' ? 'checked' : '' }} required> Ya</label>
            <label><input type="radio" name="bantuan_lembaga_formal_lain" value="Tidak" {{ old('bantuan_lembaga_formal_lain', $survey->bantuan_lembaga_formal_lain ?? '') == 'Tidak' ? 'checked' : '' }} required> Tidak</label>
        </div>
    </div>

    <!-- Jika "Ya" pada Bantuan Rutin, tampilkan input Sebesar -->
    <div class="form-group" id="bantuanLembagaSebesar" style="{{ old('bantuan_lembaga_formal_lain', $survey->bantuan_lembaga_formal_lain ?? '') == 'Ya' ? '' : 'display: none;' }}">
        <label for="bantuan_lembaga_formal_lain_sebesar">Sebesar</label>
        <input type="text" name="bantuan_lembaga_formal_lain_sebesar" class="form-control" id="bantuan_lembaga_formal_lain_sebesar" value="{{ old('bantuan_lembaga_formal_lain_sebesar', $survey->bantuan_lembaga_formal_lain_sebesar ?? '') }}" placeholder="Contoh: Rp 2.000.000">
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
            'status_anak', 'biaya_pendidikan_perbulan', 'bantuan_lembaga_formal_lain', 'bantuan_lembaga_formal_lain_sebesar'
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
            toggleBantuanLain();
        }

        // Toggle untuk input tambahan "Sebesar" jika "Ya" dipilih pada bantuan_lembaga_formal_lain
        function toggleBantuanLain() {
            const isBantuan = $('input[name="bantuan_lembaga_formal_lain"]:checked').val() === 'Ya';
            $('#bantuanLembagaSebesar').toggle(isBantuan);
        }

        // Muat data saat halaman pertama kali dimuat atau tab dibuka
        loadFormData();

        // Simpan data ke localStorage setiap ada perubahan pada input
        $('#surveyForm').on('input change', 'input, select', function() {
            const fieldName = $(this).attr('name');
            const fieldValue = $(this).val();
            localStorage.setItem(`${keluargaId}_${fieldName}`, fieldValue);
        });

        // Deteksi perubahan untuk bantuan lembaga formal lain
        $('input[name="bantuan_lembaga_formal_lain"]').change(function() {
            toggleBantuanLain();
            if ($(this).val() === 'Tidak') {
                $('#bantuanLembagaSebesar input').val('');
                localStorage.removeItem(`${keluargaId}_bantuan_lembaga_formal_lain_sebesar`);
            }
        });

        // Format input untuk angka dengan rupiah
        $('#biaya_pendidikan_perbulan, #bantuan_lembaga_formal_lain_sebesar').on('input', function() {
            const formatted = formatRupiah($(this).val());
            $(this).val(formatted);
        });

        // Fungsi format Rupiah dengan prefix "Rp "
        function formatRupiah(angka, prefix = 'Rp ') {
            const number_string = angka.replace(/[^,\d]/g, '').toString();
            const split = number_string.split(',');
            const sisa = split[0].length % 3;
            let rupiah = split[0].substr(0, sisa);
            const ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                const separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix + rupiah;
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
