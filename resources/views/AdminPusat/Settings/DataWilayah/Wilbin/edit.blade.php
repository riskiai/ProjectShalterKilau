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
                        <h4 class="card-title">Edit Wilayah Binaan</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('wilayah_binaan.update', $wilbin->id_wilbin) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="current_page" value="{{ request()->query('current_page', 0) }}">
                            <div class="form-group">
                                <label>Kantor Cabang</label>
                                <select name="id_kacab" id="kacab" class="form-control" required>
                                    <option value="">Pilih Kantor Cabang</option>
                                    @foreach($kacab as $k)
                                        <option value="{{ $k->id_kacab }}" 
                                                data-no_telpon="{{ $k->no_telpon }}"
                                                {{ $wilbin->id_kacab == $k->id_kacab ? 'selected' : '' }}>
                                            {{ $k->nama_kacab }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nomor Telepon Kantor Cabang</label>
                                <input type="text" id="no_telpon" class="form-control" readonly 
                                       value="{{ $wilbin->kacab->no_telpon ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label>Nama Wilayah Binaan</label>
                                <input type="text" name="nama_wilbin" class="form-control" 
                                       value="{{ $wilbin->nama_wilbin }}" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
                                <a href="{{ route('wilayah_binaan') }}" class="btn btn-secondary mt-3">Batal</a>
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
        // Set nomor telepon berdasarkan pilihan kantor cabang yang sudah ada
        let initialNoTelpon = $('#kacab').find(':selected').data('no_telpon');
        $('#no_telpon').val(initialNoTelpon);

        // Saat memilih kantor cabang, tampilkan no teleponnya
        $('#kacab').on('change', function() {
            // Ambil nomor telepon dari atribut data
            let no_telpon = $(this).find(':selected').data('no_telpon');
            // Set nomor telepon ke input
            $('#no_telpon').val(no_telpon);
        });
    });
</script>
@endsection
