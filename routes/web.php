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
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/redirect', [RedirectController::class, 'cek']);
});

// Untuk Staff
Route::group(['middleware' => ['auth', 'checkrole:1']], function() {
    Route::get('/staff', [StaffController::class, 'index']);
});

// Untuk Dosen
Route::group(['middleware' => ['auth', 'checkrole:2']], function() {
    Route::get('/dosen', [DosenController::class, 'index']);
});

// Untuk Pimpinan
Route::group(['middleware' => ['auth', 'checkrole:3']], function() {
    Route::get('/pimpinan', [PimpinanController::class, 'index']);
});

