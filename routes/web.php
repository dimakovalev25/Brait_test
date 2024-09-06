<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/loaders', [App\Http\Controllers\LoaderBreakingController::class, 'show'])->name('loaders.show');
Route::post('/loaders', [App\Http\Controllers\LoaderBreakingController::class, 'search'])->name('loaders.search');
Route::post('/loaders.store', [App\Http\Controllers\LoaderBreakingController::class, 'store'])->name('loaders.store');
Route::get('/loaders_breaking/{loader}', [App\Http\Controllers\LoaderBreakingController::class, 'show'])->name('loaders_breaking.show');

require __DIR__.'/auth.php';
