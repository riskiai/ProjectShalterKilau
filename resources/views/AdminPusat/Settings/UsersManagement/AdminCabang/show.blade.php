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
    .btn-edit, .btn-kembali, .btn-status, .btn-kacab {
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

    /* Styling untuk informasi tanpa border */
    .detail-group {
        font-size: 1rem;
        margin-bottom: 10px;
        line-height: 1.6;
    }
    .detail-group strong {
        font-weight: 600;
    }

    /* Styling untuk navbar */
    .nav-tabs .nav-link {
        color: #5a5a5a;
        font-size: 1.1rem;
        padding: 10px 15px;
        border: 1px solid transparent;
    }

    /* Border biru saat tab aktif */
    .nav-tabs .nav-link.active {
        color: #5a5a5a;
        border-color: #5a5a5a;
        border-bottom-color: white;
    }

    .nav-tabs {
        margin-bottom: 20px;
    }

    /* Menghindari overflow horizontal */
    .container {
        max-width: 100%;
        overflow-x: hidden;
    }

    /* Flexbox untuk mengisi ruang dengan baik */
    .page-inner {
        min-height: calc(100vh - 100px); /* Pastikan footer tidak terpotong */
        display: flex;
        flex-direction: column;
    }

    .card {
        flex-grow: 1;
    }

    /* Atur gambar agar responsif dan tidak lebih besar dari container */
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
                        <h4 class="card-title">Detail Admin Cabang</h4>
                        <div class="status-badge">
                            <!-- Display Kacab Name with Icon -->
                            <span class="btn btn-info btn-kacab">
                                <i class="fa fa-building" style="margin-right: 10px;"></i> 
                                {{ $admincabang->kacab->nama_kacab }}
                            </span>
                            <!-- Display Status -->
                            <span class="btn btn-warning btn-status text-white">
                                @if($admincabang->user->status == 'aktif')
                                    <i class="fa fa-check" style="margin-right: 10px;"></i> Aktif
                                @else
                                    <i class="fa fa-times" style="margin-right: 10px;"></i> Tidak Aktif
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Left section with Profile Image and Basic Info -->
                            <div class="col-md-3 text-center">
                                <img src="{{ $admincabang->foto ? asset('storage/' . $admincabang->foto) : asset('images/default.png') }}" class="img-fluid" alt="Foto Admin Cabang">
                                <h4 class="mt-3">{{ $admincabang->nama_lengkap }}</h4>
                                <div>
                                    <span class="detail-value">
                                        <i class="fa fa-building"></i> Kacab: {{ $admincabang->kacab->nama_kacab }}
                                    </span>
                                </div>
                            </div>

                            <!-- Right section with detailed information -->
                            <div class="col-md-9">
                                <!-- Nav Tabs -->
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{ route('admin_cabang.show', $admincabang->id_admin_cabang) }}">
                                           Informasi Personal
                                        </a>
                                    </li>
                                </ul>

                                <!-- Content for Informasi Personal -->
                                <div class="detail-group">
                                    <strong>Nama Lengkap:</strong> {{ $admincabang->nama_lengkap }}
                                </div>
                                <div class="detail-group">
                                    <strong>Email:</strong> {{ $admincabang->user->email }}
                                </div>
                                <div class="detail-group">
                                    <strong>Status:</strong> {{ $admincabang->user->status }}
                                </div>
                                <div class="detail-group">
                                    <strong>No HP:</strong> {{ $admincabang->no_hp }}
                                </div>
                                <div class="detail-group">
                                    <strong>Kantor Cabang:</strong> {{ $admincabang->kacab->nama_kacab }}
                                </div>
                                <div class="detail-group">
                                    <strong>Alamat:</strong> {{ $admincabang->alamat }}
                                </div>

                                <!-- Action Buttons -->
                                <div class="action-buttons">
                                    <button class="btn btn-success btn-edit" data-id="{{ $admincabang->id_admin_cabang }}">
                                        <i class="fa fa-edit"></i> Edit Profile Admin Cabang
                                    </button>
                                    <a href="{{ route('admin_cabang', ['page' => request()->query('current_page', 1)]) }}" class="btn btn-primary btn-kembali">
                                        <i class="fa fa-arrow-left" style="margin-right: 10px;"></i> Kembali
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
            window.location.href = '/admin_pusat/settings/admin_cabang/' + id + '/edit?current_page=' + currentPage;
        });
    });
</script>
@endsection
