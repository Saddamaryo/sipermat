<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\back_admin\DataAdminController;
use App\Http\Controllers\back_admin\KategoriSuratController;
use App\Http\Controllers\back_user\LoginUserController;
use App\Http\Controllers\back_admin\MahasiswaController;
use App\Http\Controllers\back_admin\PengajuanSuratMahasiswaController;
use App\Http\Controllers\back_admin\PimpinanController;
use App\Http\Controllers\back_user\PengajuanSuratmhsController;
use App\Http\Controllers\back_admin\KaprodiController;
use App\Http\Controllers\back_admin\PengarsipanController;
use App\Http\Controllers\back_admin\SuratMasukController;
use App\Http\Controllers\back_user\PanduanPengajuanController;
use App\Http\Controllers\back_user\ProfilController;
use App\Models\Kaprodi;
use App\Models\Kategorisurat;

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

Route::get('/',  [LoginUserController::class, 'loginuser']);

Route::get('pengajuan_surat_mhs', [PengajuanSuratMahasiswaController::class, 'pengajuan_surat_mhs']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';



//ADMIN ROUTE
Route::middleware('dataadmin')->group(function () {
    Route::get('/dashboard', [DataAdminController::class, 'dashboard'])->name('admin_dashboard');
    Route::resource('/pimpinan', PimpinanController::class);
    Route::resource('/mahasiswa', MahasiswaController::class);
    Route::resource('/kategorisurat', KategoriSuratController::class);
    Route::resource('/dataadmin', DataAdminController::class);
    Route::resource('/datakaprodi', KaprodiController::class);
    Route::resource('/pengajuansuratmahasiswa', PengajuanSuratMahasiswaController::class);
    Route::resource('/pengarsipansurat', PengarsipanController::class);
    Route::resource('/suratmasuk', SuratMasukController::class);
    Route::put('ajukankaprodi/{id}', [PengajuanSuratMahasiswaController::class, 'ajukankaprodi']);
    Route::put('ajukankaproditugas/{id}', [PengajuanSuratMahasiswaController::class, 'ajukankaproditugas']);
    Route::put('update_tugas/{id}', [PengajuanSuratMahasiswaController::class, 'update_tugas']);
    Route::delete('/delete_tugas/{id}', [PengajuanSuratMahasiswaController::class, 'delete_tugas'])->name('delete_tugas');
    Route::put('/rejecting_surat/{id}', [PengarsipanController::class, 'rejecting']);
    Route::put('/rejecting_tugas/{id}', [PengarsipanController::class, 'rejecting_tugas']);
    Route::get('/arsipsurattugasadmin', [PengarsipanController::class, 'arsip_surattugas']);
    Route::get('/cekexport/{id}', [PengajuanSuratmhsController::class, 'cekexport']);
    Route::get('/exporttugas/{id}', [PengajuanSuratmhsController::class, 'exporttugas']);
    Route::get('preview/{id}/{prodi}', [PengajuanSuratmhsController::class, 'preview']);
    Route::get('/exporttugas/{id}', [PengajuanSuratmhsController::class, 'exporttugas']);
    Route::put('/uploadmanual/{id}', [PengarsipanController::class, 'uploadmanual']);
    Route::put('/uploadmanual_tugas/{id}', [PengarsipanController::class, 'uploadmanual_tugas']);
    Route::get('/downloadfile_admin/{id}', [PengarsipanController::class, 'downloadfile_admin']);
    Route::post('importmhs', [MahasiswaController::class, 'importmhs']);
    Route::post('/uploadsuratmasuk', [SuratMasukController::class, 'uploadsuratmasuk']);
    Route::get('/downloadfile_suratmasuk/{id}', [SuratMasukController::class, 'downloadfile_suratmasuk']);
    Route::post('/tambaharsipsurat', [PengarsipanController::class, 'tambaharsipsurat']);
    Route::post('/tambaharsipsurattugas', [PengarsipanController::class, 'tambaharsipsurattugas']);
    Route::get('/downloadfile_ajuan/{id}', [PengajuanSuratMahasiswaController::class, 'downloadfile_ajuan']);
    Route::get('/downloadfile_ajuantugas/{id}', [PengajuanSuratMahasiswaController::class, 'downloadfile_ajuantugas']);
    Route::get('/downloadfile_admintugas/{id}', [PengarsipanController::class, 'downloadfile_admintugas']);
    Route::delete('/deletearsipsurat/{id}', [PengarsipanController::class, 'deletearsipsurat'])->name('deletearsipsurat');
    Route::delete('/deletearsipsurattugas/{id}', [PengarsipanController::class, 'deletearsipsurattugas']);
    Route::get('/logoutadmin', [DataAdminController::class, 'logout'])->name('admin_logout');
    
});
    Route::get('/loginadmin', [DataAdminController::class, 'loginadmin'])->name('admin_login');
    Route::post('/login-submit-admin', [DataAdminController::class, 'login_submit'])->name('admin_login_submit');
    Route::get('/download-template/{id}', [KategorisuratController::class, 'downloadfile_template'])->name('download-template');


//USER ROUTE
Route::middleware('users')->group(function () {
    Route::get('/katalogsurat', [LoginUserController::class, 'katalogsurat'])->name('user_katalog');
    #Route::get('users/katalog', [LoginUserController::class,'display'])->name('display');
    Route::get('details/{id}', [PengajuanSuratmhsController::class, 'details']);
    Route::post('ajukan', [PengajuanSuratmhsController::class, 'ajukan']);
    Route::post('ajukansurattugas', [PengajuanSuratmhsController::class, 'ajukansurattugas']);
    Route::get('/pengajuansurat', [PengajuanSuratmhsController::class, 'pengajuan_surat']);
    Route::get('/riwayatpengajuan', [PengarsipanController::class, 'riwayatpengajuanmahasiswa']);
    Route::get('/riwayatpengajuantugas', [PengarsipanController::class, 'riwayatpengajuantugasmhs']);
    Route::put('/update_pengajuan/{id}', [PengajuanSuratmhsController::class, 'update_pengajuan']);
    Route::get('/delete_pengajuan/{id}', [PengajuanSuratmhsController::class, 'delete_pengajuan']);
    Route::put('/update_pengajuantugas/{id}', [PengajuanSuratmhsController::class, 'update_pengajuantugas']);
    Route::get('/delete_pengajuantugas/{id}', [PengajuanSuratmhsController::class, 'delete_pengajuantugas']);
    Route::get('exportpdf/{id}', [PengajuanSuratmhsController::class, 'exportpdf']);
    Route::get('exportpdftugas/{id}', [PengajuanSuratmhsController::class, 'exportpdftugas']);
    Route::get('/profilmahasiswa', [ProfilController::class, 'tampilprofil']);
    Route::post('/changepassword', [ProfilController::class, 'changepassword'])->name('changepassword');
    Route::put('/update_profil/{id}', [ProfilController::class, 'update_profil']);
    Route::get('/downloadfile/{id}', [PengarsipanController::class, 'downloadfile']);
    Route::get('/downloadfile_tugas/{id}', [PengarsipanController::class, 'downloadfile_tugas']);
    Route::get('/previewsurat/{id}', [PengajuanSuratmhsController::class, 'previewsurat']);
    Route::get('/previewsurattugas/{id}', [PengajuanSuratmhsController::class, 'previewsurattugas']);
    Route::get('/logoutuser', [LoginUserController::class, 'logout'])->name('user_logout');
    Route::get('/panduanpengajuan', [PanduanPengajuanController::class, 'panduanpenggunaan' ]);

});
#Route::get('pengajuan_surat', [PengajuanSuratmhsController::class, 'pengajuan_surat']);
    Route::get('/loginuser', [LoginUserController::class, 'loginuser'])->name('user_login');
    Route::post('/login-submit-user', [LoginUserController::class, 'login_submit'])->name('user_login_submit');
    Route::get('/template_surat/{id}', [PengajuanSuratmhsController::class, 'details']);
    

//KAPRODI ROUTE
Route::middleware('kaprodi')->group(function () {
    Route::get('/dashboardkaprodi', [KaprodiController::class, 'dashboard_kaprodi'])->name('dashboard_kaprodi');
    Route::get('/pengajuansuratkaprodi', [KaprodiController::class, 'pengajuansuratkaprodi'])->name('kaprodi_pengajuan');
    Route::get('/arsipsurat', [KaprodiController::class, 'pengarsipansuratkaprodi'])->name('kaprodi_pengarsipan');
    Route::get('/arsipsurattugas', [KaprodiController::class, 'pengarsipansurattugaskaprodi']);
    Route::put('/accepting/{id}', [PengarsipanController::class, 'accepting']);
    Route::put('/accepting_tugas/{id}', [PengarsipanController::class, 'accepting_tugas']);
    Route::put('/rejecting_kaprodi/{id}', [PengarsipanController::class, 'rejecting']);
    Route::put('/rejecting_tugas_kaprodi/{id}', [PengarsipanController::class, 'rejecting_tugas']);
    Route::get('/downloadfile_kaprodi/{id}', [PengarsipanController::class, 'downloadfile_kaprodi'])->name('downloadfile_kaprodi');
    Route::get('/downloadfile_kaproditugas/{id}', [PengarsipanController::class, 'downloadfile_kaproditugas'])->name('downloadfile_kaproditugas');
    Route::get('kaprodi/cekexport/{id}', [PengajuanSuratmhsController::class, 'cekexport']);
    Route::get('kaprodi/exporttugas/{id}', [PengajuanSuratmhsController::class, 'exporttugas']);
    Route::get('kaprodi/preview/{id}/{prodi}', [PengajuanSuratmhsController::class, 'preview']);
    Route::get('kaprodi/previewtugas/{id}', [PengajuanSuratmhsController::class, 'previewtugas']);
    Route::get('/logout', [KaprodiController::class, 'logout'])->name('kaprodi_logout');
});
    Route::get('/loginkaprodi', [KaprodiController::class, 'loginkaprodi'])->name('kaprodi_login');
    Route::post('/login-submit', [KaprodiController::class, 'login_submit'])->name('kaprodi_login_submit');
