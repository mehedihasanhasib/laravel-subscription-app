<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriptionController;
use App\Models\Plan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [SubscriptionController::class, 'dashboard'])
        ->name('dashboard');
    Route::get('/checkout', [SubscriptionController::class, 'index'])
        ->name('checkout');
    Route::post('/checkout', [SubscriptionController::class, 'store']);
});

Route::middleware(['auth', 'verified'])->prefix('account')->group(function () {
    Route::get('/', [AccountController::class, 'index']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
