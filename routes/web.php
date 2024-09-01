<?php

use App\Http\Controllers\{
    ProfileController,
    DashboardController,
    PermissaoController,
    RegrasController,
    UsuarioController
};
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Usando Route::resource para simplificar
    Route::resource('usuarios', UsuarioController::class)->only(['index', 'update', 'store', 'destroy']);
    Route::post('usuarios/assign-role', [UsuarioController::class, 'assignRole'])->name('usuarios.assign-role');
    Route::get('usuarios/export', [UsuarioController::class, 'export'])->name('usuarios.export');

    Route::controller(RegrasController::class)->group(function () {
        Route::get('regras', 'index')->name('regras.index');
        Route::post('regras', 'store')->name('regras.store');
        Route::put('regras/{id}', 'update')->name('regras.update');
        Route::delete('regras/{id}', 'destroy')->name('regras.destroy');
        Route::get('regras/{id}', 'show')->name('regras.show');
        Route::post('regras/assign-permissions/{userId}', 'assignPermissions')->name('regras.assign-permissions');
    });

    Route::resource('permissao', PermissaoController::class)->except(['show', 'create']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
