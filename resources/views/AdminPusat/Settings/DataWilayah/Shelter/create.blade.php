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
                        <h4 class="card-title">Tambah Data Shelter</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('data_shalter.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="current_page" value="{{ request()->query('current_page', 0) }}">
                            <div class="form-group">
                                <label>Wilayah Binaan</label>
                                <select name="id_wilbin" id="wilbin" class="form-control" required>
                                    <option value="">Pilih Wilayah Binaan</option>
                                    @foreach($wilbin as $wilayah)
                                        <option value="{{ $wilayah->id_wilbin }}">{{ $wilayah->nama_wilbin }}</option>
                                    @endforeach
                                </select>                                
                            </div>
                            <div class="form-group">
                                <label>Nama Shelter</label>
                                <input type="text" name="nama_shelter" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Nama Koordinator</label>
                                <input type="text" name="nama_kordinator" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>No. Telepon</label>
                                <input type="text" name="no_telpon" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" rows="3" required></textarea>
                            </div>
                           
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mt-3">Tambah</button>
                                <a href="{{ route('data_shalter') }}" class="btn btn-secondary mt-3">Batal</a>
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
