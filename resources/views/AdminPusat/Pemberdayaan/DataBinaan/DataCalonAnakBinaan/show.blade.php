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

        .btn-edit,
        .btn-kembali {
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
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header info-section">
                            <h4 class="card-title">Detail Anak</h4>
                            <div class="status-badge">
                                <span class="btn btn-info">
                                    <i class="fa fa-user" style="margin-right: 10px;"></i>
                                    {{ $anak->jenis_anak_binaan == 'NPB' || $anak->jenis_anak_binaan == 'BCPB' ? 'Calon Non-Beasiswa' : 'Calon Non-Beasiswa' }}
                                </span>
                                <span class="btn btn-warning text-white">
                                    @if ($anak->status_validasi === \App\Models\Anak::STATUS_AKTIF)
                                        <i class="fa fa-check" style="margin-right: 10px;"></i> Aktif
                                    @elseif ($anak->status_validasi === \App\Models\Anak::STATUS_TIDAK_AKTIF)
                                        <i class="fa fa-times" style="margin-right: 10px;"></i> Tidak Aktif
                                    @elseif ($anak->status_validasi === \App\Models\Anak::STATUS_DITOLAK)
                                        <i class="fa fa-ban" style="margin-right: 10px;"></i> Ditolak
                                    @elseif ($anak->status_validasi === \App\Models\Anak::STATUS_DITANGGUHKAN)
                                        <i class="fa fa-pause" style="margin-right: 10px;"></i> Ditangguhkan
                                    @endif
                                </span>
                                <span class="btn btn-success">
                                    @if ($anak->donatur)
                                        <i class="fa fa-user-check" style="margin-right: 10px;"></i> Memiliki Donatur
                                    @else
                                        <i class="fa fa-user-times" style="margin-right: 10px;"></i> Belum Memiliki Donatur
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Bagian kiri (Foto, Nama, dll.) tetap tampil -->
                                <div class="col-md-3 text-center">
                                   <img src="{{ $anak->foto ? asset('storage/' . $anak->foto) : asset('assets/img/image.webp') }}"
                                        class="img-fluid" alt="Foto Anak">
                                    <h4 class="mt-3">{{ $anak->full_name }}</h4>
                                    <div>
                                        <span class="detail-value">
                                            Shelter : {{ optional($anak->shelter)->name ?? '-' }}
                                        </span>
                                    </div>
                                    <div>
                                        <span class="detail-value">
                                            {{ $anak->anakPendidikan ? $anak->anakPendidikan->education_level : 'Belum SD' }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Bagian kanan untuk konten data anak -->
                                <div class="col-md-9">
                                    @include('AdminPusat.Pemberdayaan.DataBinaan.DataCalonAnakBinaan.navbarCalonAnakBinaan')

                                    <!-- Konten dinamis berdasarkan tab yang dipilih -->
                                    <div class="row">
                                        @if (request()->get('tab') == 'anak-pendidikan')
                                            @include('AdminPusat.Pemberdayaan.DataBinaan.DataCalonAnakBinaan.datapendidikan')
                                        @elseif(request()->get('tab') == 'anak-keluarga')
                                            @include('AdminPusat.Pemberdayaan.DataBinaan.DataCalonAnakBinaan.datakeluarga')
                                        @else
                                            <h4>Data Anak</h4>
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td>Nama Panjang Anak</td>
                                                    <td>: {{ $anak->full_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Nama Panggilan Anak</td>
                                                    <td>: {{ $anak->nick_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Anak Ke</td>
                                                    <td>: {{ $anak->anak_ke }} dari {{ $anak->dari_bersaudara }} bersaudara
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Tinggal Bersama</td>
                                                    <td>: {{ $anak->tinggal_bersama }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Agama</td>
                                                    <td>: {{ $anak->agama }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Tempat Tanggal Lahir</td>
                                                    <td>: {{ $anak->tempat_lahir }},
                                                        {{ \Carbon\Carbon::parse($anak->tanggal_lahir)->format('d-m-Y') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Jenis Kelamin</td>
                                                    <td>: {{ $anak->jenis_kelamin }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Status Validasi</td>
                                                    <td>:
                                                        @if ($anak->status_validasi === \App\Models\Anak::STATUS_AKTIF)
                                                            <span class="badge bg-success">Aktif</span>
                                                        @elseif ($anak->status_validasi === \App\Models\Anak::STATUS_TIDAK_AKTIF)
                                                            <span class="badge bg-danger">Tidak Aktif</span>
                                                        @elseif ($anak->status_validasi === \App\Models\Anak::STATUS_DITOLAK)
                                                            <span class="badge bg-warning">Ditolak</span>
                                                        @elseif ($anak->status_validasi === \App\Models\Anak::STATUS_DITANGGUHKAN)
                                                            <span class="badge bg-secondary">Ditangguhkan</span>
                                                        @else
                                                            <span class="badge bg-light text-dark">Status Tidak Diketahui</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                                                            
                                                <tr>
                                                    <td>Status Calon Binaan</td>
                                                    <td>: {{ $anak->status_cpb }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Pelajaran Favorit</td>
                                                    <td>: {{ $anak->pelajaran_favorit ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Hobi</td>
                                                    <td>: {{ $anak->hobi ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Prestasi</td>
                                                    <td>: {{ $anak->prestasi ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Jarak Rumah ke Shelter</td>
                                                    <td>: {{ $anak->jarak_rumah }} KM</td>
                                                </tr>
                                                <tr>
                                                    <td>Transportasi</td>
                                                    <td>: 
                                                        {{ $anak->transportasi ? ucfirst(str_replace('_', ' ', $anak->transportasi)) : '-' }}
                                                    </td>
                                                </tr>                                                
                                            </table>
                                        @endif
                                    </div>

                                    <!-- Tombol Edit dan Kembali -->
                                    <div class="action-buttons">
                                        @if (request()->get('tab') == null) <!-- Tombol edit untuk Data Anak -->
                                            <button class="btn btn-success btn-edit-data-anak btn-kembali" data-id="{{ $anak->id_anak }}">
                                                <i class="fa fa-edit" style="margin-right: 10px;"></i> Edit Data Anak
                                            </button>
                                        @endif
                                        
                                        @if (request()->get('tab') == 'anak-pendidikan') <!-- Tombol edit untuk Data Pendidikan -->
                                            <button class="btn btn-info btn-edit-pendidikan btn-kembali" data-id="{{ $anak->id_anak }}">
                                                <i class="fa fa-edit" style="margin-right: 10px;"></i> Edit Data Pendidikan Anak 
                                            </button>
                                        @endif
                                        <a href="{{ route('calonAnakBinaan') }}" class="btn btn-primary btn-kembali">
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
        // Tombol untuk Edit Data Anak
        $('.btn-edit-data-anak').on('click', function() {
            let id = $(this).data('id');
            window.location.href = '/admin_pusat/pemberdayaan/editcalonAnakBinaan/' + id;
        });

        // Tombol untuk Edit Data Pendidikan Anak
        $('.btn-edit-pendidikan').on('click', function() {
            let id = $(this).data('id');
            window.location.href = '/admin_pusat/pemberdayaan/editPendidikanAnakBinaan/' + id;
        });
    });
</script>
@endsection
