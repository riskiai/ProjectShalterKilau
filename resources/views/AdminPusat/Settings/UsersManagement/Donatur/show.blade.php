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
    .btn-edit, .btn-kembali, .btn-status, .btn-diperuntukan {
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
                        <h4 class="card-title">Detail Donatur</h4>
                        <div class="status-badge">
                            <span class="btn btn-info btn-diperuntukan">
                                <i class="fa fa-user" style="margin-right: 10px;"></i> 
                                @if($donatur->diperuntukan == 'Pengajuan Donatur (Calon Anak Non Beasiswa)')
                                    Non Penerima Beasiswa
                                @elseif($donatur->diperuntukan == 'Pengajuan Donatur (Calon Anak Penerima Beasiswa)')
                                    Penerima Beasiswa
                                @elseif($donatur->diperuntukan == 'Pengajuan Donatur CPB dan NPB')
                                    CPB dan NPB
                                @endif
                            </span>
                            <span class="btn btn-warning btn-status text-white">
                                @if($donatur->user->status == 'aktif')
                                    <i class="fa fa-check" style="margin-right: 10px;"></i> Aktif
                                @else
                                    <i class="fa fa-times" style="margin-right: 10px;"></i> Tidak Aktif
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Bagian kiri (Foto, Nama, dll.) tetap tampil -->
                            <div class="col-md-3 text-center">
                                <img src="{{ asset('storage/' . $donatur->foto) }}" class="img-fluid" alt="Foto Donatur">
                                <h4 class="mt-3">{{ $donatur->nama_lengkap }}</h4>
                                <div>
                                    <span class="detail-value">
                                        <i class="fa fa-university"></i> {{ $donatur->bank->nama_bank }}
                                    </span>
                                </div>
                                <div>
                                    <span class="detail-value">
                                        <i class="fa fa-credit-card"></i> {{ $donatur->no_rekening }}
                                    </span>
                                </div>
                            </div>

                            <!-- Bagian kanan untuk konten yang berubah berdasarkan tab -->
                            <div class="col-md-9">
                                @include('AdminPusat.Settings.UsersManagement.Donatur.navbarDonatur')

                                <!-- Konten dinamis, hanya berubah sesuai dengan tab yang dipilih -->
                                <div class="row">
                                    @if(request()->has('tab') && request()->get('tab') == 'anak-asuh')
                                        @include('AdminPusat.Settings.UsersManagement.Donatur.anak_asuh')
                                    @else
                                        @include('AdminPusat.Settings.UsersManagement.Donatur.informasi_personal')
                                    @endif
                                </div>

                                <!-- Tombol Edit dan Kembali -->
                                <div class="action-buttons">
                                    <button class="btn btn-success btn-edit" data-id="{{ $donatur->id_donatur }}">
                                        <i class="fa fa-edit"></i> Edit Profile Donatur
                                    </button>                                                                                                  
                                    <a href="{{ route('donatur', ['page' => request()->query('current_page', 1)]) }}" class="btn btn-primary btn-kembali">
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
                window.location.href = '/admin_pusat/settings/donatur/' + id + '/edit?current_page=' + currentPage;
            });
        });
    </script>
@endsection

