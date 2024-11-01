@extends('AdminPusat.App.master')

@section('style')
<style>
    /* Custom CSS jika diperlukan */
</style>
@endsection

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Data Pendidikan Anak</h4>
                    </div>
                    <div class="card-body">
                       <form action="{{ route('edit.prosess.PendidikanAnakBinaan', $anak->anakPendidikan->id_anak_pend) }}" method="POST">
                            @csrf
                            {{-- Data Pendidikan Anak --}}
                            <div class="form-group">
                                <label for="jenjang">Jenjang Pendidikan</label>
                                <select name="jenjang" id="jenjang_pendidikan" class="form-control" required>
                                    <option value="">Pilih Jenjang Pendidikan</option>
                                    <option value="belum_sd" {{ $anak->anakPendidikan->jenjang == 'belum_sd' ? 'selected' : '' }}>Belum SD</option>
                                    <option value="sd" {{ $anak->anakPendidikan->jenjang == 'sd' ? 'selected' : '' }}>SD</option>
                                    <option value="smp" {{ $anak->anakPendidikan->jenjang == 'smp' ? 'selected' : '' }}>SMP</option>
                                    <option value="sma" {{ $anak->anakPendidikan->jenjang == 'sma' ? 'selected' : '' }}>SMA</option>
                                    <option value="perguruan_tinggi" {{ $anak->anakPendidikan->jenjang == 'perguruan_tinggi' ? 'selected' : '' }}>Perguruan Tinggi</option>
                                </select>
                            </div>

                            <!-- Sekolah Section -->
                            <div class="row" id="sekolah_section" style="display: none;">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Kelas</label>
                                        <input type="text" name="kelas" class="form-control" value="{{ $anak->anakPendidikan->kelas ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nama Sekolah</label>
                                        <input type="text" name="nama_sekolah" class="form-control" value="{{ $anak->anakPendidikan->nama_sekolah ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Alamat Sekolah</label>
                                        <input type="text" name="alamat_sekolah" class="form-control" value="{{ $anak->anakPendidikan->alamat_sekolah ?? '' }}">
                                    </div>
                                </div>
                            </div>

                            <!-- Perguruan Tinggi Section -->
                            <div class="row" id="pt_section" style="display: none;">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Perguruan Tinggi</label>
                                        <input type="text" name="nama_pt" class="form-control" value="{{ $anak->anakPendidikan->nama_pt ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Jurusan</label>
                                        <input type="text" name="jurusan" class="form-control" value="{{ $anak->anakPendidikan->jurusan ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Semester</label>
                                        <input type="number" name="semester" class="form-control" value="{{ $anak->anakPendidikan->semester ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Alamat Perguruan Tinggi</label>
                                        <input type="text" name="alamat_pt" class="form-control" value="{{ $anak->anakPendidikan->alamat_pt ?? '' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
                                <a href="{{ route('calonAnakBinaan.show', $anak->id_anak) }}" class="btn btn-secondary mt-3">Batal</a>
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
        function toggleSections() {
            let jenjang = $('#jenjang_pendidikan').val();
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
        }

        // Panggil fungsi saat halaman pertama kali dimuat
        toggleSections();

        // Panggil fungsi saat jenjang pendidikan berubah
        $('#jenjang_pendidikan').on('change', function() {
            toggleSections();
        });
    });
</script>
@endsection
