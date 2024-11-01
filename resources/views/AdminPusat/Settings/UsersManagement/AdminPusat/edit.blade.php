@extends('AdminPusat.App.master')

@section('style')
<style>
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
                        <h4 class="card-title">Edit Data Admin Pusat</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin_pusat.update', $adminshelter->id_admin_pusat) }}" method="POST" enctype="multipart/form-data">
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

                            <!-- Data Pribadi Admin Pusat -->
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" value="{{ $adminshelter->nama_lengkap }}" required>
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" rows="3" required>{{ $adminshelter->alamat }}</textarea>
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
                                    <img src="{{ asset('storage/' . $adminshelter->foto) }}" alt="Foto Admin Pusat" class="img-fluid mt-2" style="width: 150px;">
                                @endif
                            </div>

                            <!-- Tombol submit dan batal -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mt-3">Update</button>
                                <a href="{{ route('admin_pusat', ['page' => request()->query('current_page', 0)]) }}" class="btn btn-secondary mt-3">Batal</a>
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
        // Tidak ada JavaScript tambahan yang dibutuhkan
    });
</script>
@endsection
