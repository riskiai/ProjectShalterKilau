<?php

use App\Http\Controllers\AdminCabang\DashboardAdminCabangController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminPusat\DashboardAdminPusatController;
use App\Http\Controllers\AdminPusat\Settings\Quran\QuraanController;
use App\Http\Controllers\AdminShalter\DashboardAdminShalterController;
use App\Http\Controllers\DashboardAplikasiShalterPusatController;

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

// Admin Pusat
Route::middleware(['auth', 'userAccess:admin_pusat'])->group(function () {
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
        // Dashboard Halaman Settings
        Route::get('/dashboard-settings', [DashboardAdminPusatController::class, 'dashboardSettingsPusat'])->name('dashboardSettingsPusat');

        // Quran
        Route::get('/alquran', [QuraanController::class, 'index'])->name('alquran');
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

