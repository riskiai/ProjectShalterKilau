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
                        <h4 class="card-title">Tambah Donatur untuk Penerima Beasiswa</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pengajuan_donatur.update', $penerima['id']) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <!-- Menyimpan halaman pagination saat ini -->
                            <input type="hidden" name="current_page" value="{{ request()->query('current_page', 0) }}">

                            <div class="form-group">
                                <label>Nama Penerima Beasiswa</label>
                                <input type="text" name="nama_penerima" class="form-control" value="{{ $penerima['nama_lengkap'] }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>Tambah Donatur</label>
                                <select name="donatur" class="form-control" required>
                                    <option value="Belum ada Donatur" {{ $penerima['donatur'] == 'Belum ada Donatur' ? 'selected' : '' }}>Belum ada Donatur</option>
                                    <option value="John Doe" {{ $penerima['donatur'] == 'John Doe' ? 'selected' : '' }}>John Doe</option>
                                    <option value="Jane Doe" {{ $penerima['donatur'] == 'Jane Doe' ? 'selected' : '' }}>Jane Doe</option>
                                    <option value="Donatur Baru" {{ old('donatur') == 'Donatur Baru' ? 'selected' : '' }}>Donatur Baru</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Nama Donatur Baru</label>
                                <input type="text" name="nama_donatur_baru" class="form-control" placeholder="Masukkan nama donatur baru jika memilih 'Donatur Baru'">
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mt-3">Simpan Donatur</button>
                                <a href="{{ route('pengajuan_donatur') }}" class="btn btn-secondary mt-3">Batal</a>
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
