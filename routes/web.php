<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\JimpitanController;

// Root: redirect ke login
Route::get('/', function () {
    return redirect('/login');
});

// === Auth ===
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

// === Dashboard ===
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// === Warga (CRUD untuk admin) ===
Route::get('/warga', [WargaController::class, 'index'])->name('warga.index');
Route::get('/warga/create', [WargaController::class, 'create'])->name('warga.create');
Route::post('/warga', [WargaController::class, 'store'])->name('warga.store');
Route::get('/warga/{id}/edit', [WargaController::class, 'edit'])->name('warga.edit');
Route::put('/warga/{id}', [WargaController::class, 'update'])->name('warga.update');
Route::delete('/warga/{id}', [WargaController::class, 'destroy'])->name('warga.destroy');

// === Jimpitan (CRUD untuk admin) ===
Route::get('/jimpitan', [JimpitanController::class, 'index'])->name('jimpitan.index');
Route::get('/jimpitan/create', [JimpitanController::class, 'create'])->name('jimpitan.create');
Route::post('/jimpitan', [JimpitanController::class, 'store'])->name('jimpitan.store');
Route::get('/jimpitan/{id}/edit', [JimpitanController::class, 'edit'])->name('jimpitan.edit');
Route::put('/jimpitan/{id}', [JimpitanController::class, 'update'])->name('jimpitan.update');
Route::delete('/jimpitan/{id}', [JimpitanController::class, 'destroy'])->name('jimpitan.destroy');

// === Jimpitan untuk user (view-only) ===
Route::get('/jimpitan-user', [JimpitanController::class, 'indexUser'])->name('jimpitan.user');
