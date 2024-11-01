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

        .data-center {
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            margin-top: 20px;
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
                            <h4 class="card-title">Detail Keluarga</h4>
                        </div>
                        <div class="card-body">
                            <!-- Bagian Tengah: Data Keluarga -->
                            <div class="data-center">
                                Data Keluarga <br>
                                No. Kartu Keluarga: {{ $keluarga->no_kk ?? '-' }}
                            </div>

                            <!-- Bagian kanan untuk konten data anak -->
                            <div class="col-md-9">
                                @include('AdminPusat.Pemberdayaan.DataBinaan.DataKeluarga.navbarDataKeluarga')

                                <!-- Konten dinamis berdasarkan tab yang dipilih -->
                                <div class="row">
                                    @if (request()->get('tab') == 'data-ayah')
                                        @include('AdminPusat.Pemberdayaan.DataBinaan.DataKeluarga.datakeluargaayah')
                                    @elseif(request()->get('tab') == 'data-ibu')
                                        @include('AdminPusat.Pemberdayaan.DataBinaan.DataKeluarga.datakeluargaibu')
                                    @elseif(request()->get('tab') == 'data-wali')
                                        @include('AdminPusat.Pemberdayaan.DataBinaan.DataKeluarga.datakeluargawali')
                                    @else
                                        <h4>Data Keluarga</h4>
                                        <table class="table table-borderless">
                                            <tr>
                                                <td>Kantor Cabang</td>
                                                <td>: {{ optional($keluarga->kacab)->nama_kacab ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Wilayah Binaan</td>
                                                <td>: {{ optional($keluarga->wilbin)->nama_wilbin ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Shelter</td>
                                                <td>: {{ optional($keluarga->shelter)->nama_shelter ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td>No. Kartu Keluarga</td>
                                                <td>: {{ $keluarga->no_kk ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Nama Kepala Keluarga</td>
                                                <td>: {{ $keluarga->kepala_keluarga ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Status Orang Tua</td>
                                                <td>: {{ $keluarga->status_ortu ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Nama Bank</td>
                                                <td>: {{ optional($keluarga->bank)->nama_bank ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td>No. Rekening</td>
                                                <td>: {{ $keluarga->no_rek ?? '-' }}</td>
                                            </tr>

                                            <tr>
                                                <td>No. Telepon</td>
                                                <td>: {{ $keluarga->no_telp ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Atas Nama</td>
                                                <td>: {{ $keluarga->an_tlp ?? '-' }}</td>
                                            </tr>
                                        </table>
                                    @endif
                                </div>

                                <!-- Tombol Aksi -->
                                <div class="action-buttons">
                                    <!-- Tombol edit sesuai dengan tab yang dipilih -->
                                    @if (request()->get('tab', 'data-keluarga') == 'data-keluarga')
                                        <button class="btn btn-success btn-edit-data-anak"
                                            onclick="window.location.href='{{ route('editKeluarga', ['id' => $keluarga->id_keluarga]) }}'">
                                            <i class="fa fa-edit" style="margin-right: 10px;"></i> Edit Data Keluarga
                                        </button>
                                    @elseif (request()->get('tab') == 'data-ayah')
                                        <button class="btn btn-info btn-edit-pendidikan"
                                            onclick="window.location.href='{{ route('editDataAyah', ['id' => $keluarga->id_keluarga]) }}'">
                                            <i class="fa fa-edit" style="margin-right: 10px;"></i> Edit Data Ayah
                                        </button>
                                    @elseif (request()->get('tab') == 'data-ibu')
                                        <button class="btn btn-info btn-edit-pendidikan"
                                            onclick="window.location.href='{{ route('editDataIbu', ['id' => $keluarga->id_keluarga]) }}'">
                                            <i class="fa fa-edit" style="margin-right: 10px;"></i> Edit Data Ibu
                                        </button>
                                    @elseif (request()->get('tab') == 'data-wali')
                                        <button class="btn btn-info btn-edit-pendidikan" onclick="window.location.href='{{ route('editDataWali', ['id' => $keluarga->id_keluarga]) }}'">
                                            <i class="fa fa-edit" style="margin-right: 10px;"></i> Edit Data Wali
                                        </button>
                                    @endif


                                    <a href="{{ route('keluarga') }}" class="btn btn-primary btn-kembali">
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
@endsection
