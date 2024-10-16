<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardAplikasiShalterPusatController;
use App\Http\Controllers\AdminPusat\DashboardAdminPusatController;
use App\Http\Controllers\AdminCabang\DashboardAdminCabangController;
use App\Http\Controllers\AdminPusat\Settings\AnakTutor\Absen\AbsenUserController;
use App\Http\Controllers\AdminPusat\Settings\AnakTutor\Tutor\TutorController;
use App\Http\Controllers\AdminPusat\Settings\DataWilayah\DataShalter\DataShalterController;
use App\Http\Controllers\AdminShalter\DashboardAdminShalterController;

/* Settings */
// Master Data
use App\Http\Controllers\AdminPusat\Settings\MasterData\Bank\BankController;
use App\Http\Controllers\AdminPusat\Settings\DataWilayah\Kacab\KacabController;
use App\Http\Controllers\AdminPusat\Settings\DataWilayah\Wilbin\WilayahBinaanController;
use App\Http\Controllers\AdminPusat\Settings\MasterData\Quran\QuraanController;
use App\Http\Controllers\AdminPusat\Settings\MasterData\Materi\MateriController;
use App\Http\Controllers\AdminPusat\Settings\MasterData\Kegiatan\KegiatanController;
use App\Http\Controllers\AdminPusat\Settings\MasterData\Struktur\StrukturController;
// Data Wilayah
use App\Http\Controllers\AdminPusat\Settings\MasterData\LevelBinaan\LevelBinaanController;
use App\Http\Controllers\AdminPusat\Settings\MasterData\Sdm\SdmController;
use App\Http\Controllers\AdminPusat\Settings\PengajuanDonatur\PB\PenerimaBeasiswaController;
use App\Http\Controllers\AdminPusat\Settings\UsersManagement\AdminCabang\AdminCabangController;
use App\Http\Controllers\AdminPusat\Settings\UsersManagement\AdminShelter\AdminShelterController;
use App\Http\Controllers\AdminPusat\Settings\UsersManagement\Donatur\DonaturController;
use App\Http\Controllers\GlobalApiDataWilayahIndonesiaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

/* Authentication */
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('login-proses');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/* Rute untuk API AJAX */
Route::get('/provinsi', [GlobalApiDataWilayahIndonesiaController::class, 'getProvinsi'])->name('api.getProvinsi');
Route::get('/kabupaten/{id_prov}', [GlobalApiDataWilayahIndonesiaController::class, 'getKabupaten'])->name('api.kabupaten');
Route::get('/kecamatan/{id_kab}', [GlobalApiDataWilayahIndonesiaController::class, 'getKecamatan'])->name('api.kecamatan');
Route::get('/kelurahan/{id_kec}', [GlobalApiDataWilayahIndonesiaController::class, 'getKelurahan'])->name('api.kelurahan');

// Admin Pusat
Route::middleware(['auth', 'userAccess:admin_pusat'])->prefix('admin_pusat')->group(function () {
    // Dashboard Apk Admin Pusat
    Route::get('/dashboard-menuapkshalterpusat', [DashboardAplikasiShalterPusatController::class, 'dashboardShalterPusat'])->name('dashboardApkShalterPusat');
    
    /* Admin Pusat */
    // Dashboard Admin Pusat
    Route::get('/dashboard-PemberdayaanPusat', [DashboardAdminPusatController::class, 'dashboardPemberdayaanPusat'])->name('dashboardPemberdayaanPusat');
    Route::get('/dashboard-ReportPusat', [DashboardAdminPusatController::class, 'dashboardReportPusat'])->name('dashboardReportPusat');
    Route::get('/dashboard-KeuanganPusat', [DashboardAdminPusatController::class, 'dashboardKeuanganPusat'])->name('dashboardKeuanganPusat');
    Route::get('/dashboard-BeritaPusat', [DashboardAdminPusatController::class, 'dashboardBeritaPusat'])->name('dashboardBeritaPusat');

    // Settings Admin Pusat
    Route::prefix('settings')->group(function () { 

        /* Dashboard Halaman Settings */
        Route::get('/dashboard-settings', [DashboardAdminPusatController::class, 'dashboardSettingsPusat'])->name('dashboardSettingsPusat');

        /* Master Data */
        // Quran 
        Route::get('/alquran', [QuraanController::class, 'index'])->name('alquran');
        Route::post('/alquran/store', [QuraanController::class, 'store'])->name('alquran.store');
        Route::put('/alquran/update/{id_quran}', [QuraanController::class, 'update'])->name('alquran.update');
        Route::delete('/alquran/destroy/{id_quran}', [QuraanController::class, 'destroy'])->name('alquran.destroy');

         // Level Binaan
         Route::get('/level_anak_binaan', [LevelBinaanController::class, 'index'])->name('levelbinaan');
         Route::post('/level_anak_binaan/store', [LevelBinaanController::class, 'store'])->name('levelbinaan.store');
         Route::put('/level_anak_binaan/update/{id_level_anak_binaan}', [LevelBinaanController::class, 'update'])->name('levelbinaan.update');
         Route::delete('/level_anak_binaan/destroy/{id_level_anak_binaan}', [LevelBinaanController::class, 'destroy'])->name('levelbinaan.destroy');

        // Bank
        Route::get('/bank', [BankController::class, 'index'])->name('bank');
        Route::post('/bank/store', [BankController::class, 'store'])->name('bank.store');
        Route::put('/bank/update/{id_bank}', [BankController::class, 'update'])->name('bank.update');
        Route::delete('/bank/destroy/{id_bank}', [BankController::class, 'destroy'])->name('bank.destroy');

        // Materi Kurikulum
        Route::get('/materi', [MateriController::class, 'index'])->name('materi');
        Route::post('/materi/store', [MateriController::class, 'store'])->name('materi.store');
        Route::put('/materi/update/{id_materi}', [MateriController::class, 'update'])->name('materi.update');
        Route::delete('/materi/destroy/{id_materi}', [MateriController::class, 'destroy'])->name('materi.destroy');

        // Kegiatan
        Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan');
        Route::post('/kegiatan/store', [KegiatanController::class, 'store'])->name('kegiatan.store');
        Route::put('/kegiatan/update/{id_kegiatan}', [KegiatanController::class, 'update'])->name('kegiatan.update');
        Route::delete('/kegiatan/destroy/{id_kegiatan}', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy');

        // Struktur
        Route::get('/struktur', [StrukturController::class, 'index'])->name('struktur');
        Route::post('/struktur/store', [StrukturController::class, 'store'])->name('struktur.store');
        Route::put('/struktur/update/{id_struktur}', [StrukturController::class, 'update'])->name('struktur.update');
        Route::delete('/struktur/destroy/{id_struktur}', [StrukturController::class, 'destroy'])->name('struktur.destroy');

        // SDM
        Route::get('/sdm', [SdmController::class, 'index'])->name('sdm');
        Route::get('/sdm/create', [SdmController::class, 'create'])->name('sdm.create');
        Route::get('/wilbin/{id_kacab}', [SdmController::class, 'getWilbinByKacab']);
        Route::post('/sdm', [SdmController::class, 'store'])->name('sdm.store');
        Route::get('/sdm/{id_sdm}/edit', [SdmController::class, 'edit'])->name('sdm.edit');
        Route::put('/sdm/{id_sdm}', [SdmController::class, 'update'])->name('sdm.update');
        Route::delete('/sdm/{id_sdm}', [SdmController::class, 'destroy'])->name('sdm.destroy');

        /* Data Wilayah */
        // Kantor Cabang
        Route::get('/kantor_cabang', [KacabController::class, 'index'])->name('kantor_cabang');
        Route::get('/kantor_cabang/create', [KacabController::class, 'create'])->name('kantor_cabang.create');
        Route::post('/kantor_cabang', [KacabController::class, 'store'])->name('kantor_cabang.store');
        Route::get('/kantor_cabang/{id_kacab}/edit', [KacabController::class, 'edit'])->name('kantor_cabang.edit');
        Route::put('/kantor_cabang/{id_kacab}', [KacabController::class, 'update'])->name('kantor_cabang.update');
        Route::delete('/kantor_cabang/{id_kacab}', [KacabController::class, 'destroy'])->name('kantor_cabang.destroy');

        // Wilayah Binaan
        Route::get('/wilayah-binaan', [WilayahBinaanController::class, 'index'])->name('wilayah_binaan');
        Route::get('/wilayah-binaan/create', [WilayahBinaanController::class, 'create'])->name('wilayah_binaan.create');
        Route::post('/wilayah-binaan', [WilayahBinaanController::class, 'store'])->name('wilayah_binaan.store');
        Route::get('/wilayah-binaan/{id_wilbin}/edit', [WilayahBinaanController::class, 'edit'])->name('wilayah_binaan.edit');
        Route::put('/wilayah-binaan/{id_wilbin}', [WilayahBinaanController::class, 'update'])->name('wilayah_binaan.update');
        Route::delete('/wilayah-binaan/{id_wilbin}', [WilayahBinaanController::class, 'destroy'])->name('wilayah_binaan.destroy');

        // Data Shalter
        Route::get('/data-shalter', [DataShalterController::class, 'index'])->name('data_shalter');
        Route::get('/data-shalter/create', [DataShalterController::class, 'create'])->name('data_shalter.create');
        Route::post('/data-shalter/store', [DataShalterController::class, 'store'])->name('data_shalter.store');
        Route::get('/data-shalter/{id_shelter}/edit', [DataShalterController::class, 'edit'])->name('data_shalter.edit');
        Route::put('/data-shalter/{id_shelter}', [DataShalterController::class, 'update'])->name('data_shalter.update');
        Route::delete('/data-shalter/{id_shelter}', [DataShalterController::class, 'destroy'])->name('data_shalter.destroy');

        /* Anak Dan Tutor  */
        // Tutor 
        Route::get('/tutor', [TutorController::class, 'index'])->name('tutor');
        Route::get('/tutor/create', [TutorController::class, 'create'])->name('tutor.create');
        Route::post('/tutor/store', [TutorController::class, 'store'])->name('tutor.store');
        Route::get('/wilbin/{id_kacab}', [TutorController::class, 'getWilbinByKacab']);
        Route::get('/shelter/{id_wilbin}', [TutorController::class, 'getShelterByWilbin']);
        Route::get('/tutor/{id_shelter}/edit', [TutorController::class, 'edit'])->name('tutor.edit');
        Route::put('/tutor/{id_shelter}', [TutorController::class, 'update'])->name('tutor.update');
        Route::delete('/tutor/{id_shelter}', [TutorController::class, 'destroy'])->name('tutor.destroy');
    
        // Absen User Anak
        Route::get('/absensi_user_anak', [AbsenUserController::class, 'absenAnak'])->name('absen_anak');
        Route::get('/absensi_user_anak/{id_absen_user}/edit', [AbsenUserController::class, 'edit'])->name('absen_anak.edit');
        Route::put('/absensi_user_anak/{id_absen_user}', [AbsenUserController::class, 'update'])->name('absen_anak.update');
        Route::delete('/absensi_user_anak/{id_absen_user}', [AbsenUserController::class, 'destroy'])->name('absen_anak.destroy');

        // Absen User Tutor
        Route::get('/absensi_user_tutor', [AbsenUserController::class, 'absenTutor'])->name('absen_tutor');
        Route::get('/absensi_user_tutor/{id_absen_user}/edit', [AbsenUserController::class, 'edit'])->name('absen_tutor.edit');
        Route::put('/absensi_user_tutor/{id_absen_user}', [AbsenUserController::class, 'update'])->name('absen_tutor.update');
        Route::delete('/absensi_user_tutor/{id_absen_user}', [AbsenUserController::class, 'destroy'])->name('absen_tutor.destroy');

        /* Pengajuan Donatur */
        // Pengajuan Donatur (Penerima Beasiswa)
        Route::get('/pengajuan_donatur', [PenerimaBeasiswaController::class, 'pengajuanDonatur'])->name('pengajuan_donatur');
        Route::get('/pengajuan_donatur/{id_anak}/tambah_donatur', [PenerimaBeasiswaController::class, 'tambahDonatur'])->name('pengajuan_donatur.tambah_donatur');
        Route::put('/pengajuan_donatur/{id_anak}', [PenerimaBeasiswaController::class, 'update'])->name('pengajuan_donatur.update');
        Route::delete('/pengajuan_donatur/{id_anak}', [PenerimaBeasiswaController::class, 'destroy'])->name('pengajuan_donatur.destroy');

        // Pengajuan Donatur (Non Penerima Beasiswa)
        Route::get('/pengajuan_donatur_npb', [PenerimaBeasiswaController::class, 'pengajuanDonaturNpb'])->name('pengajuan_donatur_npb');
        Route::get('/pengajuan_donatur_npb/{id_anak}/tambah_donatur', [PenerimaBeasiswaController::class, 'tambahDonaturNpb'])->name('pengajuan_donatur_npb.tambah_donatur');
        Route::put('/pengajuan_donatur_npb/{id_anak}', [PenerimaBeasiswaController::class, 'update'])->name('pengajuan_donatur_npb.update');
        Route::delete('/pengajuan_donatur_npb/{id_anak}', [PenerimaBeasiswaController::class, 'destroy'])->name('pengajuan_donatur.destroy');

        /* Users Management */
        // Donatur
        Route::get('/donatur', [DonaturController::class, 'index'])->name('donatur');
        Route::get('/donatur/create', [DonaturController::class, 'create'])->name('donatur.create');
        Route::post('/donatur/store', [DonaturController::class, 'store'])->name('donatur.store');
        Route::get('/donatur/{id_donatur}/show', [DonaturController::class, 'show'])->name('donatur.show');
        Route::get('/donatur/{id_donatur}/edit', [DonaturController::class, 'edit'])->name('donatur.edit');
        Route::put('/donatur/{id_donatur}', [DonaturController::class, 'update'])->name('donatur.update');
        Route::delete('/donatur/{id_donatur}', [DonaturController::class, 'destroy'])->name('donatur.destroy');
        
        // Admin Shelter
        Route::get('/admin_shelter', [AdminShelterController::class, 'index'])->name('admin_shelter');
        Route::get('/admin_shelter/create', [AdminShelterController::class, 'create'])->name('admin_shelter.create');
        Route::post('/admin_shelter/store', [AdminShelterController::class, 'store'])->name('admin_shelter.store');
        Route::get('/admin_shelter/{id_admin_shelter}/show', [AdminShelterController::class, 'show'])->name('admin_shelter.show');
        Route::get('/admin_shelter/{id_admin_shelter}/edit', [AdminShelterController::class, 'edit'])->name('admin_shelter.edit');
        Route::put('/admin_shelter/{id_admin_shelter}', [AdminShelterController::class, 'update'])->name('admin_shelter.update');
        Route::delete('/admin_shelter/{id_admin_shelter}', [AdminShelterController::class, 'destroy'])->name('admin_shelter.destroy');

        // Admin Cabang
        Route::get('/admin_cabang', [AdminCabangController::class, 'index'])->name('admin_cabang');
        Route::get('/admin_cabang/create', [AdminCabangController::class, 'create'])->name('admin_cabang.create');
        Route::post('/admin_cabang/store', [AdminCabangController::class, 'store'])->name('admin_cabang.store');
        Route::get('/admin_cabang/{id_admin_cabang}/show', [AdminCabangController::class, 'show'])->name('admin_cabang.show');
        Route::get('/admin_cabang/{id_admin_cabang}/edit', [AdminCabangController::class, 'edit'])->name('admin_cabang.edit');
        Route::put('/admin_cabang/{id_admin_cabang}', [AdminCabangController::class, 'update'])->name('admin_cabang.update');
        Route::delete('/admin_cabang/{id_admin_cabang}', [AdminCabangController::class, 'destroy'])->name('admin_cabang.destroy');
    });
});


    // Admin Shalters
    Route::middleware(['auth', 'userAccess:admin_shelter'])->group(function () {
        // Dashboard Apk Admin Shalters
        Route::get('/dashboard-menuapkshalter', [DashboardAplikasiShalterPusatController::class, 'dashboardShalter'])->name('dashboardApkShalter');

        /* Admin Shalter */
        // Dashboard Admin Shalter
        Route::get('/dashboard-PemberdayaanShalter', [DashboardAdminShalterController::class, 'dashboardPemberdayaanShalter'])->name('dashboardPemberdayaanShalter');
        Route::get('/dashboard-ReportShalter', [DashboardAdminShalterController::class, 'dashboardReportShalter'])->name('dashboardReportShalter');
        Route::get('/dashboard-KeuanganShalter', [DashboardAdminShalterController::class, 'dashboardKeuanganShalter'])->name('dashboardKeuanganShalter');
    });

    // Admin Cabang
    Route::middleware(['auth', 'userAccess:admin_cabang'])->group(function () {
        // Dashboard Apk Admin Cabang
        Route::get('/dashboard-menuapkshaltercabangs', [DashboardAplikasiShalterPusatController::class, 'dashboardCabang'])->name('dashboardApkShalterCabang');

        // Dashboard Admin Cabang
        Route::get('/dashboard-PemberdayaanCabang', [DashboardAdminCabangController::class, 'dashboardPemberdayaanCabang'])->name('dashboardPemberdayaanCabang');
        Route::get('/dashboard-ReportCabang', [DashboardAdminCabangController::class, 'dashboardReportCabang'])->name('dashboardReportCabang');
        Route::get('/dashboard-KeuanganCabang', [DashboardAdminCabangController::class, 'dashboardKeuanganCabang'])->name('dashboardKeuanganCabang');
        Route::get('/dashboard-SettingsCabang', [DashboardAdminCabangController::class, 'dashboardSettingsCabang'])->name('dashboardSettingsCabang');
    });

