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

        .card-header {
            background-color: #f7f7f7;
            font-weight: bold;
            padding: 10px 15px;
        }

        .card-body {
            padding: 20px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Form Kelayakan Survey</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Data Survey Section -->
                                <div class="col-md-6">
                                    <h5>Data Survey</h5>
                                    @include(
                                        'AdminPusat.Pemberdayaan.DataBinaan.DataValidasiSurvey.DataSurvey.navbarSurvey',
                                        ['tab' => request()->get('tab', 'data-keluargasurvey')]
                                    )
                                    <div class="card my-3">
                                        <div class="card-header info-section">
                                            Data Survey Keluarga
                                        </div>
                                        <div class="card-body survey-content">
                                            @switch(request()->get('tab', 'data-keluargasurvey'))
                                                @case('data-keluargasurvey')
                                                    <p><strong>No. Kartu Keluarga :</strong> {{ $survey->keluarga->no_kk ?? '-' }}
                                                    </p>
                                                    <p><strong>Pendidikan Terakhir Kepala Keluarga :</strong>
                                                        {{ $survey->pendidikan_kepala_keluarga }}</p>
                                                    <p><strong>Jumlah Tanggungan Kepala Keluarga :</strong>
                                                        {{ $survey->jumlah_tanggungan }} Jiwa</p>
                                                @break

                                                @case('data-ekonomisurvey')
                                                    @include('AdminPusat.Pemberdayaan.DataBinaan.DataValidasiSurvey.DataSurvey.showEkonomi')
                                                @break

                                                @case('data-assetsurvey')
                                                    @include('AdminPusat.Pemberdayaan.DataBinaan.DataValidasiSurvey.DataSurvey.showAsset')
                                                @break

                                                @case('data-kesehatansurvey')
                                                    @include('AdminPusat.Pemberdayaan.DataBinaan.DataValidasiSurvey.DataSurvey.showKesehatan')
                                                @break

                                                @case('data-ibadahsurvey')
                                                    @include('AdminPusat.Pemberdayaan.DataBinaan.DataValidasiSurvey.DataSurvey.showIbadahAsset')
                                                @break

                                                @case('data-lainnyasurvey')
                                                    @include('AdminPusat.Pemberdayaan.DataBinaan.DataValidasiSurvey.DataSurvey.showLainnya')
                                                @break

                                                @case('data-survey')
                                                    @include('AdminPusat.Pemberdayaan.DataBinaan.DataValidasiSurvey.DataSurvey.showSurvey')
                                                @break
                                            @endswitch
                                        </div>
                                    </div>
                                </div>

                                <!-- Data Pengajuan Section -->
                                <div class="col-md-6">
                                    <h5>Data Pengajuan</h5>
                                    @include(
                                        'AdminPusat.Pemberdayaan.DataBinaan.DataValidasiSurvey.DataPengajuan.navbarPengajuan',
                                        ['tab' => request()->get('tab', 'data-keluargapengajuan')]
                                    )
                                    <div class="card my-3">
                                        <div class="card-header info-section">
                                            Data Pengajuan Keluarga
                                        </div>
                                        <div class="card-body pengajuan-content">
                                            @switch(request()->get('tab', 'data-keluargapengajuan'))
                                                @case('data-keluargapengajuan')
                                                    <p><strong>No. Kartu Keluarga :</strong> {{ $keluarga->no_kk }}</p>
                                                    <p><strong>Nama Kepala Keluarga :</strong> {{ $keluarga->kepala_keluarga }}</p>
                                                    <p><strong>Status Orang Tua Anak :</strong> {{ $keluarga->status_ortu }}</p>
                                                @break

                                                @case('data-ekonomipengajuan')
                                                    @include('AdminPusat.Pemberdayaan.DataBinaan.DataValidasiSurvey.DataPengajuan.showPengajuanEkonomi')
                                                @break

                                                @case('data-ayahpengajuan')
                                                    @include('AdminPusat.Pemberdayaan.DataBinaan.DataValidasiSurvey.DataPengajuan.showPengajuanAyah')
                                                @break

                                                @case('data-ibupengajuan')
                                                    @include('AdminPusat.Pemberdayaan.DataBinaan.DataValidasiSurvey.DataPengajuan.showPengajuanIbu')
                                                @break

                                                @case('data-walipengajuan')
                                                    @include('AdminPusat.Pemberdayaan.DataBinaan.DataValidasiSurvey.DataPengajuan.showPengajuanWali')
                                                @break
                                            @endswitch
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Validasi Kelayakan Section -->
                            <div class="card my-4">
                                <div class="card-header">
                                    <h5>Validasi Kelayakan</h5>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('validasi.survey', $survey->id_survey) }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label>Hasil Survey:</label>
                                            <div>
                                                <label class="mr-3">
                                                    <input type="radio" name="hasil_survey" value="Layak"
                                                        {{ $survey->hasil_survey == 'Layak' ? 'checked' : '' }}> Layak
                                                </label>
                                                <label>
                                                    <input type="radio" name="hasil_survey" value="Tidak Layak"
                                                        {{ $survey->hasil_survey == 'Tidak Layak' ? 'checked' : '' }}> Tidak
                                                    Layak
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group mt-3">
                                            <label>Keterangan Hasil Survey</label>
                                            <textarea name="keterangan_hasil" class="form-control" rows="3">{{ $survey->keterangan_hasil }}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success mt-3">Validasi</button>
                                        <a href="{{ route('validasisurveykeluarga') }}"
                                            class="btn btn-secondary mt-3">Kembali</a>
                                    </form>
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
            // Event untuk setiap link tab
            $('.nav-link').on('click', function(e) {
                e.preventDefault();

                // Tentukan tab dan section-nya (data survey atau pengajuan)
                const tab = $(this).attr('href').split('tab=')[1];
                const section = $(this).closest('.nav-tabs').data(
                    'section'); // Ambil data-section dari navbar
                const target = section === 'survey' ? '.survey-content' : '.pengajuan-content';

                // Update URL parameter tanpa reload halaman
                const url = new URL(window.location);
                url.searchParams.set('tab', tab);
                window.history.replaceState(null, '', url);

                // Panggil AJAX untuk mengisi konten tab
                loadTabContent(tab, target);

                // Update class active pada tab yang sesuai
                setActiveTab(section, tab);
            });

            // Fungsi AJAX untuk memuat ulang konten
            function loadTabContent(tab, target) {
                $.ajax({
                    url: "{{ route('validasisurveykeluarga.show', ['id_survey' => $survey->id_survey]) }}",
                    data: {
                        tab: tab
                    },
                    success: function(data) {
                        $(target).html($(data).find(target).html());
                    },
                    error: function() {
                        alert('Gagal memuat data. Silakan coba lagi.');
                    }
                });
            }

            // Fungsi untuk mengatur tombol tab aktif
            function setActiveTab(section, activeTab) {
                // Hapus class active dari semua tab dalam section yang relevan
                $(`ul[data-section="${section}"] .nav-link`).removeClass('active');

                // Tambahkan class active pada tab yang sesuai
                $(`ul[data-section="${section}"] .nav-link[href*="tab=${activeTab}"]`).addClass('active');
            }

            // Muat ulang data tab yang dipilih saat pertama kali halaman dimuat
            const initialTab = '{{ request()->get('tab', 'data-keluargasurvey') }}';
            const initialTarget = initialTab.includes('survey') ? '.survey-content' : '.pengajuan-content';

            loadTabContent(initialTab, initialTarget);
            setActiveTab(initialTab.includes('survey') ? 'survey' : 'pengajuan', initialTab);
        });
    </script>
@endsection
