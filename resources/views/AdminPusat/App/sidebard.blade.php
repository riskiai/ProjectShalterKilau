<!-- Sidebar -->
<div class="sidebar" data-background-color="light">
    <div class="sidebar-logo">
        <div class="logo-header" data-background-color="light">
            <a href="index.html" class="logo">
                <img src="{{ asset('assets/img/LogoKilau2.png') }}" alt="Kilau" class="navbar-brand" height="50"
                    width="50" />
                <p style="color: black; padding-top: 10px; font-weight: 500;">Kilau Indonesia</p>
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right" style="color: black;"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left" style="color: black;"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt" style="color: black;"></i>
            </button>
        </div>
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">

                {{-- Kondisi Dashboard --}}
                <li
                    class="nav-item {{ request()->routeIs('dashboardPemberdayaanPusat') || request()->routeIs('dashboardSettingsPusat') || request()->routeIs('dashboardReportPusat') || request()->routeIs('dashboardKeuanganPusat') || request()->routeIs('dashboardBeritaPusat') ? 'active' : '' }}">

                    {{-- Jika sedang di halaman settings, arahkan ke dashboard settings --}}
                    @if (Str::startsWith(Route::currentRouteName(), 'dashboardSettingsPusat') ||
                            Str::startsWith(Route::currentRouteName(), 'alquran') ||
                            Str::startsWith(Route::currentRouteName(), 'bank') ||
                            Str::startsWith(Route::currentRouteName(), 'levelbinaan') ||
                            Str::startsWith(Route::currentRouteName(), 'materi') ||
                            Str::startsWith(Route::currentRouteName(), 'kegiatan') ||
                            Str::startsWith(Route::currentRouteName(), 'struktur') ||
                            Str::startsWith(Route::currentRouteName(), 'kantor_cabang') ||
                            Str::startsWith(Route::currentRouteName(), 'wilayah_binaan') ||
                            Str::startsWith(Route::currentRouteName(), 'sdm') ||
                            Str::startsWith(Route::currentRouteName(), 'data_shalter') ||
                            Str::startsWith(Route::currentRouteName(), 'tutor') ||
                            Str::startsWith(Route::currentRouteName(), 'absen_anak') ||
                            Str::startsWith(Route::currentRouteName(), 'absen_tutor') ||
                            Str::startsWith(Route::currentRouteName(), 'pengajuan_donatur') ||
                            Str::startsWith(Route::currentRouteName(), 'pengajuan_donatur_npb') ||
                            Str::startsWith(Route::currentRouteName(), 'donatur') ||
                            Str::startsWith(Route::currentRouteName(), 'admin_shelter') ||
                            Str::startsWith(Route::currentRouteName(), 'admin_cabang') ||
                            Str::startsWith(Route::currentRouteName(), 'admin_shelter') ||
                            Str::startsWith(Route::currentRouteName(), 'admin_pusat') ||
                            Str::startsWith(Route::currentRouteName(), 'usersall'))
                        <a href="{{ route('dashboardSettingsPusat') }}">
                            <i class="fas fa-tachometer-alt"></i>
                            <p>Dashboard Settings</p>
                        </a>
                    @endif

                    {{-- Jika sedang di halaman Pemberdayaan, arahkan ke dashboard Pemberdayaan --}}
                    @if (Str::startsWith(Route::currentRouteName(), 'dashboardPemberdayaanPusat') ||
                            Str::startsWith(Route::currentRouteName(), 'form_keluarga_baru') ||
                            Str::startsWith(Route::currentRouteName(), 'ajukan_anak') ||
                            Str::startsWith(Route::currentRouteName(), 'calonAnakBinaan') ||
                            Str::startsWith(Route::currentRouteName(), 'AnakBinaan') ||
                            Str::startsWith(Route::currentRouteName(), 'NonAnakBinaan') ||
                            Str::startsWith(Route::currentRouteName(), 'aktivasicalonAnakBinaan') ||
                            Str::startsWith(Route::currentRouteName(), 'editcalonAnakBinaan') ||
                            Str::startsWith(Route::currentRouteName(), 'editPendidikanAnakBinaan') ||
                            Str::startsWith(Route::currentRouteName(), 'nonAnakBinaan.show') ||
                            Str::startsWith(Route::currentRouteName(), 'editAnakBinaan') ||
                            Str::startsWith(Route::currentRouteName(), 'editPendidikanAnak')||
                            Str::startsWith(Route::currentRouteName(), 'keluarga')||
                            Str::startsWith(Route::currentRouteName(), 'Keluarga.show')||
                            Str::startsWith(Route::currentRouteName(), 'editKeluarga')||
                            Str::startsWith(Route::currentRouteName(), 'editDataAyah')||
                            Str::startsWith(Route::currentRouteName(), 'editDataIbu')||
                            Str::startsWith(Route::currentRouteName(), 'editDataWali')||
                            Str::startsWith(Route::currentRouteName(), 'surveykeluarga')||
                            Str::startsWith(Route::currentRouteName(), 'validasisurveykeluarga')||
                            Str::startsWith(Route::currentRouteName(), 'datakelompokshelter')||
                            Str::startsWith(Route::currentRouteName(), 'surveykeluarga.show')||
                            Str::startsWith(Route::currentRouteName(), 'validasisurveykeluarga.show'))
                        <a href="{{ route('dashboardPemberdayaanPusat') }}">
                            <i class="fas fa-tachometer-alt"></i>
                            <p>Dashboard Pemberdayaan</p>
                        </a>
                    @endif

                    {{-- Jika sedang di halaman Keuangan, arahkan ke dashboard keuangan --}}
                    @if (request()->routeIs('dashboardKeuanganPusat'))
                        <a href="{{ route('dashboardKeuanganPusat') }}">
                            <i class="fas fa-tachometer-alt"></i>
                            <p>Dashboard Keuangan</p>
                        </a>
                    @endif
                    {{-- Jika sedang di halaman Berita, arahkan ke dashboard berita --}}
                    @if (request()->routeIs('dashboardBeritaPusat'))
                        <a href="{{ route('dashboardBeritaPusat') }}">
                            <i class="fas fa-tachometer-alt"></i>
                            <p>Dashboard Berita</p>
                        </a>
                    @endif
                    {{-- Jika di halaman Pemberdayaan Pusat, arahkan ke dashboard Report --}}
                    @if (request()->routeIs('dashboardReportPusat'))
                        <a href="{{ route('dashboardReportPusat') }}">
                            <i class="fas fa-tachometer-alt"></i>
                            <p>Dashboard Report</p>
                        </a>
                    @endif
                </li>

                {{-- Dashboard Pemberdayaan Pusat --}}

                <!-- Sidebar Pemberdayaan Admin Pusat -->
                @if (Str::startsWith(Route::currentRouteName(), 'dashboardPemberdayaanPusat') ||
                        Str::startsWith(Route::currentRouteName(), 'form_keluarga_baru') ||
                        Str::startsWith(Route::currentRouteName(), 'ajukan_anak') ||
                        Str::startsWith(Route::currentRouteName(), 'calonAnakBinaan') ||
                        Str::startsWith(Route::currentRouteName(), 'AnakBinaan') ||
                        Str::startsWith(Route::currentRouteName(), 'NonAnakBinaan') ||
                        Str::startsWith(Route::currentRouteName(), 'aktivasicalonAnakBinaan') ||
                        Str::startsWith(Route::currentRouteName(), 'editcalonAnakBinaan') ||
                        Str::startsWith(Route::currentRouteName(), 'editPendidikanAnakBinaan') ||
                        Str::startsWith(Route::currentRouteName(), 'nonAnakBinaan.show') ||
                        Str::startsWith(Route::currentRouteName(), 'editAnakBinaan') ||
                        Str::startsWith(Route::currentRouteName(), 'editPendidikanAnak') ||
                        Str::startsWith(Route::currentRouteName(), 'keluarga')||
                        Str::startsWith(Route::currentRouteName(), 'Keluarga.show')||
                        Str::startsWith(Route::currentRouteName(), 'editKeluarga')||
                        Str::startsWith(Route::currentRouteName(), 'editDataAyah')||
                        Str::startsWith(Route::currentRouteName(), 'editDataIbu')||
                        Str::startsWith(Route::currentRouteName(), 'editDataWali')||
                        Str::startsWith(Route::currentRouteName(), 'surveykeluarga')||
                        Str::startsWith(Route::currentRouteName(), 'validasisurveykeluarga')||
                        Str::startsWith(Route::currentRouteName(), 'datakelompokshelter')||
                        Str::startsWith(Route::currentRouteName(), 'surveykeluarga.show')||
                        Str::startsWith(Route::currentRouteName(), 'validasisurveykeluarga.show'))
                    {{-- @if (request()->routeIs('dashboardPemberdayaanPusat')) --}}

                    <li
                        class="nav-item {{ request()->routeIs('form_keluarga_baru') || request()->routeIs('calonAnakBinaan') || request()->routeIs('AnakBinaan') || request()->routeIs('NonAnakBinaan') || request()->routeIs('calonAnakBinaan.show') || request()->routeIs('aktivasicalonAnakBinaan') || request()->routeIs('editcalonAnakBinaan') || request()->routeIs('editPendidikanAnakBinaan') || request()->routeIs('nonAnakBinaan.show') || request()->routeIs('AnakBinaan.show') || request()->routeIs('editAnakBinaan') || request()->routeIs('editPendidikanAnak') || request()->routeIs('keluarga') || request()->routeIs('Keluarga.show') || request()->routeIs('editKeluarga')  || request()->routeIs('editDataAyah') || request()->routeIs('editDataIbu') || request()->routeIs('editDataWali') || request()->routeIs('surveykeluarga') || request()->routeIs('validasisurveykeluarga') || request()->routeIs('surveykeluarga.show') || request()->routeIs('validasisurveykeluarga.show') ? 'active' : '' }}">
                        <a data-bs-toggle="collapse" href="#dataBinaan"
                            class="{{ request()->routeIs('form_keluarga_baru') || request()->routeIs('ajukan_anak') || request()->routeIs('calonAnakBinaan') || request()->routeIs('AnakBinaan') || request()->routeIs('NonAnakBinaan') || request()->routeIs('calonAnakBinaan.show') || request()->routeIs('aktivasicalonAnakBinaan') || request()->routeIs('editcalonAnakBinaan') || request()->routeIs('editPendidikanAnakBinaan') || request()->routeIs('nonAnakBinaan.show') || request()->routeIs('AnakBinaan.show') || request()->routeIs('editAnakBinaan') || request()->routeIs('editPendidikanAnak') || request()->routeIs('keluarga') || request()->routeIs('Keluarga.show') || request()->routeIs('editKeluarga') || request()->routeIs('editDataAyah') || request()->routeIs('editDataIbu') || request()->routeIs('editDataWali') || request()->routeIs('surveykeluarga') || request()->routeIs('validasisurveykeluarga') || request()->routeIs('surveykeluarga.show') || request()->routeIs('validasisurveykeluarga.show') ? 'active' : '' }}">
                            <i class="fas fa-database"></i>
                            <p>Data Binaan</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse {{ request()->routeIs('form_keluarga_baru') || request()->routeIs('ajukan_anak') || request()->routeIs('calonAnakBinaan') || request()->routeIs('AnakBinaan') || request()->routeIs('NonAnakBinaan') || request()->routeIs('calonAnakBinaan.show') || request()->routeIs('aktivasicalonAnakBinaan') || request()->routeIs('editcalonAnakBinaan') || request()->routeIs('editPendidikanAnakBinaan') || request()->routeIs('nonAnakBinaan.show') || request()->routeIs('AnakBinaan.show') || request()->routeIs('editAnakBinaan') || request()->routeIs('editPendidikanAnak') || request()->routeIs('keluarga')  || request()->routeIs('Keluarga.show') || request()->routeIs('editKeluarga') || request()->routeIs('editDataAyah') || request()->routeIs('editDataIbu') || request()->routeIs('editDataWali') || request()->routeIs('surveykeluarga') || request()->routeIs('validasisurveykeluarga') || request()->routeIs('surveykeluarga.show') || request()->routeIs('validasisurveykeluarga.show') ? 'show' : '' }}"
                            id="dataBinaan">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{ route('dashboardPemberdayaanPusat') }}"
                                        class="{{ request()->routeIs('form_keluarga_baru') || request()->routeIs('ajukan_anak') ? 'active' : '' }}"
                                        style="{{ request()->routeIs('form_keluarga_baru') || request()->routeIs('ajukan_anak') ? 'color: #6861ce; font-weight: bold;' : '' }}">
                                        <span class="sub-item">Pengajuan Anak Binaan</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('calonAnakBinaan') }}"
                                        class="{{ request()->routeIs('calonAnakBinaan') || request()->routeIs('calonAnakBinaan.show') || request()->routeIs('aktivasicalonAnakBinaan') || request()->routeIs('editcalonAnakBinaan') || request()->routeIs('editPendidikanAnakBinaan') ? 'active' : '' }}"
                                        style="{{ request()->routeIs('calonAnakBinaan') || request()->routeIs('calonAnakBinaan.show') || request()->routeIs('aktivasicalonAnakBinaan') || request()->routeIs('editcalonAnakBinaan') || request()->routeIs('editPendidikanAnakBinaan') ? 'color: #6861ce; font-weight: bold;' : '' }}">
                                        <span class="sub-item">Data Calon Anak Binaan</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('NonAnakBinaan') }}"
                                        class="{{ request()->routeIs('NonAnakBinaan') || request()->routeIs('nonAnakBinaan.show') ? 'active' : '' }}"
                                        style="{{ request()->routeIs('NonAnakBinaan') || request()->routeIs('nonAnakBinaan.show') ? 'color: #6861ce; font-weight: bold;' : '' }}">
                                        <span class="sub-item">Data Anak Binaan Non-Aktif</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('AnakBinaan') }}"
                                        class="{{ request()->routeIs('AnakBinaan') || request()->routeIs('AnakBinaan.show') || request()->routeIs('editAnakBinaan') || request()->routeIs('editPendidikanAnak') ? 'active' : '' }}"
                                        style="{{ request()->routeIs('AnakBinaan') || request()->routeIs('AnakBinaan.show') || request()->routeIs('editAnakBinaan') || request()->routeIs('editPendidikanAnak') ? 'color: #6861ce; font-weight: bold;' : '' }}">
                                        <span class="sub-item">Data Anak Binaan</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('keluarga') }}"
                                        class="{{ request()->routeIs('keluarga') || request()->routeIs('Keluarga.show') || request()->routeIs('editKeluarga') || request()->routeIs('editDataAyah') || request()->routeIs('editDataIbu') || request()->routeIs('editDataWali') ? 'active' : '' }}"
                                        style="{{ request()->routeIs('keluarga') || request()->routeIs('Keluarga.show') || request()->routeIs('editKeluarga') || request()->routeIs('editDataAyah') || request()->routeIs('editDataIbu') || request()->routeIs('editDataWali')  ? 'color: #6861ce; font-weight: bold;' : '' }}">
                                        <span class="sub-item">Data Keluarga</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('surveykeluarga') }}"
                                        class="{{ request()->routeIs('surveykeluarga') || request()->routeIs('surveykeluarga.show')   ? 'active' : '' }}"
                                        style="{{ request()->routeIs('surveykeluarga') || request()->routeIs('surveykeluarga.show')  ? 'color: #6861ce; font-weight: bold;' : '' }}">
                                        <span class="sub-item">Data Isi Survey</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('validasisurveykeluarga') }}"
                                        class="{{ request()->routeIs('validasisurveykeluarga') || request()->routeIs('validasisurveykeluarga.show')  ? 'active' : '' }}"
                                        style="{{ request()->routeIs('validasisurveykeluarga') || request()->routeIs('validasisurveykeluarga.show')  ? 'color: #6861ce; font-weight: bold;' : '' }}">
                                        <span class="sub-item">Data Validasi Survey</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item {{ request()->routeIs('datakelompokshelter') ? 'active' : '' }}">
                        <a data-bs-toggle="collapse" href="#dataKelompok" class="{{ request()->routeIs('datakelompokshelter')? 'active' : '' }}" >
                            <i class="fas fa-users"></i>
                            <p>Data Kelompok</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse {{ request()->routeIs('datakelompokshelter') ? 'show' : '' }}" id="dataKelompok">

                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{ route('datakelompokshelter') }}"
                                        class="{{ request()->routeIs('datakelompokshelter')  ? 'active' : '' }}"
                                        style="{{ request()->routeIs('datakelompokshelter')  ? 'color: #6861ce; font-weight: bold;' : '' }}">
                                        <span class="sub-item">Data Kelompok Shelter</span>
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </li>
                @endif

                <!-- Sidebar Settings Admin Pusat -->
                @if (Str::startsWith(Route::currentRouteName(), 'dashboardSettingsPusat') ||
                        Str::startsWith(Route::currentRouteName(), 'alquran') ||
                        Str::startsWith(Route::currentRouteName(), 'bank') ||
                        Str::startsWith(Route::currentRouteName(), 'levelbinaan') ||
                        Str::startsWith(Route::currentRouteName(), 'materi') ||
                        Str::startsWith(Route::currentRouteName(), 'kegiatan') ||
                        Str::startsWith(Route::currentRouteName(), 'struktur') ||
                        Str::startsWith(Route::currentRouteName(), 'kantor_cabang') ||
                        Str::startsWith(Route::currentRouteName(), 'wilayah_binaan') ||
                        Str::startsWith(Route::currentRouteName(), 'sdm') ||
                        Str::startsWith(Route::currentRouteName(), 'data_shalter') ||
                        Str::startsWith(Route::currentRouteName(), 'tutor') ||
                        Str::startsWith(Route::currentRouteName(), 'absen_anak') ||
                        Str::startsWith(Route::currentRouteName(), 'absen_tutor') ||
                        Str::startsWith(Route::currentRouteName(), 'pengajuan_donatur') ||
                        Str::startsWith(Route::currentRouteName(), 'pengajuan_donatur_npb') ||
                        Str::startsWith(Route::currentRouteName(), 'donatur') ||
                        Str::startsWith(Route::currentRouteName(), 'admin_shelter') ||
                        Str::startsWith(Route::currentRouteName(), 'admin_cabang') ||
                        Str::startsWith(Route::currentRouteName(), 'admin_pusat') ||
                        Str::startsWith(Route::currentRouteName(), 'usersall'))
                    <!-- Master Data -->
                    <li
                        class="nav-item {{ request()->routeIs('alquran') || request()->routeIs('bank') || request()->routeIs('levelbinaan') || request()->routeIs('materi') || request()->routeIs('kegiatan') || request()->routeIs('struktur') || request()->routeIs('sdm') || request()->routeIs('sdm.create') || request()->routeIs('sdm.edit') ? 'active' : '' }}">

                        <a data-bs-toggle="collapse" href="#masterData"
                            class="{{ request()->routeIs('alquran') || request()->routeIs('bank') || request()->routeIs('levelbinaan') || request()->routeIs('materi') || request()->routeIs('kegiatan') || request()->routeIs('struktur') || request()->routeIs('sdm') || request()->routeIs('sdm.create') || request()->routeIs('sdm.edit') ? 'active' : '' }}">
                            <i class="fas fa-database"></i>
                            <p>Master Data</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse {{ request()->routeIs('alquran') || request()->routeIs('bank') || request()->routeIs('levelbinaan') || request()->routeIs('materi') || request()->routeIs('kegiatan') || request()->routeIs('struktur') || request()->routeIs('sdm') || request()->routeIs('sdm.create') || request()->routeIs('sdm.edit') ? 'show' : '' }}"
                            id="masterData">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{ route('alquran') }}"
                                        class="{{ request()->routeIs('alquran') ? 'active' : '' }}"
                                        style="{{ request()->routeIs('alquran') ? 'color: #6861ce; font-weight: bold;' : '' }}">
                                        <span class="sub-item">Baca Al-Qur'an</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('bank') }}"
                                        class="{{ request()->routeIs('bank') ? 'active' : '' }}"
                                        style="{{ request()->routeIs('bank') ? 'color: #6861ce; font-weight: bold;' : '' }}">
                                        <span class="sub-item">Bank</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('levelbinaan') }}"
                                        class="{{ request()->routeIs('levelbinaan') ? 'active' : '' }}"
                                        style="{{ request()->routeIs('levelbinaan') ? 'color: #6861ce; font-weight: bold;' : '' }}">
                                        <span class="sub-item">Level Binaan</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('materi') }}"
                                        class="{{ request()->routeIs('materi') ? 'active' : '' }}"
                                        style="{{ request()->routeIs('materi') ? 'color: #6861ce; font-weight: bold;' : '' }}">
                                        <span class="sub-item">Materi (Kurikulum)</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('kegiatan') }}"
                                        class="{{ request()->routeIs('kegiatan') ? 'active' : '' }}"
                                        style="{{ request()->routeIs('kegiatan') ? 'color: #6861ce; font-weight: bold;' : '' }}">
                                        <span class="sub-item">Kegiatan</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('struktur') }}"
                                        class="{{ request()->routeIs('struktur') ? 'active' : '' }}"
                                        style="{{ request()->routeIs('struktur') ? 'color: #6861ce; font-weight: bold;' : '' }}">
                                        <span class="sub-item">Struktur Organisasi</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('sdm') }}"
                                        class="{{ request()->routeIs('sdm') || request()->routeIs('sdm.create') || request()->routeIs('sdm.edit') ? 'active' : '' }}"
                                        style="{{ request()->routeIs('sdm') || request()->routeIs('sdm.create') || request()->routeIs('sdm.edit') ? 'color: #6861ce; font-weight: bold;' : '' }}"">
                                        <span class="sub-item">Sumber Daya Manusia</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>

                    <!-- Data Wilayah -->
                    <li
                        class="nav-item {{ request()->routeIs('kantor_cabang') || request()->routeIs('kantor_cabang.create') || request()->routeIs('kantor_cabang.edit') || request()->routeIs('wilayah_binaan') || request()->routeIs('wilayah_binaan.create') || request()->routeIs('wilayah_binaan.edit') || request()->routeIs('data_shalter') || request()->routeIs('data_shalter.create') || request()->routeIs('data_shalter.edit') ? 'active' : '' }}">

                        <a data-bs-toggle="collapse" href="#dataWilayah"
                            class="{{ request()->routeIs('kantor_cabang') || request()->routeIs('kantor_cabang.create') || request()->routeIs('kantor_cabang.edit') || request()->routeIs('wilayah_binaan') || request()->routeIs('wilayah_binaan.create') || request()->routeIs('wilayah_binaan.edit') || request()->routeIs('data_shalter') || request()->routeIs('data_shalter.create') || request()->routeIs('data_shalter.edit') ? 'active' : '' }}">
                            <i class="fas fa-map-marker-alt"></i>
                            <p>Data Wilayah</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse {{ request()->routeIs('kantor_cabang') || request()->routeIs('kantor_cabang.create') || request()->routeIs('kantor_cabang.edit') || request()->routeIs('wilayah_binaan') || request()->routeIs('wilayah_binaan.create') || request()->routeIs('wilayah_binaan.edit') || request()->routeIs('data_shalter') || request()->routeIs('data_shalter.create') || request()->routeIs('data_shalter.edit') ? 'show' : '' }}"
                            id="dataWilayah">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{ route('kantor_cabang') }}"
                                        class="{{ request()->routeIs('kantor_cabang') || request()->routeIs('kantor_cabang.create') || request()->routeIs('kantor_cabang.edit') ? 'active' : '' }}"
                                        style="{{ request()->routeIs('kantor_cabang') || request()->routeIs('kantor_cabang.create') || request()->routeIs('kantor_cabang.edit') ? 'color: #6861ce; font-weight: bold;' : '' }}">
                                        <span class="sub-item">Kantor Cabang</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('wilayah_binaan') }}"
                                        class="{{ request()->routeIs('kantor_cabang') || request()->routeIs('wilayah_binaan.create') || request()->routeIs('wilayah_binaan.edit') ? 'active' : '' }}"
                                        style="{{ request()->routeIs('wilayah_binaan') || request()->routeIs('wilayah_binaan.create') || request()->routeIs('wilayah_binaan.edit') ? 'color: #6861ce; font-weight: bold;' : '' }}">
                                        <span class="sub-item">Wilayah Binaan</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('data_shalter') }}"
                                        class="{{ request()->routeIs('data_shalter') || request()->routeIs('data_shalter.create') || request()->routeIs('data_shalter.edit') ? 'active' : '' }}"
                                        style="{{ request()->routeIs('data_shalter') || request()->routeIs('data_shalter.create') || request()->routeIs('data_shalter.edit') ? 'color: #6861ce; font-weight: bold;' : '' }}">
                                        <span class="sub-item">Data Shelter</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Anak dan Tutor -->
                    <li
                        class="nav-item {{ request()->routeIs('tutor') || request()->routeIs('tutor.create') || request()->routeIs('tutor.edit') || request()->routeIs('absen_anak') || request()->routeIs('absen_anak.edit') || request()->routeIs('absen_tutor') || request()->routeIs('absen_tutor.edit') ? 'active' : '' }}">

                        <a data-bs-toggle="collapse" href="#anakTutor"
                            class=" {{ request()->routeIs('tutor') || request()->routeIs('tutor.create') || request()->routeIs('tutor.edit') || request()->routeIs('absen_anak') || request()->routeIs('absen_anak.edit') || request()->routeIs('absen_tutor') || request()->routeIs('absen_tutor.edit') ? 'active' : '' }}">
                            <i class="fas fa-user-friends"></i>
                            <p>Anak dan Tutor</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse {{ request()->routeIs('tutor') || request()->routeIs('tutor.create') || request()->routeIs('tutor.edit') || request()->routeIs('absen_anak') || request()->routeIs('absen_anak.edit') || request()->routeIs('absen_tutor') || request()->routeIs('absen_tutor.edit') ? 'show' : '' }}"
                            id="anakTutor">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{ route('tutor') }}"
                                        class="{{ request()->routeIs('tutor') || request()->routeIs('tutor.create') || request()->routeIs('tutor.edit') ? 'active' : '' }}"
                                        style="{{ request()->routeIs('tutor') || request()->routeIs('tutor.create') || request()->routeIs('tutor.edit') ? 'color: #6861ce; font-weight: bold;' : '' }}">
                                        <span class="sub-item">Data Tutor</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('absen_anak') }}"
                                        class="{{ request()->routeIs('absen_anak') || request()->routeIs('absen_anak.edit') ? 'active' : '' }}"
                                        style="{{ request()->routeIs('absen_anak') || request()->routeIs('absen_anak.edit') ? 'color: #6861ce; font-weight: bold;' : '' }}">
                                        <span class="sub-item">Absensi User Anak</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('absen_tutor') }}"
                                        class="{{ request()->routeIs('absen_tutor') || request()->routeIs('absen_tutor.edit') ? 'active' : '' }}"
                                        style="{{ request()->routeIs('absen_tutor') || request()->routeIs('absen_tutor.edit') ? 'color: #6861ce; font-weight: bold;' : '' }}">
                                        <span class="sub-item">Absensi User Tutor</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Pengajuan Donatur -->
                    <li
                        class="nav-item {{ request()->routeIs('pengajuan_donatur') || request()->routeIs('pengajuan_donatur.tambah_donatur') || request()->routeIs('pengajuan_donatur_npb') || request()->routeIs('pengajuan_donatur_npb.tambah_donatur') ? 'active' : '' }}">
                        <a data-bs-toggle="collapse" href="#pengajuanDonatur"
                            class=" {{ request()->routeIs('pengajuan_donatur') || request()->routeIs('pengajuan_donatur.tambah_donatur') || request()->routeIs('pengajuan_donatur_npb') || request()->routeIs('pengajuan_donatur_npb.tambah_donatur') ? 'active' : '' }}">
                            <i class="fas fa-hand-holding-heart"></i>
                            <p>Pengajuan Donatur</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse {{ request()->routeIs('pengajuan_donatur') || request()->routeIs('pengajuan_donatur.tambah_donatur') || request()->routeIs('pengajuan_donatur_npb') || request()->routeIs('pengajuan_donatur_npb.tambah_donatur') ? 'show' : '' }}"
                            id="pengajuanDonatur">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{ route('pengajuan_donatur') }}"
                                        class="{{ request()->routeIs('pengajuan_donatur') || request()->routeIs('pengajuan_donatur.tambah_donatur') ? 'active' : '' }}"
                                        style="{{ request()->routeIs('pengajuan_donatur') || request()->routeIs('pengajuan_donatur.tambah_donatur') ? 'color: #6861ce; font-weight: bold;' : '' }}">
                                        <span class="sub-item">Pengajuan Donatur (Penerima Beasiswa)</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('pengajuan_donatur_npb') }}"
                                        class="{{ request()->routeIs('pengajuan_donatur_npb') || request()->routeIs('pengajuan_donatur_npb.tambah_donatur') ? 'active' : '' }}"
                                        style="{{ request()->routeIs('pengajuan_donatur_npb') || request()->routeIs('pengajuan_donatur_npb.tambah_donatur') ? 'color: #6861ce; font-weight: bold;' : '' }}">
                                        <span class="sub-item">Pengajuan Donatur (Non Penerimaan Beasiswa)</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- User Management -->
                    <li
                        class="nav-item {{ request()->routeIs('donatur') || request()->routeIs('donatur.create') || request()->routeIs('donatur.show') || request()->routeIs('donatur.edit') || request()->routeIs('admin_shelter') || request()->routeIs('admin_shelter.create') || request()->routeIs('admin_shelter.show') || request()->routeIs('admin_shelter.edit') || request()->routeIs('admin_cabang') || request()->routeIs('admin_cabang.create') || request()->routeIs('admin_cabang.show') || request()->routeIs('admin_cabang.edit') || request()->routeIs('admin_pusat') || request()->routeIs('admin_pusat.create') || request()->routeIs('admin_pusat.show') || request()->routeIs('admin_pusat.edit') || request()->routeIs('usersall') || request()->routeIs('usersall.create') || request()->routeIs('usersall.edit') ? 'active' : '' }}">

                        <a data-bs-toggle="collapse" href="#userManagement"
                            class=" {{ request()->routeIs('donatur') || request()->routeIs('donatur.create') || request()->routeIs('donatur.tambah_show') || request()->routeIs('donatur.edit') || request()->routeIs('admin_shelter') || request()->routeIs('admin_shelter.create') || request()->routeIs('admin_shelter.show') || request()->routeIs('admin_shelter.edit') || request()->routeIs('admin_cabang') || request()->routeIs('admin_cabang.create') || request()->routeIs('admin_cabang.show') || request()->routeIs('admin_cabang.edit') || request()->routeIs('admin_pusat') || request()->routeIs('admin_pusat.create') || request()->routeIs('admin_pusat.show') || request()->routeIs('admin_pusat.edit') || request()->routeIs('usersall') || request()->routeIs('usersall.create') || request()->routeIs('usersall.edit') ? 'active' : '' }}">
                            <i class="fas fa-users"></i>
                            <p>User Management</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse {{ request()->routeIs('donatur') ||
                        request()->routeIs('donatur.show') ||
                        request()->routeIs('donatur.create') ||
                        request()->routeIs('donatur.edit') ||
                        request()->routeIs('admin_shelter') ||
                        request()->routeIs('admin_shelter.show') ||
                        request()->routeIs('admin_shelter.create') ||
                        request()->routeIs('admin_shelter.edit') ||
                        request()->routeIs('admin_cabang') ||
                        request()->routeIs('admin_cabang.show') ||
                        request()->routeIs('admin_cabang.create') ||
                        request()->routeIs('admin_cabang.edit') ||
                        request()->routeIs('admin_pusat') ||
                        request()->routeIs('admin_pusat.show') ||
                        request()->routeIs('admin_pusat.create') ||
                        request()->routeIs('admin_pusat.edit') ||
                        request()->routeIs('usersall') ||
                        request()->routeIs('usersall.create') ||
                        request()->routeIs('usersall.edit')
                            ? 'show'
                            : '' }}"
                            id="userManagement">

                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{ route('donatur') }}"
                                        class="{{ request()->routeIs('donatur') || request()->routeIs('donatur.show') || request()->routeIs('donatur.create') || request()->routeIs('donatur.edit') ? 'active' : '' }}"
                                        style="{{ request()->routeIs('donatur') || request()->routeIs('donatur.show') || request()->routeIs('donatur.create') || request()->routeIs('donatur.edit') ? 'color: #6861ce; font-weight: bold;' : '' }}">
                                        <span class="sub-item">User Donatur</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin_shelter') }}"
                                        class="{{ request()->routeIs('admin_shelter') || request()->routeIs('admin_shelter.show') || request()->routeIs('admin_shelter.create') || request()->routeIs('admin_shelter.edit') ? 'active' : '' }}"
                                        style="{{ request()->routeIs('admin_shelter') || request()->routeIs('admin_shelter.show') || request()->routeIs('admin_shelter.create') || request()->routeIs('admin_shelter.edit') ? 'color: #6861ce; font-weight: bold;' : '' }}">
                                        <span class="sub-item">User Admin Shelter</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin_cabang') }}"
                                        class="{{ request()->routeIs('admin_cabang') || request()->routeIs('admin_cabang.show') || request()->routeIs('admin_cabang.create') || request()->routeIs('admin_cabang.edit') ? 'active' : '' }}"
                                        style="{{ request()->routeIs('admin_cabang') || request()->routeIs('admin_cabang.show') || request()->routeIs('admin_cabang.create') || request()->routeIs('admin_cabang.edit') ? 'color: #6861ce; font-weight: bold;' : '' }}">
                                        <span class="sub-item">User Admin Cabang</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin_pusat') }}"
                                        class="{{ request()->routeIs('admin_pusat') || request()->routeIs('admin_pusat.show') || request()->routeIs('admin_pusat.create') || request()->routeIs('admin_pusat.edit') ? 'active' : '' }}"
                                        style="{{ request()->routeIs('admin_pusat') || request()->routeIs('admin_pusat.show') || request()->routeIs('admin_pusat.create') || request()->routeIs('admin_pusat.edit') ? 'color: #6861ce; font-weight: bold;' : '' }}">
                                        <span class="sub-item">User Admin Pusat</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('usersall') }}"
                                        class="{{ request()->routeIs('usersall') || request()->routeIs('usersall.create') || request()->routeIs('usersall.edit') ? 'active' : '' }}"
                                        style="{{ request()->routeIs('usersall') || request()->routeIs('usersall.create') || request()->routeIs('usersall.edit') ? 'color: #6861ce; font-weight: bold;' : '' }}">
                                        <span class="sub-item">All Users</span>
                                    </a>
                                </li>
                                {{-- <li><a href="#"><span class="sub-item">User Guru</span></a></li> --}}
                            </ul>
                        </div>
                    </li>
                @endif

                {{-- Report Pusat --}}
                @if (request()->routeIs('dashboardReportPusat'))
                    <li class="nav-item">
                        <a href="{{ route('dashboardReportPusat') }}">
                            <i class="fas fa-database"></i>
                            <p>Anak Report</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#tutorReport">
                            <i class="fas fa-database"></i>
                            <p>Tutor Report</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="tutorReport">
                            <ul class="nav nav-collapse">
                                <li><a href="#"><span class="sub-item">Tutor Report Pekanan</span></a></li>
                                <li><a href="#"><span class="sub-item">Tutor Report Pendidikan</span></a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#shalterReport">
                            <i class="fas fa-database"></i>
                            <p>Shalter Report</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="shalterReport">
                            <ul class="nav nav-collapse">
                                <li><a href="#"><span class="sub-item">Shalter Absensi Report</span></a></li>
                                <li><a href="#"><span class="sub-item">Surat Anak</span></a></li>
                                <li><a href="#"><span class="sub-item">Report Anak</span></a></li>
                                <li><a href="#"><span class="sub-item">Histori Anak</span></a></li>
                                <li><a href="#"><span class="sub-item">Aktivitas Anak</span></a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('dashboardReportPusat') }}">
                            <i class="fas fa-database"></i>
                            <p>Cabang Report</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('dashboardReportPusat') }}">
                            <i class="fas fa-database"></i>
                            <p>CPB Report</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('dashboardReportPusat') }}">
                            <i class="fas fa-database"></i>
                            <p>Donatur Report</p>
                        </a>
                    </li>
                @endif

                {{-- Keuangan Pusat --}}
                @if (request()->routeIs('dashboardKeuanganPusat'))
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#importData">
                            <i class="fas fa-database"></i>
                            <p>Import Data</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="importData">
                            <ul class="nav nav-collapse">
                                <li><a href="#"><span class="sub-item">Keuangan Binaan</span></a></li>
                            </ul>
                        </div>
                    </li>
                @endif

                {{-- Berita Pusat --}}
                @if (request()->routeIs('dashboardBeritaPusat'))
                    <li class="nav-item">
                        <a href="{{ route('dashboardBeritaPusat') }}">
                            <i class="fas fa-database"></i>
                            <p>Berita</p>
                        </a>
                    </li>
                @endif

                {{-- Kembali ke Beranda --}}
                <li class="nav-item {{ request()->routeIs('dashboardApkShalterPusat') ? 'active' : '' }}">
                    <a href="{{ route('dashboardApkShalterPusat') }}">
                        <i class="fas fa-home"></i>
                        <p>Kembali Ke Beranda</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
