<?php

use App\Http\Controllers\BerkasTaController;
use App\Http\Controllers\JilidController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PlagiarismController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

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
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::resource('konfigurasi/roles', RoleController::class);
    Route::resource('konfigurasi/permissions', PermissionController::class);
    Route::resource('konfigurasi/prices', PriceController::class);
    Route::get('konfigurasi/getPriceData', [PriceController::class, 'getPriceData']);
});


Route::middleware('auth')->group(function () {
    Route::resource('layanan/plagiarism', PlagiarismController::class);
    Route::resource('layanan/jilid', JilidController::class);
});
