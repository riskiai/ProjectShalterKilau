@extends('AdminPusat.App.master')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Data Keuangan Anak</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('keuangan.storeprosess') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Anak Binaan</label>
                                <select name="id_anak" class="form-control select2" required>
                                    <option value="">Pilih Anak Binaan</option>
                                    @foreach($available_anak as $anak)
                                        <option value="{{ $anak->id_anak }}">
                                            {{ $anak->full_name }}
                                            @if($anak->donatur)
                                                --Anak Binaan Dari Donatur-- {{ $anak->donatur->nama_lengkap }}
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                            </div>                            

                            <div class="form-group mt-3">
                                <label>Tingkat Sekolah</label>
                                <select name="tingkat_sekolah" id="tingkatSekolah" class="form-control" required>
                                    <option value="">Pilih Tingkat Sekolah</option>
                                    @foreach($tingkat_sekolah_options as $tingkat => $faktor)
                                        <option value="{{ $tingkat }}" data-faktor="{{ $faktor }}">{{ $tingkat }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label>Kelas/Semester</label>
                                <select name="semester" class="form-control" required style="max-height: 200px; overflow-y: auto;">
                                    <option value="">Pilih Kelas/Semester</option>
                                    @foreach($kelas_semester_options as $kelas)
                                        <option value="{{ $kelas }}">{{ $kelas }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label>Biaya Bimbel</label>
                                <input type="number" name="bimbel" id="biayaBimbel" class="form-control" placeholder="Biaya Bimbel">
                                <small id="bimbelMessage" class="form-text text-muted"></small>
                            </div>

                            <div class="form-group mt-3">
                                <label>Biaya Eskul dan Keagamaan</label>
                                <input type="number" name="eskul_dan_keagamaan" class="form-control" placeholder="Biaya Eskul dan Keagamaan">
                            </div>

                            <div class="form-group mt-3">
                                <label>Biaya Laporan</label>
                                <input type="number" name="laporan" class="form-control" placeholder="Biaya Laporan">
                            </div>

                             <!-- Uang Tunai with Flexbox -->
                             <div class="form-group mt-3">
                                <label>Uang Tunai</label>
                                <div style="display: flex; gap: 1rem; align-items: center;">
                                    <label>
                                        <input type="radio" name="uang_tunai_option" value="1" checked> Ya
                                    </label>
                                    <label>
                                        <input type="radio" name="uang_tunai_option" value="0"> Tidak
                                    </label>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <input type="number" name="uang_tunai_nominal" class="form-control" id="uangTunaiNominal" placeholder="Uang Tunai">
                                    </div>
                                    <div class="col-md-6">
                                        <select name="uang_tunai_bulan" class="form-control" id="uangTunaiBulan">
                                            <option value="">Pilih Bulan</option>
                                            @for ($i = 1; $i <= 6; $i++)
                                                <option value="{{ $i }}">Bulan {{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <small id="uangTunaiTotal" class="form-text text-muted"></small>
                            </div>

                            <!-- Biaya Donasi with Flexbox -->
                            <div class="form-group mt-3">
                                <label>Biaya Donasi</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="number" name="donasi_nominal" class="form-control" id="donasiNominal" placeholder="Biaya Donasi">
                                    </div>
                                    <div class="col-md-6">
                                        <select name="donasi_bulan" class="form-control" id="donasiBulan">
                                            <option value="">Pilih Bulan</option>
                                            @for ($i = 1; $i <= 6; $i++)
                                                <option value="{{ $i }}">Bulan {{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <small id="donasiTotal" class="form-text text-muted"></small>
                            </div>

                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('datakeuangan') }}" class="btn btn-secondary">Batal</a>
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
<!-- Include Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        // Initialize Select2 on the dropdown
        $('.select2').select2({
            placeholder: "Pilih Anak Binaan",
            allowClear: true
        });

        const defaultValues = {
            'SD': { 'uang_tunai': 75000, 'donasi': 150000 },
            'SMP': { 'uang_tunai': 100000, 'donasi': 200000 },
            'SMA': { 'uang_tunai': 150000, 'donasi': 300000 },
            'TAHFIDZ SD': { 'uang_tunai': 100000, 'donasi': 250000 },
            'TAHFIDZ SMP': { 'uang_tunai': 130000, 'donasi': 300000 },
            'TAHFIDZ SMA': { 'uang_tunai': 200000, 'donasi': 500000 },
            'NPB TAHFIDZ SD': { 'uang_tunai': 0, 'donasi': 500000 },
            'NPB TAHFIDZ SMP': { 'uang_tunai': 0, 'donasi': 500000 },
            'NPB TAHFIDZ SMA': { 'uang_tunai': 0, 'donasi': 500000 }
        };

        // Update Uang Tunai and Donasi fields based on selected Tingkat Sekolah
        $('#tingkatSekolah').on('change', function() {
            const selectedTingkat = $(this).val();
            if (defaultValues[selectedTingkat]) {
                $('#uangTunaiNominal').val(defaultValues[selectedTingkat].uang_tunai);
                $('#donasiNominal').val(defaultValues[selectedTingkat].donasi);
            } else {
                $('#uangTunaiNominal').val('');
                $('#donasiNominal').val('');
            }
            updateUangTunaiTotal();
            updateDonasiTotal();
        });

        function updateBimbelMessage() {
            let faktor = $('#tingkatSekolah').find(':selected').data('faktor') || 1;
            let biayaBimbel = $('#biayaBimbel').val();
            let totalBimbel = biayaBimbel * faktor;
            $('#bimbelMessage').text('Biaya Bimbel: ' + biayaBimbel + ' x ' + faktor + ' = ' + totalBimbel);
        }

        function updateUangTunaiTotal() {
            let nominal = parseFloat($('#uangTunaiNominal').val()) || 0;
            let bulan = parseInt($('#uangTunaiBulan').val()) || 0;
            let total = nominal * bulan;
            $('#uangTunaiTotal').text('Total Uang Tunai: ' + nominal + ' x ' + bulan + ' = ' + total);
        }

        function updateDonasiTotal() {
            let nominal = parseFloat($('#donasiNominal').val()) || 0;
            let bulan = parseInt($('#donasiBulan').val()) || 0;
            let total = nominal * bulan;
            $('#donasiTotal').text('Total Donasi: ' + nominal + ' x ' + bulan + ' = ' + total);
        }

        function toggleUangTunaiFields(enable) {
            $('#uangTunaiNominal, #uangTunaiBulan').prop('disabled', !enable);
            if (!enable) {
                $('#uangTunaiNominal').val('');
                $('#uangTunaiBulan').val('');
                $('#uangTunaiTotal').text('');
            }
        }

        // Check initial state
        toggleUangTunaiFields($('input[name="uang_tunai_option"]:checked').val() == "1");

        // Toggle fields based on radio button selection
        $('input[name="uang_tunai_option"]').on('change', function() {
            toggleUangTunaiFields($(this).val() == "1");
        });

        $('#tingkatSekolah').on('change', function() {
            updateBimbelMessage();
        });

        $('#biayaBimbel').on('input', function() {
            updateBimbelMessage();
        });

        $('#uangTunaiNominal, #uangTunaiBulan').on('input change', function() {
            updateUangTunaiTotal();
        });

        $('#donasiNominal, #donasiBulan').on('input change', function() {
            updateDonasiTotal();
        });
    });
</script>
@endsection
