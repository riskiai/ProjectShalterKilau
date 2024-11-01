@extends('AdminPusat.App.master')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Pengguna</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('usersall.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" value="{{ old('username') }}" required>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Level</label>
                                <select name="level" class="form-control" required>
                                    <option value="">Pilih Level</option>
                                    <option value="admin_pusat">Admin Pusat</option>
                                    <option value="admin_shelter">Admin Shelter</option>
                                    <option value="admin_cabang">Admin Cabang</option>
                                    <option value="donatur">Donatur</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="Tidak Aktif" {{ old('status') == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mt-3">Tambah</button>
                                <a href="{{ route('usersall') }}" class="btn btn-secondary mt-3">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
