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
                        <h4 class="card-title">Tambah Admin Pusat</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin_pusat.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="current_page" value="{{ request()->query('current_page', 0) }}">

                            <!-- Input Email -->
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <!-- Input Password -->
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <!-- Input Nama Lengkap -->
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" required>
                            </div>

                            <!-- Input Alamat -->
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" rows="3" required></textarea>
                            </div>

                            <!-- Input No. HP -->
                            <div class="form-group">
                                <label>No. HP</label>
                                <input type="text" name="no_hp" class="form-control" required>
                            </div>

                            <!-- Upload Foto -->
                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" name="foto" class="form-control">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mt-3">Tambah</button>
                                <a href="{{ route('admin_pusat') }}" class="btn btn-secondary mt-3">Batal</a>
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
    // Custom scripts if needed
</script>
@endsection
