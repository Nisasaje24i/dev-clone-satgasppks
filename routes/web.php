<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LaporkanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\RiwayatLaporanController;
use App\Http\Controllers\StrukturController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

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
    return redirect('/dashboard');
});

// Route::get('/', function () {
//     return view('user/dashboard');
// });

//user
Route::get('/dashboard', [BerandaController::class, 'dashboard']);
Route::get('/profil', [ProfilController::class, 'profil']);
Route::get('/program', [ProgramController::class, 'program']);
Route::get('/daftar_program', [ProgramController::class, 'daftar_program']);
Route::post('/tambah', [ProgramController::class, 'tambah'])->name('tambah.daftarprogram');
Route::get('/artikel', [ArtikelController::class, 'artikel']);
Route::get('/riwayat_laporan', [RiwayatLaporanController::class, 'riwayat_laporan']);


//laporkan
Route::get('/laporkan', [LaporkanController::class, 'laporkan']);
Route::post('/dakwa_kirim', [LaporkanController::class, 'dakwa_kirim'])->name('dakwa.kirim');
Route::post('/dakwa_edit', [LaporkanController::class, 'dakwa_edit'])->name('dakwa.edit');
Route::post('/laporkan_next', [LaporkanController::class, 'laporkan_next'])->name('laporkan.next');
Route::get('/laporkan_next', [LaporkanController::class, 'laporkan_next'])->name('laporkan.next');
Route::post('/laporkan_kirim', [LaporkanController::class, 'laporkan_kirim'])->name('laporkan.kirim');
Route::get('/jumlah_laporan', [LaporkanController::class, 'jumlah_laporan']);
Route::get('/generate_pdf_laporan/{no_laporan}', [LaporkanController::class, 'generate_pdf_laporan'])->name('generate_pdf_laporan');

//admin
Route::get('/dashboard_admin', [DashboardAdminController::class, 'dashboard_admin']);

//mahasiswa
Route::get('/data_mahasiswa', [MahasiswaController::class, 'data_mahasiswa']);
Route::post('/tambah_data_mahasiswa', [MahasiswaController::class, 'tambah_data_mahasiswa'])->name('tambah.datamahasiswa');
Route::get('/getMahasiswa/{nim}', [MahasiswaController::class, 'getMahasiswa'])->name('mahasiswa.get');
Route::put('/mahasiswa/{nim}', [MahasiswaController::class, 'update'])->name('update.datamahasiswa');
Route::delete('/mahasiswa/{nim}', [MahasiswaController::class, 'delete'])->name('hapus.mahasiswa');
Route::get('/jumlah_mahasiswa', [MahasiswaController::class, 'jumlah_mahasiswa']);

//dosen
Route::get('/data_dosen', [DosenController::class, 'data_dosen']);
Route::post('/tambah_data_dosen', [DosenController::class, 'tambah_data_dosen'])->name('tambah.datadosen');
Route::get('/getDosen/{nidn}', [DosenController::class, 'getDosen'])->name('dosen.get');
Route::put('/dosen/{nidn}', [DosenController::class, 'update'])->name('update.datadosen');
Route::delete('/dosen/{nidn}', [DosenController::class, 'delete'])->name('hapus.dosen');
Route::get('/jumlah_dosen', [DosenController::class, 'jumlah_dosen']);

//karyawan
Route::get('/data_karyawan', [KaryawanController::class, 'data_karyawan']);
Route::post('/tambah_data_karyawan', [KaryawanController::class, 'tambah_data_karyawan'])->name('tambah.datakaryawan');
Route::get('/getKaryawan/{nip}', [KaryawanController::class, 'getKaryawan'])->name('karyawan.get');
Route::put('/karyawan/{nip}', [KaryawanController::class, 'update'])->name('update.datakaryawan');
Route::delete('/karyawan/{nip}', [KaryawanController::class, 'delete'])->name('hapus.karyawan');
Route::get('/jumlah_karyawan', [KaryawanController::class, 'jumlah_karyawan']);

//petugas
Route::get('/data_petugas', [PetugasController::class, 'data_petugas']);
Route::post('/tambah_data_petugas', [PetugasController::class, 'tambah_data_petugas'])->name('tambah.datapetugas');
Route::get('/getPetugas/{idpeg}', [PetugasController::class, 'getPetugas'])->name('petugas.get');
Route::post('/petugas/{idpeg}', [PetugasController::class, 'update'])->name('update.datapetugas');
Route::delete('/petugas/{idpeg}', [PetugasController::class, 'delete'])->name('hapus.petugas');
Route::get('/jumlah_petugas', [PetugasController::class, 'jumlah_petugas']);
Route::get('/getData/{profesi}', [PetugasController::class, 'getData']);
//artikel admin
Route::get('/artikel_admin', [ArtikelController::class, 'artikel_admin']);
Route::post('/tambah_data_artikel', [ArtikelController::class, 'tambah_data_artikel'])->name('tambah.dataartikel');
Route::post('/artikel/{no_artikel}', [ArtikelController::class, 'edit_data_artikel'])->name('edit.dataartikel');
Route::delete('/artikel/{no_artikel}', [ArtikelController::class, 'delete'])->name('hapus.artikel');
Route::get('/jumlah_artikel', [ArtikelController::class, 'jumlah_artikel']);

//program admin
Route::get('/program_admin', [ProgramController::class, 'program_admin']);
Route::post('/tambah_data_program', [ProgramController::class, 'tambah_data_program'])->name('tambah.dataprogram');
Route::post('/program/{no_program}', [ProgramController::class, 'edit_data_program'])->name('edit.dataprogram');
Route::delete('/program/{no_program}', [ProgramController::class, 'delete'])->name('hapus.program');
Route::get('/jumlah_program', [ProgramController::class, 'jumlah_program']);


//struktur organisasi
Route::get('/struktur_organisasi', [StrukturController::class, 'struktur_organisasi']);
Route::post('/tambah_struktur_organisasi', [StrukturController::class, 'tambah_struktur_organisasi'])->name('tambah.datastruktur');
Route::post('/struktur_organisasi/{id}', [StrukturController::class, 'edit_struktur_organisasi'])->name('edit.datastruktur');
Route::delete('/struktur_organisasi/{no_struktur}', [StrukturController::class, 'delete'])->name('hapus.struktur_organisasi');
Route::get('/jumlah_struktur_organisasi', [StrukturController::class, 'jumlah_struktur_organisasi']);

//kelola laporan
Route::get('/kelola_laporan', [LaporkanController::class, 'kelola_laporan']);
Route::get('/getLaporanById/{no_laporan}', [LaporkanController::class, 'getLaporanById'])->name('laporan.get');
Route::put('/updatePenanganan/{no_laporan}', [LaporkanController::class, 'updatePenanganan']);
Route::put('/updateStatus/{no_laporan}', [LaporkanController::class, 'updateStatus']);
Route::POST('/updateSanksi/{no_laporan}', [LaporkanController::class, 'updateSanksi']);

//laporan_masuk_divisi_pelaporan
Route::get('/view_laporan_masuk_divisi_pelaporan', [LaporkanController::class, 'view_divisi_pelaporan']);
Route::get('/view_laporan_masuk_divisi_deteksi', [LaporkanController::class, 'view_divisi_pencegahan_deteksi']);
Route::get('/view_laporan_masuk_divisi_pemulihan', [LaporkanController::class, 'view_divisi_pemulihan']);

//pengguna
Route::get('/data_pengguna', [PenggunaController::class, 'data_pengguna']);

// login
Route::get('/login', [LoginController::class, 'login']);
Route::post('/postLogin', [LoginController::class, 'postLogin'])->name('post.login');
Route::get('/check-login', function (Request $request) {
    // Mengecek apakah pengguna sudah login
    $loggedIn = $request->session()->has('id_login');

    return response()->json(['loggedIn' => $loggedIn]);
})->middleware('auth'); // Menambahkan middleware 'auth' di sini

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
