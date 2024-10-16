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
                        <h4 class="card-title">Edit Data Tutor</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('tutor.update', $tutor->id_tutor) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="current_page" value="{{ request()->query('current_page', 0) }}">

                            <!-- Relasi Kacab, Wilbin, dan Shelter -->
                            <div class="form-group">
                                <label>Kacab</label>
                                <select name="id_kacab" id="kacab" class="form-control" required>
                                    <option value="">Pilih Kacab</option>
                                    @foreach($kacab as $kac)
                                        <option value="{{ $kac->id_kacab }}" {{ $tutor->id_kacab == $kac->id_kacab ? 'selected' : '' }}>
                                            {{ $kac->nama_kacab }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Wilayah Binaan</label>
                                <select name="id_wilbin" id="wilbin" class="form-control" required>
                                    <option value="">Pilih Wilayah Binaan</option>
                                    @foreach($wilbin as $wil)
                                        <option value="{{ $wil->id_wilbin }}" {{ $tutor->id_wilbin == $wil->id_wilbin ? 'selected' : '' }}>
                                            {{ $wil->nama_wilbin }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Shelter</label>
                                <select name="id_shelter" id="shelter" class="form-control" required>
                                    <option value="">Pilih Shelter</option>
                                    @foreach($shelter as $shel)
                                        <option value="{{ $shel->id_shelter }}" {{ $tutor->id_shelter == $shel->id_shelter ? 'selected' : '' }}>
                                            {{ $shel->nama_shelter }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" value="{{ $tutor->nama }}" required>
                            </div>
                            <div class="form-group">
                                <label>Pendidikan</label>
                                <input type="text" name="pendidikan" class="form-control" value="{{ $tutor->pendidikan }}" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $tutor->email }}" required>
                            </div>
                            <div class="form-group">
                                <label>No. HP</label>
                                <input type="text" name="no_hp" class="form-control" value="{{ $tutor->no_hp }}" required>
                            </div>

                            <div class="form-group">
                                <label>Mata Pelajaran</label>
                                <input type="text" name="maple" class="form-control" value="{{ $tutor->maple }}" required>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" rows="3" required>{{ $tutor->alamat }}</textarea>
                            </div>

                            <!-- Input untuk upload foto -->
                            <div class="form-group">
                                <label>Foto</label>
                                @if($tutor->foto)
                                    <div>
                                        <img src="{{ asset('storage/' . $tutor->foto) }}" alt="Foto Tutor" width="100">
                                    </div>
                                    <small>Ganti foto:</small>
                                @endif
                                <input type="file" name="foto" class="form-control">
                            </div>

                            {{-- <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="aktif" {{ $tutor->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="non-aktif" {{ $tutor->status == 'non-aktif' ? 'selected' : '' }}>Non-Aktif</option>
                                </select>
                            </div> --}}
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mt-3">Update</button>
                                <a href="{{ route('tutor') }}" class="btn btn-secondary mt-3">Batal</a>
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
        // Ketika Kacab dipilih
        $('#kacab').on('change', function() {
            var id_kacab = $(this).val();
            $('#wilbin').empty().append('<option value="">Pilih Wilayah Binaan</option>');
            $('#shelter').empty().append('<option value="">Pilih Shelter</option>');

            if (id_kacab) {
                $.ajax({
                    url: '/admin_pusat/settings/wilbin/' + id_kacab,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $.each(data, function(key, value) {
                            $('#wilbin').append('<option value="' + value.id_wilbin + '">' + value.nama_wilbin + '</option>');
                        });
                    },
                    error: function() {
                        alert('Gagal mengambil data Wilayah Binaan');
                    }
                });
            }
        });

        // Ketika Wilbin dipilih, ambil data Shelter berdasarkan Wilbin
        $('#wilbin').on('change', function() {
            var id_wilbin = $(this).val();
            $('#shelter').empty().append('<option value="">Pilih Shelter</option>');

            if (id_wilbin) {
                $.ajax({
                    url: '/admin_pusat/settings/shelter/' + id_wilbin,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $.each(data, function(key, value) {
                            $('#shelter').append('<option value="' + value.id_shelter + '">' + value.nama_shelter + '</option>');
                        });
                    },
                    error: function() {
                        alert('Gagal mengambil data Shelter');
                    }
                });
            }
        });
    });
</script>
@endsection
