<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\guru\BerandaController as GuruBerandaController;
use App\Http\Controllers\siswa\BerandaController as SiswaBerandaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    Route::get('/', [AuthController::class, 'loginView'])->name('loginView');
    Route::post('/signIn', [AuthController::class, 'signIn'])->name('signIn');
    Route::get('/signOut', [AuthController::class, 'signOut'])->name('signOut');
});

Route::group(['middleware' => 'authorization'], function(){
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [BerandaController::class, 'index'])->name('berandaView');
    Route::get('/guru', [GuruController::class, 'index'])->name('guruView');
    Route::get('/guru/create', [GuruController::class, 'create'])->name('tambahGuruView');
    Route::post('/guru/store', [GuruController::class, 'store'])->name('tambahGuru');
    Route::get('/guru/edit/{id}', [GuruController::class, 'edit'])->name('ubahGuruView');
    Route::post('/guru/update', [GuruController::class, 'update'])->name('ubahGuru');
    Route::get('/guru/destroy/{id}', [GuruController::class, 'destroy'])->name('hapusGuru');
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswaView');
    Route::get('/siswa/create', [SiswaController::class, 'create'])->name('tambahSiswaView');
    Route::post('/siswa/store', [SiswaController::class, 'store'])->name('tambahSiswa');
    Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('ubahSiswaView');
    Route::post('/siswa/update', [SiswaController::class, 'update'])->name('ubahSiswa');
    Route::get('/siswa/destroy/{id}', [SiswaController::class, 'destroy'])->name('hapusSiswa');
});

Route::group(['prefix' => 'guru', 'as' => 'guru.'], function () {
    Route::get('/', [GuruBerandaController::class, 'index'])->name('berandaView');
    Route::get('/siswa', [GuruBerandaController::class, 'daftarSiswa'])->name('siswaView');
    Route::get('/input/{id}', [GuruBerandaController::class, 'inputView'])->name('inputView');
    Route::post('/input/nilai', [GuruBerandaController::class, 'inputNilai'])->name('inputNilai');
    Route::get('/nilai', [GuruBerandaController::class, 'nilaiView'])->name('nilaiView');
});

Route::group(['prefix' => 'siswa', 'as' => 'siswa.'], function () {
    Route::get('/', [SiswaBerandaController::class, 'index'])->name('berandaView');
    Route::get('/nilai', [SiswaBerandaController::class, 'nilaiView'])->name('nilaiView');
});
});
