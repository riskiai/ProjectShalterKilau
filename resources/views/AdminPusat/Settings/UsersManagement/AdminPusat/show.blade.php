@extends('AdminPusat.App.master')

@section('style')
<style>
    .btn-profile {
        margin-bottom: 20px;
    }
    .detail-title {
        font-size: 1.2rem;
        font-weight: bold;
    }
    .detail-value {
        font-size: 1rem;
        margin-bottom: 10px;
    }
    .btn-edit, .btn-kembali, .btn-status {
        margin: 5px;
    }
    .info-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
    }
    .info-section .status-badge {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .action-buttons {
        display: flex;
        justify-content: flex-start;
        gap: 10px;
        margin-top: 20px;
    }
    .detail-group {
        font-size: 1rem;
        margin-bottom: 10px;
        line-height: 1.6;
    }
    .detail-group strong {
        font-weight: 600;
    }
    .nav-tabs .nav-link {
        color: #5a5a5a;
        font-size: 1.1rem;
        padding: 10px 15px;
        border: 1px solid transparent;
    }
    .nav-tabs .nav-link.active {
        color: #5a5a5a;
        border-color: #5a5a5a;
        border-bottom-color: white;
    }
    .nav-tabs {
        margin-bottom: 20px;
    }
    .container {
        max-width: 100%;
        overflow-x: hidden;
    }
    .page-inner {
        min-height: calc(100vh - 100px);
        display: flex;
        flex-direction: column;
    }
    .card {
        flex-grow: 1;
    }
    .img-fluid {
        max-width: 100%;
        height: auto;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header info-section">
                        <h4 class="card-title">Detail Admin Pusat</h4>
                        <div class="status-badge">
                            <span class="btn btn-warning btn-status text-white">
                                @if($adminpusat->user->status == 'aktif')
                                    <i class="fa fa-check" style="margin-right: 10px;"></i> Aktif
                                @else
                                    <i class="fa fa-times" style="margin-right: 10px;"></i> Tidak Aktif
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 text-center">
                                <img src="{{ $adminpusat->foto ? asset('storage/' . $adminpusat->foto) : asset('images/default.png') }}" class="img-fluid" alt="Foto Admin Pusat">
                                <h4 class="mt-3">{{ $adminpusat->nama_lengkap }}</h4>
                            </div>

                            <div class="col-md-9">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#informasiPersonal" data-bs-toggle="tab">Informasi Personal</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="informasiPersonal">
                                        <div class="detail-group">
                                            <strong>Nama Lengkap:</strong> {{ $adminpusat->nama_lengkap }}
                                        </div>
                                        <div class="detail-group">
                                            <strong>Email:</strong> {{ $adminpusat->user->email }}
                                        </div>
                                        <div class="detail-group">
                                            <strong>Status:</strong> {{ $adminpusat->user->status }}
                                        </div>
                                        <div class="detail-group">
                                            <strong>No HP:</strong> {{ $adminpusat->no_hp }}
                                        </div>
                                        <div class="detail-group">
                                            <strong>Alamat:</strong> {{ $adminpusat->alamat }}
                                        </div>
                                    </div>
                                </div>

                                <div class="action-buttons">
                                    <button class="btn btn-success btn-edit" data-id="{{ $adminpusat->id_admin_pusat }}">
                                        <i class="fa fa-edit"></i> Edit Profile Admin Pusat
                                    </button>
                                    <a href="{{ route('admin_pusat') }}" class="btn btn-primary btn-kembali">
                                        <i class="fa fa-arrow-left"></i> Kembali
                                    </a>
                                </div>
                            </div>
                        </div>
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
        $('.btn-edit').on('click', function() {
            let id = $(this).data('id');
            let currentPage = {{ request()->query('current_page', 0) }};
            window.location.href = '/admin_pusat/settings/admin_pusat/' + id + '/edit?current_page=' + currentPage;
        });
    });
</script>
@endsection
