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
                        <h4 class="card-title">Edit Data Absensi Anak Binaan</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('absen_anak.update', $absen['id']) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <!-- Menyimpan halaman pagination saat ini -->
                            <input type="hidden" name="current_page" value="{{ request()->query('current_page', 0) }}">
                            
                            <div class="form-group">
                                <label>Nama Anak Binaan</label>
                                <input type="text" name="nama_anak_binaan" class="form-control" value="{{ $absen['nama_anak_binaan'] }}" required>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
                                <a href="{{ route('absen_anak') }}" class="btn btn-secondary mt-3">Batal</a>
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
        // Jika ada JavaScript tambahan yang diperlukan, tambahkan disini
    });
</script>
@endsection
