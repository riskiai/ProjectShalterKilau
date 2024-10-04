<!-- Sidebar -->
<div class="sidebar" data-background-color="light">
    <div class="sidebar-logo">
        <div class="logo-header" data-background-color="light">
            <a href="index.html" class="logo">
                <img src="{{ asset('assets/img/LogoKilau2.png') }}" alt="Kilau" class="navbar-brand" height="50" width="50" />
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
                <li class="nav-item {{ request()->routeIs('dashboardPemberdayaanPusat') || request()->routeIs('dashboardSettingsPusat') || request()->routeIs('dashboardReportPusat') || request()->routeIs('dashboardKeuanganPusat') || request()->routeIs('dashboardBeritaPusat') ? 'active' : '' }}">
                    {{-- Jika sedang di halaman settings, arahkan ke dashboard settings --}}
                    @if(Str::startsWith(Route::currentRouteName(), 'dashboardSettingsPusat') || Str::startsWith(Route::currentRouteName(), 'alquran'))
                        <a href="{{ route('dashboardSettingsPusat') }}">
                            <i class="fas fa-tachometer-alt"></i>
                            <p>Dashboard Settings</p>
                        </a>
                    {{-- Jika sedang di halaman Report, arahkan ke dashboard report --}}
                    @elseif(request()->routeIs('dashboardReportPusat'))
                        <a href="{{ route('dashboardReportPusat') }}">
                            <i class="fas fa-tachometer-alt"></i>
                            <p>Dashboard Report</p>
                        </a>
                    {{-- Jika sedang di halaman Keuangan, arahkan ke dashboard keuangan --}}
                    @elseif(request()->routeIs('dashboardKeuanganPusat'))
                        <a href="{{ route('dashboardKeuanganPusat') }}">
                            <i class="fas fa-tachometer-alt"></i>
                            <p>Dashboard Keuangan</p>
                        </a>
                    {{-- Jika sedang di halaman Berita, arahkan ke dashboard berita --}}
                    @elseif(request()->routeIs('dashboardBeritaPusat'))
                        <a href="{{ route('dashboardBeritaPusat') }}">
                            <i class="fas fa-tachometer-alt"></i>
                            <p>Dashboard Berita</p>
                        </a>
                    {{-- Jika di halaman Pemberdayaan Pusat, arahkan ke dashboard pemberdayaan --}}
                    @else
                        <a href="{{ route('dashboardPemberdayaanPusat') }}">
                            <i class="fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    @endif
                </li>

                {{-- Dashboard Pemberdayaan Pusat --}}
                @if(request()->routeIs('dashboardPemberdayaanPusat'))
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#dataBinaan">
                        <i class="fas fa-database"></i>
                        <p>Data Binaan</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="dataBinaan">
                        <ul class="nav nav-collapse">
                            <li><a href="#"><span class="sub-item">Pengajuan Anak Binaan</span></a></li>
                            <li><a href="#"><span class="sub-item">Data Calon Anak Binaan</span></a></li>
                            <li><a href="#"><span class="sub-item">Data Anak Binaan Non-Aktif</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#dataKelompok">
                        <i class="fas fa-users"></i>
                        <p>Data Kelompok</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="dataKelompok">
                        <ul class="nav nav-collapse">
                            <li><a href="#"><span class="sub-item">Data Kelompok Shelter</span></a></li>
                        </ul>
                    </div>
                </li>
                @endif

                {{-- Sidebar Settings Admin Pusat --}}
                @if(Str::startsWith(Route::currentRouteName(), 'dashboardSettingsPusat') || Str::startsWith(Route::currentRouteName(), 'alquran'))

              <!-- Master Data -->
                <li class="nav-item {{ request()->routeIs('alquran') ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#masterData" class="{{ request()->routeIs('alquran') ? 'active' : '' }}">
                        <i class="fas fa-database"></i>
                        <p>Master Data</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->routeIs('alquran') ? 'show' : '' }}" id="masterData">
                        <ul class="nav nav-collapse">
                            <!-- Submenu Baca Al-Qur'an -->
                            <li>
                                <a href="{{ route('alquran') }}" 
                                   class="{{ request()->routeIs('alquran') ? 'active' : '' }}" 
                                   style="{{ request()->routeIs('alquran') ? 'color: blue; font-weight: bold;' : '' }}">
                                    <span class="sub-item">Baca Al-Qur'an</span>
                                </a>
                            </li>
                            
                            <li><a href="#"><span class="sub-item">Bank</span></a></li>
                            <li><a href="#"><span class="sub-item">Level Binaan</span></a></li>
                            <li><a href="#"><span class="sub-item">Materi (Kurikulum)</span></a></li>
                            <li><a href="#"><span class="sub-item">Kegiatan</span></a></li>
                            <li><a href="#"><span class="sub-item">Struktur Organisasi</span></a></li>
                            <li><a href="#"><span class="sub-item">Sumber Daya Manusia</span></a></li>
                        </ul>
                    </div>
                </li>

                <!-- Data Wilayah -->
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#dataWilayah">
                        <i class="fas fa-map-marker-alt"></i>
                        <p>Data Wilayah</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="dataWilayah">
                        <ul class="nav nav-collapse">
                            <li><a href="#"><span class="sub-item">Kantor Cabang</span></a></li>
                            <li><a href="#"><span class="sub-item">Wilayah Binaan</span></a></li>
                            <li><a href="#"><span class="sub-item">Data Shalter</span></a></li>
                        </ul>
                    </div>
                </li>

                <!-- Anak dan Tutor -->
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#anakTutor">
                        <i class="fas fa-user-friends"></i>
                        <p>Anak dan Tutor</p>                
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="anakTutor">
                        <ul class="nav nav-collapse">
                            <li><a href="#"><span class="sub-item">Data Tutor</span></a></li>
                            <li><a href="#"><span class="sub-item">Absensi User Anak</span></a></li>
                            <li><a href="#"><span class="sub-item">Absensi User Tutor</span></a></li>
                        </ul>
                    </div>
                </li>

                 <!-- Pengajuan Donatur -->
                 <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#pengajuanDonatur">
                        <i class="fas fa-hand-holding-heart"></i>
                        <p>Pengajuan Donatur</p>                
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="pengajuanDonatur">
                        <ul class="nav nav-collapse">
                            <li><a href="#"><span class="sub-item">Pengajuan Donatur (Penerima Beasiswa)</span></a></li>
                            <li><a href="#"><span class="sub-item">Pengajuan Donatur (Non Penerimaan Beasiswa)</span></a></li>
                        </ul>
                    </div>
                </li>

                <!-- User Management -->
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#userManagement">
                        <i class="fas fa-users"></i>
                        <p>User Management</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="userManagement">
                        <ul class="nav nav-collapse">
                            <li><a href="#"><span class="sub-item">User Donatur</span></a></li>
                            <li><a href="#"><span class="sub-item">User Guru</span></a></li>
                            <li><a href="#"><span class="sub-item">User Admin Shelter</span></a></li>
                            <li><a href="#"><span class="sub-item">User Admin Cabang</span></a></li>
                            <li><a href="#"><span class="sub-item">User Admin Pusat</span></a></li>
                        </ul>
                    </div>
                </li>
                @endif

                {{-- Report Pusat --}}
                @if(request()->routeIs('dashboardReportPusat'))
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
                @if(request()->routeIs('dashboardKeuanganPusat'))
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
                @if(request()->routeIs('dashboardBeritaPusat'))
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
