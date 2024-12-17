<?php

use App\Http\Controllers\GuruController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KpiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CoachingController;
use App\Http\Controllers\PenilaianController;

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

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/', [AuthController::class, 'login'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::post('logout', [AuthController::class,'logout'])->name('logout');
    Route::post('/submitUser', [AuthController::class,'store'])->name('addUser');
    Route::get('/profile', [AuthController::class, 'indexEditProfile'])->name('profile');
    Route::put('/profile', [AuthController::class, 'updateProfile'])->name('profile');
    
    Route::get('dashboard', function () {
        return inertia('Dashboard');
    })->name('dashboard');
    
    Route::middleware(['cekrole:admin'])->group(function () {
        Route::resource('kpi', KpiController::class);
        Route::resource('penilaian', PenilaianController::class);
        Route::get('/guru', [GuruController::class,'index'])->name('guru');
    });


    Route::middleware(['cekrole:kepala sekolah'])->group(function () {
        Route::resource('coaching', CoachingController::class);
    });

});
