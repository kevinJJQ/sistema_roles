<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsuarioController;

// Rutas públicas
Route::get('/',      [AuthController::class, 'showLogin'])->name('login');
Route::post('/login',[AuthController::class, 'login'])->name('login.post');
Route::post('/logout',[AuthController::class, 'logout'])->name('logout');

// Rutas del ADMINISTRADOR (protegidas)
Route::middleware(['auth', 'solo.admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard',        [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/crear',            [AdminController::class, 'crear'])->name('admin.crear');
    Route::post('/guardar',         [AdminController::class, 'guardar'])->name('admin.guardar');
    Route::get('/editar/{id}',      [AdminController::class, 'editar'])->name('admin.editar');
    Route::put('/actualizar/{id}',  [AdminController::class, 'actualizar'])->name('admin.actualizar');
    Route::delete('/eliminar/{id}', [AdminController::class, 'eliminar'])->name('admin.eliminar');
});

// Rutas del USUARIO (protegidas)
Route::middleware(['auth', 'solo.usuario'])->group(function () {
    Route::get('/perfil', [UsuarioController::class, 'perfil'])->name('usuario.perfil');
});