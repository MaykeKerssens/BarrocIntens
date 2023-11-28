<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SourcingController;
use App\Http\Controllers\Maintenance\MaintenanceController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('customer')->group(function () {
        Route::get('/dashboard', [CustomerController::class, 'index'])->name('customer.dashboard');
        // Add other customer routes as needed
    });

    Route::prefix('finance')->group(function () {
        Route::get('/dashboard', [InvoicesController::class, 'index'])->name('finance.dashboard');
        // Add other finance routes as needed
    });

    Route::prefix('maintenance')->group(function () {
        Route::get('/dashboard', [MaintenanceController::class, 'index'])->name('maintenance.dashboard');
        // Add other maintenance routes as needed
    });

    Route::prefix('sales')->group(function () {
        Route::get('/dashboard', [SalesController::class, 'index'])->name('sales.dashboard');
        // Add other sales routes as needed
    });

    Route::prefix('sourcing')->group(function () {
        Route::get('/dashboard', [SourcingController::class, 'index'])->name('sourcing.dashboard');
        // Add other sourcing routes as needed
    });
});

// Route::resource('finance', InvoicesController::class);

// Route::resource('maintenance', MaintenanceController::class);

require __DIR__.'/auth.php';
