<!-- Sidebar -->
<div class="sidebar" data-background-color="light">
    <div class="sidebar-logo">
        <div class="logo-header" data-background-color="light">
            <a href="index.html" class="logo">
                <img src="assets/img/LogoKilau2.png" alt="Kilau" class="navbar-brand" height="50" width="50" />
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
                <li class="nav-item active">
                    <a href="{{ route('dashboardPemberdayaanShalter') }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
  
                {{-- Dashboard Pemberdayaan Pusat --}}
                @if(Route::currentRouteName() == 'dashboardPemberdayaanShalter')
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
                            <li><a href="#"><span class="sub-item">Data Anak Binaan</span></a></li>
                            <li><a href="#"><span class="sub-item">Data Keluarga</span></a></li>
                            <li><a href="#"><span class="sub-item">Data Isi Survey</span></a></li>
                            <li><a href="#"><span class="sub-item">Validasi Survey</span></a></li>
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
  
                {{-- Dashboard Report Pusat --}}
                @if(Route::currentRouteName() == 'dashboardReportShalter')
                <li class="nav-item">
                    <a href="{{ route('dashboardReportPusat') }}">
                        <i class="fas fa-database"></i>
                        <p>Anak Report</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#tutorReport1">
                        <i class="fas fa-database"></i>
                        <p>Tutor Report</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="tutorReport1">
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
                    <p>CPB Report</p>
                </a>
              </li>
                @endif
  
                {{-- Dashboard Keuangan Pusat --}}
                @if(Route::currentRouteName() == 'dashboardKeuanganShalter')
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
  
                <li class="nav-item">
                    <a href="{{ route('dashboardApkShalter') }}">
                        <i class="fas fa-home"></i>
                        <p>Kembali Ke Beranda</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
  </div>
  <!-- End Sidebar -->
  