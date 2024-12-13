<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KpiController;
use App\Http\Controllers\AuthController;
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
    Route::post('/logout', [AuthController::class,'logout'])->name('logout');

    Route::get('/dashboard', function () {
        return inertia('Dashboard');
    })->name('dashboard');

    Route::middleware(['cekrole:admin'])->group(function () {
        Route::resource('kpi', KpiController::class);
        Route::resource('penilaian', PenilaianController::class);
    });

});