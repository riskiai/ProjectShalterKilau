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
    .btn-edit, .btn-kembali, .btn-status, .btn-shelter {
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

    /* Styling for removing borders and adjusting layout */
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

    /* Tambahkan border biru saat tab aktif */
    .nav-tabs .nav-link.active {
        color: #5a5a5a;
        border-color: #5a5a5a; /* border biru untuk tab aktif */
        border-bottom-color: white; /* agar tab terlihat menyatu dengan konten */
    }

    .nav-tabs {
        margin-bottom: 20px;
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
                        <h4 class="card-title">Detail Admin Shelter</h4>
                        <div class="status-badge">
                            <!-- Display Shelter Name with Icon -->
                            <span class="btn btn-info btn-shelter">
                                <i class="fa fa-map" style="margin-right: 10px;"></i> 
                                {{ $adminshelter->shelter->nama_shelter }}
                            </span>
                            <!-- Display Status -->
                            <span class="btn btn-warning btn-status text-white">
                                @if($adminshelter->user->status == 'aktif')
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
                                <img src="{{ $adminshelter->foto ? asset('storage/' . $adminshelter->foto) : asset('images/default.png') }}" class="img-fluid" alt="Foto Admin Shelter">
                                <h4 class="mt-3">{{ $adminshelter->nama_lengkap }}</h4>
                                <div>
                                    <span class="detail-value">
                                        <i class="fa fa-map"></i> Shelter: {{ $adminshelter->shelter->nama_shelter }}
                                    </span>
                                </div>
                            </div>

                            <!-- Right section with detailed information, without borders -->
                            <div class="col-md-9">
                                <!-- Nav Tabs -->
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <!-- Tab untuk Informasi Personal -->
                                        <a class="nav-link {{ request()->get('tab') != 'anak-asuh' ? 'active' : '' }}" 
                                           href="{{ route('admin_shelter.show', $adminshelter->id_admin_shelter) }}">
                                           Informasi Personal
                                        </a>
                                    </li>
                                </ul>

                                <!-- Content for Informasi Personal -->
                                <div class="detail-group">
                                    <strong>Nama Lengkap:</strong> {{ $adminshelter->nama_lengkap }}
                                </div>
                                <div class="detail-group">
                                    <strong>Email:</strong> {{ $adminshelter->user->email }}
                                </div>
                                <div class="detail-group">
                                    <strong>Status:</strong> {{ $adminshelter->user->status }}
                                </div>
                                <div class="detail-group">
                                    <strong>No HP:</strong> {{ $adminshelter->no_hp }}
                                </div>
                                <div class="detail-group">
                                    <strong>Kantor Cabang:</strong> {{ $adminshelter->kacab->nama_kacab }}
                                </div>
                                <div class="detail-group">
                                    <strong>Wilayah Binaan:</strong> {{ $adminshelter->wilbin->nama_wilbin }}
                                </div>
                                <div class="detail-group">
                                    <strong>Shelter:</strong> {{ $adminshelter->shelter->nama_shelter }}
                                </div>
                                <div class="detail-group">
                                    <strong>Alamat:</strong> {{ $adminshelter->alamat_adm }}
                                </div>

                                <!-- Action Buttons -->
                                <div class="action-buttons">
                                    <button class="btn btn-success btn-edit" data-id="{{ $adminshelter->id_admin_shelter }}">
                                        <i class="fa fa-edit"></i> Edit Profile Admin Shelter
                                    </button>
                                    <a href="{{ route('admin_shelter', ['page' => request()->query('current_page', 1)]) }}" class="btn btn-primary btn-kembali">
                                        <i class="fa fa-arrow-left" style="margin-right: 10px;"></i> Kembali
                                    </a>
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
            window.location.href = '/admin_pusat/settings/admin_shelter/' + id + '/edit?current_page=' + currentPage;
        });
    });
</script>
@endsection
