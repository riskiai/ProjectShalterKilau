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

        .info-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }

        .status-badge {
            display: flex;
            align-items: center;
            gap: 10px;
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
                            <h4 class="card-title">Detail Non Anak Binaan</h4>
                            <div class="status-badge">
                                <span class="btn btn-info">
                                    <i class="fa fa-user" style="margin-right: 10px;"></i>
                                    {{ $anak->jenis_anak_binaan == 'NPB' || $anak->jenis_anak_binaan == 'BCPB' ? 'Calon Non-Beasiswa' : 'Calon Non-Beasiswa' }}
                                </span>
                                <span class="btn btn-warning text-white">
                                    @if ($anak->status_validasi === \App\Models\Anak::STATUS_AKTIF)
                                        <i class="fa fa-check" style="margin-right: 10px;"></i> Aktif
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
                                <!-- Bagian kiri (Foto, Nama, dll.) -->
                                <div class="col-md-3 text-center">
                                    <img src="{{ $anak->foto ? asset('storage/' . $anak->foto) : asset('assets/img/image.webp') }}"
                                        class="img-fluid" alt="Foto Anak">
                                    <h4 class="mt-3">{{ $anak->full_name }}</h4>

                                    <div>
                                        <span class="detail-value">
                                            Shelter : {{ optional($anak->shelter)->name ?? '-' }}
                                        </span>
                                    </div>

                                    <!-- Education Information -->
                                    <div>
                                        <span class="detail-value">
                                            <i class="fa fa-graduation-cap"></i>
                                            @if ($anak->anakPendidikan)
                                                {{ ucfirst($anak->anakPendidikan->jenjang) }}
                                            @else
                                                Belum SD
                                            @endif
                                        </span>
                                    </div>

                                    <!-- Conditional display of Nama Sekolah and Kelas -->
                                    @if ($anak->anakPendidikan && in_array($anak->anakPendidikan->jenjang, ['sd', 'smp', 'sma']))
                                        <div>
                                            <span class="detail-value">
                                                <i class="fa fa-school"></i>
                                                {{ $anak->anakPendidikan->nama_sekolah ?? '-' }}
                                            </span>
                                        </div>
                                        <div>
                                            <span class="detail-value">
                                                <i class="fa fa-chalkboard"></i> Kelas
                                                {{ $anak->anakPendidikan->kelas ?? '-' }}
                                            </span>
                                        </div>
                                    @elseif ($anak->anakPendidikan && $anak->anakPendidikan->jenjang == 'perguruan_tinggi')
                                        <div>
                                            <span class="detail-value">
                                                <i class="fa fa-university"></i>
                                                {{ $anak->anakPendidikan->nama_pt ?? '-' }}
                                            </span>
                                        </div>
                                        <div>
                                            <span class="detail-value">
                                                <i class="fa fa-map-marker-alt"></i>
                                                {{ $anak->anakPendidikan->alamat_pt ?? '-' }}
                                            </span>
                                        </div>
                                    @endif

                                </div>

                                <!-- Bagian kanan untuk konten data anak -->
                                <div class="col-md-9">
                                    @include('AdminPusat.Pemberdayaan.DataBinaan.DataAnakBinaan.navbarAnakBinaan')

                                    <!-- Konten dinamis berdasarkan tab yang dipilih -->
                                    <div class="row">
                                        @if (request()->get('tab') == 'anak-pendidikan')
                                            @include('AdminPusat.Pemberdayaan.DataBinaan.DataAnakBinaan.datapendidikananakBinaan')
                                        @elseif(request()->get('tab') == 'anak-keluarga')
                                            @include('AdminPusat.Pemberdayaan.DataBinaan.DataAnakBinaan.datakeluargaanakbinaa')
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
                                                    <td>: {{ $anak->anak_ke }} dari {{ $anak->dari_bersaudara }}
                                                        bersaudara</td>
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
                                                        @else
                                                            <span class="badge bg-light text-dark">Status Tidak
                                                                Diketahui</span>
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

                                    <div class="action-buttons">
                                        @if (request()->get('tab') == null)
                                            <!-- Tombol edit untuk Data Anak -->
                                            <button class="btn btn-success btn-edit-data-anak"
                                                onclick="window.location.href='{{ route('editAnakBinaan', ['id' => $anak->id_anak]) }}'">
                                                <i class="fa fa-edit" style="margin-right: 10px;"></i> Edit Data Anak
                                            </button>
                                        @endif

                                        @if (request()->get('tab') == 'anak-pendidikan')
                                            <!-- Tombol edit untuk Data Pendidikan -->
                                            <button class="btn btn-info btn-edit-pendidikan"
                                                onclick="window.location.href='{{ route('editPendidikanAnak', ['id' => $anak->id_anak]) }}'">
                                                <i class="fa fa-edit" style="margin-right: 10px;"></i> Edit Data Pendidikan
                                                Anak
                                            </button>
                                        @endif

                                        <a href="{{ route('AnakBinaan') }}" class="btn btn-primary btn-kembali">
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
