<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\KelompokController;
use App\Http\Controllers\PinjamanAnggotaController;
use App\Http\Controllers\PinjamanKelompokController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AuthController::class, 'index'])->middleware('guest')->name('/');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/database/kelompok/register_kelompok', [KelompokController::class, 'register']);
Route::get('/database/kelompok/generatekode', [KelompokController::class, 'generateKode']);

Route::get('/database/penduduk/register_penduduk', [AnggotaController::class, 'register']);
Route::get('/database/penduduk/cari_nik', [AnggotaController::class, 'cariNik']);

Route::resource('/database/desa', DesaController::class);
Route::resource('/database/kelompok', KelompokController::class);
Route::resource('/database/penduduk', AnggotaController::class);

Route::get('/register_proposal', [PinjamanKelompokController::class, 'create']);
Route::get('/register_proposal/{id_kel}', [PinjamanKelompokController::class, 'register']);
Route::get('/daftar_kelompok', [PinjamanKelompokController::class, 'DaftarKelompok']);

Route::get('/detail/{perguliran}', [PinjamanKelompokController::class, 'detail']);
Route::get('/perguliran/proposal', [PinjamanKelompokController::class, 'proposal']);
Route::get('/perguliran/verified', [PinjamanKelompokController::class, 'verified']);
Route::get('/perguliran/waiting', [PinjamanKelompokController::class, 'waiting']);
Route::get('/perguliran/aktif', [PinjamanKelompokController::class, 'aktif']);
Route::get('/perguliran/lunas', [PinjamanKelompokController::class, 'lunas']);
Route::get('/perguliran/generate/{id_pinj}', [PinjamanKelompokController::class, 'generate']);
Route::get('/lunas/{perguliran}', [PinjamanKelompokController::class, 'pelunasan']);
Route::get('/cetak_keterangan_lunas/{perguliran}', [PinjamanKelompokController::class, 'keterangan']);

Route::resource('/perguliran', PinjamanKelompokController::class);

Route::get('/pinjaman_anggota/register/{id_pinkel}', [PinjamanAnggotaController::class, 'create']);
Route::get('/pinjaman_anggota/cari_pemanfaat', [PinjamanAnggotaController::class, 'cariPemanfaat']);
Route::get('/hapus_pemanfaat/{id}', [PinjamanAnggotaController::class, 'hapus']);

Route::resource('/pinjaman_anggota', PinjamanAnggotaController::class);

Route::get('/transaksi/jurnal_umum', [TransaksiController::class, 'jurnalUmum']);

Route::get('/transaksi/ambil_rekening/{id}', [TransaksiController::class, 'rekening']);
Route::get('/transaksi/form_nominal/', [TransaksiController::class, 'form']);

Route::resource('/transaksi', TransaksiController::class);
