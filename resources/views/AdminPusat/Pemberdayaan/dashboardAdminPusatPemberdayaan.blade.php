@extends('AdminPusat.App.master')

@section('style')
    <style>
        /* Menyelaraskan warna dan tampilan dashboard */
        .card-stats {
            background-color: #6861ce;
            /* Warna ungu */
            color: white;
            border-radius: 10px;
            min-height: 150px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 15px;
        }

        .card-stats .icon-big {
            color: white;
            font-size: 50px;
        }

        .card-stats .numbers h4,
        .card-stats .numbers p {
            color: white;
            margin: 0;
        }

        .card-stats .numbers h4 {
            font-size: 30px;
        }

        .card-stats .more-info {
            margin-top: auto;
            /* Membuat tombol 'More Info' tetap di bawah */
            text-align: right;
        }

        .card-stats .more-info a {
            color: white;
            font-weight: bold;
            text-decoration: none;
        }

        .card-stats .more-info a:hover {
            text-decoration: underline;
        }

        /* Menjaga tampilan agar konsisten */
        .card .row.align-items-center {
            display: flex;
            align-items: center;
        }

        .col-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .col-icon .icon-big {
            width: 70px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .col.col-stats {
            flex: 1;
        }

        /* Konsistensi lebar dan tinggi untuk tampilan responsive */
        .col-sm-6.col-md-3 {
            padding-bottom: 10px;
        }

        /* Style untuk tombol dan modal pilihan */
        .modal-content {
            border-radius: 10px;
        }

        .modal-body i {
            color: #6c757d;
            font-size: 50px;
        }

        .modal-footer .btn i {
            font-size: 20px;
            margin-right: 8px;
        }

        .modal-footer .btn {
            width: 100%;
            margin-bottom: 10px;
            font-size: 16px;
            padding: 10px;
        }

        .btn-outline-success {
            border-color: #6861ce;
            /* Warna ungu */
            color: #6861ce;
            /* Warna ungu */
        }

        .btn-outline-success:hover {
            background-color: #6861ce;
            /* Warna ungu */
            border-color: #6861ce;
            color: white;
        }

        .btn-outline-success:focus,
        .btn-outline-success:active {
            background-color: #6861ce !important;
            /* Pastikan tombol tetap ungu ketika diklik */
            border-color: #6861ce;
            /* Border tetap ungu */
            color: white;
            /* Teks tetap putih */
        }

        .shadow-lg {
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;
        }

        /* Custom positioning untuk modal */
        .modal-dialog {
            position: fixed;
            top: 100px;
            /* Menjaga modal di bawah sedikit dari atas */
            left: 46%;
            /* Menggeser modal ke tengah horizontal */
            transform: translateX(-50%);
            /* Menjaga modal tetap di tengah */
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Dashboard Pemberdayaan Admin Pusat</h3>
                </div>
            </div>

            <!-- Card Section -->
            <div class="row">
                <!-- Card 1 -->
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center">
                                    <i class="fas fa-user-friends"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <h4>4</h4>
                                    <p>Data Calon Anak Binaan</p>
                                </div>
                            </div>
                        </div>
                        <div class="more-info">
                            <a href="{{ route('usersall') }}">More Info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center">
                                    <i class="fas fa-user-friends"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <h4>3</h4>
                                    <p>Data Anak Binaan</p>
                                </div>
                            </div>
                        </div>
                        <div class="more-info">
                            <a href="{{ route('donatur') }}">More Info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center">
                                    <i class="fas fa-exclamation-circle"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <h4>4</h4>
                                    <p>Data yang belum Validasi Beasiswa</p>
                                </div>
                            </div>
                        </div>
                        <div class="more-info">
                            <a href="{{ route('usersall') }}">More Info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <h4>3</h4>
                                    <p>Data yang sudah Validasi Beasiswa</p>
                                </div>
                            </div>
                        </div>
                        <div class="more-info">
                            <a href="{{ route('donatur') }}">More Info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tambah Keluarga / Anak Section -->
            <div class="mt-2 text-center shadow-lg p-5 bg-white rounded">
                <h4>Tambahkan Keluarga / Anak</h4>
                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                    data-bs-target="#modalPilihan">
                    Tambah+
                </button>
            </div>

            <!-- Modal Pilihan -->
            <div class="modal fade" id="modalPilihan" tabindex="-1" aria-labelledby="modalPilihanLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body text-center">
                            <div class="mb-3">
                                <i class="fas fa-question-circle fa-3x text-muted"></i>
                                <h5>Pilih Opsi</h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary"
                                    onclick="window.location.href='{{ route('form_keluarga_baru') }}';">
                                    <i class="fas fa-users" style="color: white;"></i> Keluarga Baru+
                                </button>
                                <button type="button" class="btn btn-warning"
                                    onclick="window.location.href='{{ route('ajukan_anak') }}';">
                                    <i class="fas fa-child" style="color: white;"></i> Ajukan Anak+
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
