<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\EvidencePhotoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicTrackController;

// Públicas
Route::get('/', fn () => view('public.home'))->name('public.home');
Route::get('/track', fn () => view('public.track'))->name('public.track');
Route::get('/track', [PublicTrackController::class, 'show'])->name('public.track');


// Auth de Breeze
require __DIR__.'/auth.php';

// ADMIN (protegido)
Route::middleware(['auth','admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('admin.dashboard');
    Route::resource('customers', CustomerController::class);
    Route::resource('orders', OrderController::class);
    Route::post('evidence', [EvidencePhotoController::class,'store'])->name('evidence.store');
    Route::delete('evidence/{evidence}', [EvidencePhotoController::class,'destroy'])->name('evidence.destroy');
});
// Redirige el dashboard de Breeze al panel admin
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth','verified'])->name('dashboard');
