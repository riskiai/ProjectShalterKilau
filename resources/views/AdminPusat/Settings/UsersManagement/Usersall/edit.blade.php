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
                        <h4 class="card-title">Edit Pengguna</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('usersall.update', $user->id_users) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="current_page" value="{{ request()->query('current_page', 0) }}">

                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" value="{{ $user->username }}" required>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                            </div>

                            <div class="form-group">
                                <label>Password (Biarkan kosong jika tidak ingin mengganti)</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Level</label>
                                <select name="level" class="form-control" required>
                                    <option value="admin_pusat" {{ $user->level == 'admin_pusat' ? 'selected' : '' }}>Admin Pusat</option>
                                    <option value="admin_shelter" {{ $user->level == 'admin_shelter' ? 'selected' : '' }}>Admin Shelter</option>
                                    <option value="admin_cabang" {{ $user->level == 'admin_cabang' ? 'selected' : '' }}>Admin Cabang</option>
                                    <option value="donatur" {{ $user->level == 'donatur' ? 'selected' : '' }}>Donatur</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="Aktif" {{ $user->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="Tidak Aktif" {{ $user->status == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
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
