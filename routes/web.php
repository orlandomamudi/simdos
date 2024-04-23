<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\PimpinanController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\StaffController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Jika User Belum Login
Route::group(['middleware' => 'guest'], function() {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'dologin']);
});

// Untuk Semua Role
Route::group(['middleware' => ['auth', 'checkrole:1,2,3']], function() {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/redirect', [RedirectController::class, 'cek']);
});

// Untuk Staff
Route::group(['middleware' => ['auth', 'checkrole:1']], function() {
    Route::get('/staff', [StaffController::class, 'index'])->name('staff.index');
    Route::get('/staff/daftar-dosen', [StaffController::class, 'list'])->name('staff.dosen');
    Route::get('/daftar-user', [StaffController::class, 'user'])->name('staff.user');
    Route::get('/tambah-user', [StaffController::class, 'create'])->name('staff.create');
    Route::post('/store', [StaffController::class, 'store'])->name('staff.store');
    Route::get('/staff/daftar-dosen/{user}/detail', [StaffController::class, 'detail']);
    Route::get('/staff/daftar-dosen/{user}/detail/cetak', [StaffController::class, 'cetak']);
    Route::get('/staff/profile', [StaffController::class, 'profile'])->name('staff.profile');
    Route::put('/staff/profile/update/{user}', [StaffController::class, 'updateProfile']);
    Route::post('/staff/profile/change-password', [StaffController::class, 'changePassword']);;
});

// Untuk Dosen
Route::group(['middleware' => ['auth', 'checkrole:2']], function() {
    Route::get('/dosen', [DosenController::class, 'index'])->name('dosen.index');
    Route::get('/biodata/{user}', [DosenController::class, 'biodata']);
    Route::get('/berkas', [DosenController::class, 'berkas'])->name('dosen.berkas');
    Route::post('/update/{user}', [DosenController::class, 'update']);
    Route::put('/berkas/update/{user}', [DosenController::class, 'updateBerkas']);
    Route::put('/berkas/tambah-tp/{user}', [DosenController::class, 'tambahtp']);
    Route::put('/berkas/tambah-sga/{user}', [DosenController::class, 'tambahsga']);
    Route::put('/berkas/tambah-skp/{user}', [DosenController::class, 'tambahskp']);
    Route::put('/berkas/tambah-pi/{user}', [DosenController::class, 'tambahpi']);
    Route::put('/berkas/tambah-kpd/{user}', [DosenController::class, 'tambahkpd']);
    Route::put('/berkas/tambah-ckm/{user}', [DosenController::class, 'tambahckm']);
    Route::put('/berkas/tambah-lp/{user}', [DosenController::class, 'tambahlp']);
    // Route::get('/berkas/download/{file}', [DosenController::class, 'download']);
    Route::get('/dosen/profile', [DosenController::class, 'profile'])->name('dosen.profile');
    Route::put('/dosen/profile/update/{user}', [DosenController::class, 'updateProfile']);
    Route::post('/dosen/profile/change-password', [DosenController::class, 'changePassword']);;
});

// Untuk Pimpinan
Route::group(['middleware' => ['auth', 'checkrole:3']], function() {
    Route::get('/pimpinan', [PimpinanController::class, 'index'])->name('pimpinan.index');
    Route::get('/daftar-dosen', [PimpinanController::class, 'list'])->name('pimpinan.dosen');
    Route::get('/pimpinan/daftar-dosen/{user}/detail', [PimpinanController::class, 'detail']);
    Route::get('/pimpinan/daftar-dosen/{user}/detail/cetak', [PimpinanController::class, 'cetak']);
    Route::get('/pimpinan/profile', [PimpinanController::class, 'profile'])->name('pimpinan.profile');
    Route::put('/pimpinan/profile/update/{user}', [PimpinanController::class, 'updateProfile']);
    Route::post('/pimpinan/profile/change-password', [PimpinanController::class, 'changePassword']);;
});

