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
                        <h4 class="card-title">Edit Data Anak</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('edit.prosess.AnakBinaan', $anak->id_anak) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- Data Anak --}}
                            <div id="anak-data-umum-section">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>No Kartu Keluarga (a/n {{ $anak->keluarga->kepala_keluarga }})</label>
                                            <input type="text" id="no_kk" name="no_kk" class="form-control" value="{{ $anak->keluarga->no_kk }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Ganti No Kartu Keluarga</label>
                                            <select id="id_keluarga" name="id_keluarga" class="form-control">
                                                @foreach($daftarKeluarga as $keluarga)
                                                    <option value="{{ $keluarga->id_keluarga }}" data-no-kk="{{ $keluarga->no_kk }}" {{ $keluarga->id_keluarga == $anak->id_keluarga ? 'selected' : '' }}>
                                                        {{ $keluarga->no_kk }} (a/n {{ $keluarga->kepala_keluarga }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>NIK Anak</label>
                                            <input type="text" name="nik_anak" class="form-control" value="{{ $anak->nik_anak }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Anak Ke</label>
                                            <input type="number" name="anak_ke" class="form-control" value="{{ $anak->anak_ke }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Dari Berapa Bersaudara</label>
                                            <input type="number" name="dari_bersaudara" class="form-control" value="{{ $anak->dari_bersaudara }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nama Panggilan Anak</label>
                                            <input type="text" name="nick_name" class="form-control" value="{{ $anak->nick_name }}" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Nama Lengkap Anak, Agama -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nama Lengkap Anak</label>
                                            <input type="text" name="full_name" class="form-control" value="{{ $anak->full_name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Agama</label>
                                            <select name="agama" class="form-control" required>
                                                <option value="">Pilih Agama</option>
                                                <option value="Islam" {{ $anak->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                                                <option value="Kristen" {{ $anak->agama == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                                <option value="Budha" {{ $anak->agama == 'Budha' ? 'selected' : '' }}>Budha</option>
                                                <option value="Hindu" {{ $anak->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                                <option value="Konghucu" {{ $anak->agama == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tempat Lahir, Tanggal Lahir -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input type="text" name="tempat_lahir" class="form-control" value="{{ $anak->tempat_lahir }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input type="date" name="tanggal_lahir" class="form-control" value="{{ $anak->tanggal_lahir }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-control" required>
                                                <option value="Laki-laki" {{ $anak->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                                <option value="Perempuan" {{ $anak->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tinggal Bersama</label>
                                            <select name="tinggal_bersama" class="form-control" required>
                                                <option value="Ayah" {{ $anak->tinggal_bersama == 'Ayah' ? 'selected' : '' }}>Ayah</option>
                                                <option value="Wali" {{ $anak->tinggal_bersama == 'Wali' ? 'selected' : '' }}>Wali</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Jenis Binaan, Pelajaran Favorit -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Jenis Binaan</label>
                                            <select name="jenis_anak_binaan" class="form-control" required>
                                                <option value="BPCB" {{ $anak->jenis_anak_binaan == 'BPCB' ? 'selected' : '' }}>BPCB</option>
                                                <option value="NPB" {{ $anak->jenis_anak_binaan == 'NPB' ? 'selected' : '' }}>NPB</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Pelajaran Favorit</label>
                                            <input type="text" name="pelajaran_favorit" class="form-control" value="{{ $anak->pelajaran_favorit }}">
                                        </div>
                                    </div>
                                </div>

                                <!-- Hobi, Prestasi, Jarak ke Shelter -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Hobi</label>
                                            <input type="text" name="hobi" class="form-control" value="{{ $anak->hobi }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Prestasi</label>
                                            <input type="text" name="prestasi" class="form-control" value="{{ $anak->prestasi }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Jarak Rumah ke Shelter (km)</label>
                                            <input type="number" name="jarak_rumah" class="form-control" value="{{ $anak->jarak_rumah }}">
                                        </div>
                                    </div>
                                </div>

                                <!-- Transportasi, Foto -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Transportasi</label>
                                            <select name="transportasi" class="form-control">
                                                <option value="jalan_kaki" {{ $anak->transportasi == 'jalan_kaki' ? 'selected' : '' }}>Jalan Kaki</option>
                                                <option value="sepeda" {{ $anak->transportasi == 'sepeda' ? 'selected' : '' }}>Sepeda</option>
                                                <option value="sepeda_motor" {{ $anak->transportasi == 'sepeda_motor' ? 'selected' : '' }}>Sepeda Motor</option>
                                                <option value="angkutan_umum" {{ $anak->transportasi == 'angkutan_umum' ? 'selected' : '' }}>Angkutan Umum</option>
                                                <option value="diantar_orang_tua_wali" {{ $anak->transportasi == 'diantar_orang_tua_wali' ? 'selected' : '' }}>Diantar Orang Tua/Wali</option>
                                                <option value="lainnya" {{ $anak->transportasi == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Foto Anak</label>
                                            <input type="file" name="foto" class="form-control">
                                            @if($anak->foto)
                                                <img src="{{ asset('storage/' . $anak->foto) }}" class="img-fluid mt-2" style="max-width: 150px;" alt="Foto Anak">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
                                <a href="{{ route('AnakBinaan.show', $anak->id_anak) }}" class="btn btn-secondary mt-3">Batal</a>
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
    // Ketika user mengganti pilihan "Ganti No Kartu Keluarga"
    $('#id_keluarga').on('change', function() {
        // Ambil no_kk dari atribut data-no-kk pada opsi yang dipilih
        var noKk = $(this).find('option:selected').data('no-kk');
        
        // Update nilai field No Kartu Keluarga
        $('#no_kk').val(noKk);
    });
</script>

@endsection