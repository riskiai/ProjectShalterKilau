@extends('AdminPusat.App.master')

@section('style')
<style>
    .container {
        margin-top: 20px;
    }

     /* Pastikan teks dropdown dan opsi berwarna hitam */
    .form-control {
        color: #000 !important; /* Pastikan teks di dropdown berwarna hitam */
    }

    /* Atur juga gaya pada elemen option */
    .form-control option {
        color: #000 !important; /* Pastikan teks di dalam option berwarna hitam */
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
                        <h4 class="card-title">Tambah Data Kelompok</h4>
                    </div>
                    <div class="card-body">
                        <!-- Pastikan route mengirimkan id_shelter ke createprosess -->
                        <form action="{{ route('kelompok.createprosess', ['id_shelter' => $id_shelter]) }}" method="POST">
                            @csrf

                            <!-- Pilih Level Binaan -->
                            <div class="form-group">
                                <label>Level Binaan</label>
                                <select name="id_level_anak_binaan" class="form-control" required>
                                    <option value="">Pilih Level Binaan</option>
                                    @foreach($levelAnakBinaan as $level)
                                        <option value="{{ $level->id_level_anak_binaan }}">{{ $level->nama_level_binaan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            

                            <!-- Nama Kelompok -->
                            <div class="form-group">
                                <label>Nama Kelompok</label>
                                <input type="text" name="nama_kelompok" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mt-3">Tambah</button>
                                <a href="{{ route('datakelompokshelter') }}" class="btn btn-secondary mt-3">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
