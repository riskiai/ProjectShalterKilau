<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardAplikasiShalterPusatController;
use App\Http\Controllers\GlobalApiDataWilayahIndonesiaController;
use App\Http\Controllers\AdminPusat\DashboardAdminPusatController;
use App\Http\Controllers\AdminCabang\DashboardAdminCabangController;
use App\Http\Controllers\AdminPusat\Berita\BeritaController;
use App\Http\Controllers\AdminPusat\Keuangan\KeuanganController;
use App\Http\Controllers\AdminPusat\Pemberdayaan\DataBinaan\DataAnakBinaan\DataAnakBinaanController;
use App\Http\Controllers\AdminPusat\Pemberdayaan\DataBinaan\DataAnakNonBinaan\DataAnakNonBinaanController;
use App\Http\Controllers\AdminShalter\DashboardAdminShalterController;
use App\Http\Controllers\AdminPusat\Settings\MasterData\Sdm\SdmController;
use App\Http\Controllers\AdminPusat\Settings\MasterData\Bank\BankController;
use App\Http\Controllers\AdminPusat\Settings\AnakTutor\Tutor\TutorController;
use App\Http\Controllers\AdminPusat\Settings\DataWilayah\Kacab\KacabController;

/* Settings */
// Master Data
use App\Http\Controllers\AdminPusat\Settings\MasterData\Quran\QuraanController;
use App\Http\Controllers\AdminPusat\Settings\MasterData\Materi\MateriController;
use App\Http\Controllers\AdminPusat\Settings\AnakTutor\Absen\AbsenUserController;
use App\Http\Controllers\AdminPusat\Settings\MasterData\Kegiatan\KegiatanController;
use App\Http\Controllers\AdminPusat\Settings\MasterData\Struktur\StrukturController;
use App\Http\Controllers\AdminPusat\Settings\UsersManagement\Donatur\DonaturController;
use App\Http\Controllers\AdminPusat\Settings\DataWilayah\Wilbin\WilayahBinaanController;
// Data Wilayah
use App\Http\Controllers\AdminPusat\Settings\UsersManagement\UsersAll\UsersAllController;
use App\Http\Controllers\AdminPusat\Settings\MasterData\LevelBinaan\LevelBinaanController;
use App\Http\Controllers\AdminPusat\Settings\DataWilayah\DataShalter\DataShalterController;
use App\Http\Controllers\AdminPusat\Settings\PengajuanDonatur\PB\PenerimaBeasiswaController;
use App\Http\Controllers\AdminPusat\Settings\UsersManagement\AdminPusat\AdminPusatController;
use App\Http\Controllers\AdminPusat\Settings\UsersManagement\AdminCabang\AdminCabangController;
use App\Http\Controllers\AdminPusat\Settings\UsersManagement\AdminShelter\AdminShelterController;
use App\Http\Controllers\AdminPusat\Pemberdayaan\DataBinaan\PengajuanAnakBinaan\FormKeluargaController;
use App\Http\Controllers\AdminPusat\Pemberdayaan\DataBinaan\PengajuanAnakBinaan\FormKeluargaBaruController;
use App\Http\Controllers\AdminPusat\Pemberdayaan\DataBinaan\DataCalonAnakBinaan\DataCalonAnakBinaanController;
use App\Http\Controllers\AdminPusat\Pemberdayaan\DataBinaan\DataKeluarga\DataKeluargaController;
use App\Http\Controllers\AdminPusat\Pemberdayaan\DataBinaan\DataSurvey\DataSurveyController;
use App\Http\Controllers\AdminPusat\Pemberdayaan\DataBinaan\DataSurvey\DataValidasiSurveyController;
use App\Http\Controllers\AdminPusat\Pemberdayaan\DataKelompok\DataKelompokController;
use App\Http\Controllers\AdminPusat\Report\ReportAnakController;
use App\Http\Controllers\AdminPusat\Report\ReportShalterController;
use App\Http\Controllers\AdminPusat\Report\ReportShalterSuratAnakController;
use App\Http\Controllers\AdminPusat\Report\ReportTutorController;
use App\Http\Controllers\AdminPusat\Settings\PengajuanDonatur\PenerimaNonBeasiswaController;

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

        // Admin Pusat Pemberdayaan
        Route::prefix('pemberdayaan')->group(function () {
            Route::get('/dashboard-PemberdayaanPusat', [DashboardAdminPusatController::class, 'dashboardPemberdayaanPusat'])->name('dashboardPemberdayaanPusat');

            /* Data Binaan */
            // Data Form Keluarga Baru
            Route::get('/form-keluarga', [FormKeluargaBaruController::class, 'formKeluargaBaru'])->name('form_keluarga_baru');
            Route::post('/form-keluarga/store', [FormKeluargaBaruController::class, 'store'])->name('form_keluarga_baru.store');
    
            // Data Form Keluarga Yang Sudah ada
            Route::get('/ajukan-anak', [FormKeluargaController::class, 'pengajuananak'])->name('ajukan_anak');
            Route::post('/validasi-kk', [FormKeluargaController::class, 'validasikk'])->name('validasi_kk');
            Route::post('/pengajuan-anak', [FormKeluargaController::class, 'pengajuananakstore'])->name('pengajuan_anak_store');
            
            // Data Calon Anak Binaan
            Route::get('/calonAnakBinaan', [DataCalonAnakBinaanController::class, 'index'])->name('calonAnakBinaan');
            Route::patch('/anak/{id}/activasi', [DataCalonAnakBinaanController::class, 'activasi'])->name('anak.activasi');
            Route::get('/calonAnakBinaan/{id}/show', [DataCalonAnakBinaanController::class, 'show'])->name('calonAnakBinaan.show');
            Route::get('/aktivasicalonAnakBinaan/{id}', [DataCalonAnakBinaanController::class, 'aktivasicalonanakbinaanshow'])->name('aktivasicalonAnakBinaan');        
            Route::delete('/calonAnakBinaan/{id}', [DataCalonAnakBinaanController::class, 'destroy'])->name('calonAnakBinaan.destroy');
            /* Data Edit Di Halaman Calon Anak Binaan  */
            // Data Edit Di Halaman Anak Binaan  
            Route::get('/editcalonAnakBinaan/{id}', [DataCalonAnakBinaanController::class, 'editcalonanakbinaan'])->name('editcalonAnakBinaan');
            Route::post('/editcalonAnakBinaanProsess/{id}', [DataCalonAnakBinaanController::class, 'editprosesscalonanakbinaan'])->name('edit.prosess.calonAnakBinaan');
            // Data Edit Halaman Pendidikan Anak
            Route::get('/editPendidikanAnakBinaan/{id}', [DataCalonAnakBinaanController::class, 'editPendidikanAnakBinaan'])->name('editPendidikanAnakBinaan');
            Route::post('/editPendidikanAnakBinaanProsess/{id}', [DataCalonAnakBinaanController::class, 'editprosesspendidikananakbinaan'])->name('edit.prosess.PendidikanAnakBinaan');
    
            // Data Non Anak Binaan
            Route::get('/NonAnakBinaan', [DataAnakNonBinaanController::class, 'index'])->name('NonAnakBinaan');
            Route::patch('/nonbinaanactive/{id}/activasi', [DataAnakNonBinaanController::class, 'nonbinaanactivactivasi'])->name('anak.nonbinaanactivasi');
            Route::get('/nonAnakBinaan/{id}/show', [DataAnakNonBinaanController::class, 'show'])->name('nonAnakBinaan.show');
            Route::delete('/NonAnakBinaan/{id}', [DataAnakNonBinaanController::class, 'destroy'])->name('NonAnakBinaan.destroy');
            
            // Data Anak Binaan
            Route::get('/AnakBinaan', [DataAnakBinaanController::class, 'index'])->name('AnakBinaan');
            Route::patch('/nonaktifkan-anak/{id}/activasi', [DataAnakBinaanController::class, 'nonactivasi'])->name('anak.nonactivasi');
            Route::get('/AnakBinaan/{id}/show', [DataAnakBinaanController::class, 'show'])->name('AnakBinaan.show');
            Route::delete('/AnakBinaan/{id}', [DataAnakBinaanController::class, 'destroy'])->name('AnakBinaan.destroy');
            /* Data Edit Di Halaman Anak Binaan  */
            // Data Edit Di Halaman Anak Binaan  
            Route::get('/editAnakBinaan/{id}', [DataAnakBinaanController::class, 'editanakbinaan'])->name('editAnakBinaan');
            Route::post('/editAnakBinaanProsess/{id}', [DataAnakBinaanController::class, 'editprosessanakbinaan'])->name('edit.prosess.AnakBinaan');
            // Data Edit Halaman Pendidikan Anak
            Route::get('/editPendidikanAnak/{id}', [DataAnakBinaanController::class, 'editPendidikanAnak'])->name('editPendidikanAnak');
            Route::post('/editPendidikanAnakProsess/{id}', [DataAnakBinaanController::class, 'editprosesspendidikananak'])->name('edit.prosess.PendidikanAnak');
            
            // Data Keluarga
            Route::get('/keluarga', [DataKeluargaController::class, 'index'])->name('keluarga');
            Route::get('/keluarga/{id}/show', [DataKeluargaController::class, 'show'])->name('Keluarga.show');
            Route::delete('/keluarga/{id}', [DataKeluargaController::class, 'destroy'])->name('keluarga.destroy');
            /* Data Edit */
            // Edit Data Keluarga
            Route::get('/keluarga/{id}/edit-keluarga', [DataKeluargaController::class, 'edit'])->name('editKeluarga');
            Route::post('/keluarga/{id}/edit-proses', [DataKeluargaController::class, 'update'])->name('edit.prosess.keluarga');
            //Edit Data Ayah
            Route::get('/keluarga/{id}/edit-ayah', [DataKeluargaController::class, 'editAyah'])->name('editDataAyah');
            Route::post('/keluarga/{id}/edit-ayahprosess', [DataKeluargaController::class, 'updateAyah'])->name('edit.prosess.keluarga.ayah');
            // Edit Data Ibu
            Route::get('/keluarga/{id}/edit-ibu', [DataKeluargaController::class, 'editIbu'])->name('editDataIbu');
            Route::post('/keluarga/{id}/edit-ibuprosess', [DataKeluargaController::class, 'updateIbu'])->name('edit.prosess.keluarga.ibu');
            // Edit Data Wali
            Route::get('/keluarga/{id}/edit-wali', [DataKeluargaController::class, 'editWali'])->name('editDataWali');
            Route::post('/keluarga/{id}/edit-waliprosess', [DataKeluargaController::class, 'updateWali'])->name('edit.prosess.keluarga.wali');
            
            // Data Survey
            Route::get('/surveykeluarga', [DataSurveyController::class, 'index'])->name('surveykeluarga');
            /* Data Survey Keluarga Create */
            Route::get('/surveykeluarga/{id}/show', [DataSurveyController::class, 'show'])->name('surveykeluarga.show');
            Route::post('/surveykeluarga/{id}/store', [DataSurveyController::class, 'store'])->name('surveykeluarga.store');
            Route::post('/survey/{id_survey}/ubah-status', [DataSurveyController::class, 'ubahStatus'])->name('survey.ubahStatus');
    
            // Simpan sementara data pada setiap tab
            // Route::post('/surveykeluarga/{id}/savetemp', [DataSurveyController::class, 'saveTemporary'])->name('surveykeluarga.saveTemporary');
    
            // Validasi Survey
            Route::get('/validasisurveykeluarga', [DataValidasiSurveyController::class, 'index'])->name('validasisurveykeluarga');
            Route::get('/validasisurveykeluarga/{id_survey}/show', [DataValidasiSurveyController::class, 'validasiSurveyShow'])->name('validasisurveykeluarga.show');
            Route::post('/validasi/survey/{id}', [DataValidasiSurveyController::class, 'storeValidation'])->name('validasi.survey');
            Route::delete('/validasisurveykeluarga/{id_keluarga}/survey/{id_survey}', [DataValidasiSurveyController::class, 'destroy'])->name('validasi.destroy');

             // Data Kelompok
            Route::get('/datakelompokshelter', [DataKelompokController::class, 'index'])->name('datakelompokshelter');
            Route::get('/datakelompokshelter/{id}/show', [DataKelompokController::class, 'show'])->name('datakelompokshelter.show');
            Route::get('/kelompok/{id_kelompok}/jumlahAnggota', [DataKelompokController::class, 'getJumlahAnggota'])->name('kelompok.getJumlahAnggota');
            /* Tambah Kelompok Shelter*/
            Route::get('/kelompok/create/{id_shelter}', [DataKelompokController::class, 'create'])->name('kelompok.create');
            Route::post('/kelompok/createprosess/{id_shelter}', [DataKelompokController::class, 'createprosess'])->name('kelompok.createprosess');
           
            // Pindah Data Shelter
            Route::get('/pindahanakshelter/create/{id_shelter}', [DataKelompokController::class, 'pindahanak'])->name('pindahanak');
            Route::post('/pindahanakshelter/createprosess/{id_shelter}', [DataKelompokController::class, 'pindahanakshelterprosess'])->name('pindahanakshelterprosess');
            /* Tambah Anggota Anak Binaan */
            Route::get('/kelompokAnakBinaan/create/{id_shelter}/{id_kelompok}', [DataKelompokController::class, 'createanak'])->name('kelompok.createanak');
            Route::post('/kelompokAnakBinaan/createprosess/{id_shelter}/{id_kelompok}', [DataKelompokController::class, 'createanakprosess'])->name('kelompok.createanakprosess');
            Route::delete('/kelompokAnakBinaan/delete/{id_anak}', [DataKelompokController::class, 'deleteanak'])->name('kelompok.deleteanak');
            
            /* Edit Data Kelompok Shelter */
            Route::get('/kelompok/edit/{id_kelompok}', [DataKelompokController::class, 'edit'])->name('kelompok.edit');
            Route::post('/kelompok/editprosess/{id_kelompok}', [DataKelompokController::class, 'editprosess'])->name('kelompok.editprosess');
            Route::get('/kelompok/move/{id_kelompok}', [DataKelompokController::class, 'move'])->name('shelter.move'); 
        });
        
        // Admin Pusat Settings
        Route::prefix('settings')->group(function () { 
            // Dashboard Halaman Settings
            Route::get('/dashboard-settings', [DashboardAdminPusatController::class, 'dashboardSettingsPusat'])->name('dashboardSettingsPusat');

            // Master Data
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

            // Data Wilayah
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

            // Anak dan Tutor
            // Tutor
            Route::get('/tutor', [TutorController::class, 'index'])->name('tutor');
            Route::get('/tutor/create', [TutorController::class, 'create'])->name('tutor.create');
            Route::post('/tutor/store', [TutorController::class, 'store'])->name('tutor.store');
            Route::get('/wilbin/{id_kacab}', [TutorController::class, 'getWilbinByKacab']);
            Route::get('/shelter/{id_wilbin}', [TutorController::class, 'getShelterByWilbin']);
            Route::get('/tutor/{id_shelter}/edit', [TutorController::class, 'edit'])->name('tutor.edit');
            Route::put('/tutor/{id_shelter}', [TutorController::class, 'update'])->name('tutor.update');
            Route::delete('/tutor/{id_shelter}', [TutorController::class, 'destroy'])->name('tutor.destroy');

            // Rute Absen User Anak
            Route::get('/absensi_user_anak', [AbsenUserController::class, 'absenAnak'])->name('absen_anak');
            Route::post('/absensi_user_anak/create', [AbsenUserController::class, 'create'])->name('absen_anak.create');
            Route::put('/absensi_user_anak/{id_absen_user}', [AbsenUserController::class, 'update'])->name('absen_anak.update');
            Route::delete('/absensi_user_anak/{id_absen_user}', [AbsenUserController::class, 'destroy'])->name('absen_anak.destroy');

            // Absen User Tutor
            Route::get('/absensi_user_tutor', [AbsenUserController::class, 'absenTutor'])->name('absen_tutor');
            Route::post('/absensi_user_tutor/create', [AbsenUserController::class, 'createTutor'])->name('absen_tutor.create');
            Route::put('/absensi_user_tutor/{id_absen_user}', [AbsenUserController::class, 'updateTutor'])->name('absen_tutor.update');
            Route::delete('/absensi_user_tutor/{id_absen_user}', [AbsenUserController::class, 'destroyTutor'])->name('absen_tutor.destroy');

            // Pengajuan Donatur
            Route::get('/pengajuan_donatur', [PenerimaBeasiswaController::class, 'pengajuanDonatur'])->name('pengajuan_donatur');
            Route::put('/pengajuan_donatur/{id_anak}', [PenerimaBeasiswaController::class, 'update'])->name('pengajuan_donatur.update');
            Route::delete('/pengajuan_donatur/{id_anak}', [PenerimaBeasiswaController::class, 'destroy'])->name('pengajuan_donatur.destroy');

            // Pengajuan Donatur (Non Penerima Beasiswa)
            Route::get('/pengajuan_donatur_npb', [PenerimaNonBeasiswaController::class, 'pengajuanDonaturNpb'])->name('pengajuan_donatur_npb');
            Route::put('/pengajuan_donatur_npb/{id_anak}', [PenerimaNonBeasiswaController::class, 'updatenpb'])->name('pengajuan_donatur_npb.update');
            Route::delete('/pengajuan_donatur_npb/{id_anak}', [PenerimaNonBeasiswaController::class, 'destroy'])->name('pengajuan_donatur.destroy');

            // Users Management
            Route::get('/usersall', [UsersAllController::class, 'index'])->name('usersall');
            Route::get('/usersall/create', [UsersAllController::class, 'create'])->name('usersall.create');
            Route::post('/usersall/store', [UsersAllController::class, 'store'])->name('usersall.store');
            Route::get('/usersall/{id_users}/edit', [UsersAllController::class, 'edit'])->name('usersall.edit');
            Route::put('/usersall/update/{id_users}', [UsersAllController::class, 'update'])->name('usersall.update');
            Route::delete('/usersall/destroy/{id_users}', [UsersAllController::class, 'destroy'])->name('usersall.destroy');

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

            // Admin Pusat
            Route::get('/admin_pusat', [AdminPusatController::class, 'index'])->name('admin_pusat');
            Route::get('/admin_pusat/create', [AdminPusatController::class, 'create'])->name('admin_pusat.create');
            Route::post('/admin_pusat/store', [AdminPusatController::class, 'store'])->name('admin_pusat.store');
            Route::get('/admin_pusat/{id_admin_pusat}/show', [AdminPusatController::class, 'show'])->name('admin_pusat.show');
            Route::get('/admin_pusat/{id_admin_pusat}/edit', [AdminPusatController::class, 'edit'])->name('admin_pusat.edit');
            Route::put('/admin_pusat/{id_admin_pusat}', [AdminPusatController::class, 'update'])->name('admin_pusat.update');
            Route::delete('/admin_pusat/{id_admin_pusat}', [AdminPusatController::class, 'destroy'])->name('admin_pusat.destroy');
        });

        // Admin Pusat Keuangan
        Route::prefix('keuangan')->group(function () { 
            Route::get('/dashboard-KeuanganPusat', [DashboardAdminPusatController::class, 'dashboardKeuanganPusat'])->name('dashboardKeuanganPusat');

            // Data Keuangan
            Route::get('/datakeuangan', [KeuanganController::class, 'index'])->name('datakeuangan'); 
            Route::get('/keuangan/store', [KeuanganController::class, 'store'])->name('keuangan.store');
            Route::post('/keuangan/storeprosess', [KeuanganController::class, 'storeprosess'])->name('keuangan.storeprosess');
            Route::delete('/keuangan/destroy/{id_keuangan}', [KeuanganController::class, 'destroy'])->name('keuangan.destroy');
        });

        // Admin Pusat Berita
        Route::prefix('berita')->group(function () { 
            Route::get('/dashboard-BeritaPusat', [DashboardAdminPusatController::class, 'dashboardBeritaPusat'])->name('dashboardBeritaPusat');

            // Data Berita
            Route::get('/databerita', [BeritaController::class, 'index'])->name('databerita'); 
            Route::get('/berita/store', [BeritaController::class, 'store'])->name('berita.store');
            Route::post('/berita/storeprosess', [BeritaController::class, 'storeprosess'])->name('berita.storeprosess');
            Route::get('/berita/edit/{id}', [BeritaController::class, 'edit'])->name('berita.edit');
            Route::post('/berita/editprosess/{id}', [BeritaController::class, 'editprosess'])->name('berita.editprosess');
            Route::delete('/berita/destroy/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');
        });

        // Admin Pusat Berita
        Route::prefix('report')->group(function () { 
            // Dashboard Admin Pusat
            Route::get('/dashboard-ReportPusat', [DashboardAdminPusatController::class, 'dashboardReportPusat'])->name('dashboardReportPusat');

            // Report Anak
            Route::get('/reportanak', [ReportAnakController::class, 'reportAnak'])->name('reportAnak');
            // Route untuk export PDF
            Route::get('/reportanak/export-pdf', [ReportAnakController::class, 'exportPdf'])->name('reportAnak.exportPdf');


            /* Report Tutor */ 
            // Report Tutor Pekanan Dan Pendidikan
            Route::get('/reporttutorpekanan', [ReportTutorController::class, 'reportTutorPekanan'])->name('reportTutorPekanan');
            Route::get('/reporttutorpendidikan', [ReportTutorController::class, 'reportTutorPendidikan'])->name('reportTutorPendidikan');

            /* Shalter Report */
            Route::get('/shalterabsenreport', [ReportShalterController::class, 'shalterAbsenReport'])->name('shalterAbsenReport');
            // Surat Anak Shelter
            Route::get('/shaltersuratanakreport', [ReportShalterSuratAnakController::class, 'shalterSuratAnakReport'])->name('shalterSuratAnakReport');
            Route::get('/showshaltersuratanakreport', [ReportShalterSuratAnakController::class, 'showshelterSuratAnakReport'])->name('showshalterSuratAnakReport');
        Route::delete('/hapusshaltersuratanakreport', [ReportShalterSuratAnakController::class, 'hapusshelterSuratAnakReport'])->name('hapushalterSuratAnakReport');
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

