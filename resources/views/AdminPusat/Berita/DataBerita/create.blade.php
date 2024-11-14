@extends('AdminPusat.App.master')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Berita</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('berita.storeprosess') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" name="judul" class="form-control" required>
                            </div>
                            <div class="form-group mt-3">
                                <label>Konten</label>
                                <textarea name="konten" class="form-control" required></textarea>
                            </div>
                            <div class="form-group mt-3">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" required>
                            </div>
                            <div class="form-group mt-3">
                                <label>Foto 1</label>
                                <input type="file" name="foto" class="form-control">
                            </div>
                            <div class="form-group mt-3">
                                <label>Foto 2</label>
                                <input type="file" name="foto2" class="form-control">
                            </div>
                            <div class="form-group mt-3">
                                <label>Foto 3</label>
                                <input type="file" name="foto3" class="form-control">
                            </div>
                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('databerita') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
