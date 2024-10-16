@extends('AdminPusat.App.master')

@section('style')
<style>
    /* Custom CSS jika diperlukan */
    .form-group {
        margin-bottom: 15px;
    }
    .form-control {
        border-radius: 5px;
    }
    .card-header {
        font-size: 1.2rem;
        font-weight: bold;
    }
    .card-body {
        padding: 20px;
    }
    .btn-primary, .btn-secondary {
        margin-top: 20px;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Data Admin Shelter</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin_shelter.update', $adminshelter->id_admin_shelter) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <!-- Menampilkan current page agar kembali ke halaman yang benar -->
                            <input type="hidden" name="current_page" value="{{ $currentPage }}">

                            <!-- Tambahkan Email -->
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $adminshelter->user->email }}" required>
                            </div>

                            <!-- Tambahkan Password (optional) -->
                            <div class="form-group">
                                <label>Password (kosongkan jika tidak diubah)</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <!-- Tambahkan Status -->
                            <div class="form-group">
                                <label>Status Pengguna</label>
                                <select name="status" class="form-control" required>
                                    <option value="aktif" {{ $adminshelter->user->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="nonaktif" {{ $adminshelter->user->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                                </select>
                            </div>

                            <!-- Dropdown untuk Kacab -->
                            <div class="form-group">
                                <label>Kacab</label>
                                <select name="id_kacab" id="kacab" class="form-control" required>
                                    @foreach($kacab as $kac)
                                        <option value="{{ $kac->id_kacab }}" {{ $adminshelter->id_kacab == $kac->id_kacab ? 'selected' : '' }}>
                                            {{ $kac->nama_kacab }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Dropdown untuk Wilayah Binaan -->
                            <div class="form-group">
                                <label>Wilayah Binaan</label>
                                <select name="id_wilbin" id="wilbin" class="form-control" required>
                                    @foreach($wilbin as $wil)
                                        <option value="{{ $wil->id_wilbin }}" {{ $adminshelter->id_wilbin == $wil->id_wilbin ? 'selected' : '' }}>
                                            {{ $wil->nama_wilbin }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Dropdown untuk Shelter -->
                            <div class="form-group">
                                <label>Shelter</label>
                                <select name="id_shelter" id="shelter" class="form-control" required>
                                    @foreach($shelters as $shelter)
                                        <option value="{{ $shelter->id_shelter }}" {{ $adminshelter->id_shelter == $shelter->id_shelter ? 'selected' : '' }}>
                                            {{ $shelter->nama_shelter }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Data Pribadi Admin Shelter -->
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" value="{{ $adminshelter->nama_lengkap }}" required>
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat_adm" class="form-control" rows="3" required>{{ $adminshelter->alamat_adm }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>No. HP</label>
                                <input type="text" name="no_hp" class="form-control" value="{{ $adminshelter->no_hp }}" required>
                            </div>

                            <!-- Input untuk upload foto -->
                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" name="foto" class="form-control">
                                @if($adminshelter->foto)
                                    <img src="{{ asset('storage/' . $adminshelter->foto) }}" alt="Foto Admin Shelter" class="img-fluid mt-2" style="width: 150px;">
                                @endif
                            </div>

                            <!-- Tombol submit dan batal -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mt-3">Update</button>
                                <a href="{{ route('admin_shelter', ['page' => request()->query('current_page', 0)]) }}" class="btn btn-secondary mt-3">Batal</a>
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
        // Fetch Wilayah Binaan when Kacab changes
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
                    }
                });
            }
        });

        // Fetch Shelter when Wilayah Binaan changes
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
                    }
                });
            }
        });
    });
</script>
@endsection
