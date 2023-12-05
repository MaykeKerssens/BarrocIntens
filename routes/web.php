<?php

use App\Http\Controllers\ContractsController;
use App\Http\Controllers\InvoicesController;
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

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

 Route::get('/finance', [InvoicesController::class, 'index'])->name('finance.index');
 Route::resource('invoices', InvoicesController::class)->except(['index']);
 Route::get('/contracts', [ContractsController::class, 'index'])->name('contracts.index');
 Route::resource('contracts', ContractsController::class);


Route::resource('maintenance', MaintenanceController::class);

require __DIR__.'/auth.php';
