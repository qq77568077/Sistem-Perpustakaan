<?php

use App\Http\Controllers\BerkasTaController;
use App\Http\Controllers\perpustakaan\DocumentController;
use App\Http\Controllers\perpustakaan\PengajuanPlagiarismController;
use App\Http\Controllers\perpustakaan\PengajuanJilidController;

use App\Http\Controllers\mahasiswa\FileController;
use App\Http\Controllers\mahasiswa\JilidController;
use App\Http\Controllers\mahasiswa\PlagiarismController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\UserController;
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
    Route::resource('master/roles', RoleController::class);
    Route::resource('master/permissions', PermissionController::class);
    Route::resource('master/prices', PriceController::class);
    Route::resource('master/prodi', ProdiController::class);
    Route::resource('master/users', UserController::class);
    Route::resource('master/mahasiswa', MahasiswaController::class);
    Route::resource('master/term', TermController::class);
    Route::get('master/getPriceData', [PriceController::class, 'getPriceData']);
    
});


Route::middleware('auth')->group(function () {
    Route::resource('layanan/pengajuan-plagiarism', PengajuanPlagiarismController::class);
    Route::resource('layanan/plagiarism', PlagiarismController::class);
    Route::resource('layanan/jilid', JilidController::class);
    Route::resource('layanan/pengajuan-jilid', PengajuanJilidController::class);
    Route::resource('layanan/berkas', FileController::class);
    Route::resource('layanan/file', DocumentController::class);
});
