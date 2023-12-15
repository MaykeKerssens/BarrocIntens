<?php

use App\Http\Controllers\ContractsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SourcingController;
use App\Http\Controllers\Maintenance\MaintenanceController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\PageController;
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

Route::get('/', [ProductController::class, 'welcome'])->name('welcome');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::resource('sourcing', ProductController::class);
//     Route::prefix('sourcing')->group(function () {
//         Route::get('/dashboard', [SourcingController::class, 'index'])->name('sourcing.index');
//         // Add other sourcing routes as needed
//     });

Route::get('/privacy-verklaring', function () {
    return view('privacy-verklaring');
})->name('privacy-verklaring');

Route::get('/contact', [PageController::class, 'contactForm'])->name('contact');
Route::get('/contact-quotation/{id}', [PageController::class, 'contactFormForQuotation'])->name('contact-quotation');
Route::post('/contact-send', [PageController::class, 'contactFormSend'])->name('contact-send');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('customer')->group(function () {
        Route::get('/dashboard', [CustomerController::class, 'index'])->name('customer.index');
        // Add other customer routes as needed
    });

    Route::get('/finance', [InvoicesController::class, 'index'])->name('finance.index');
    Route::resource('invoices', InvoicesController::class)->except(['index']);
    //  Route::get('/finance', [ContractsController::class, 'index'])->name('contracts.dashboard');
    Route::resource('contracts', ContractsController::class)->except(['index']);

    Route::resource('maintenance', MaintenanceController::class)->except(['index']);
    Route::get('/maintenance', [MaintenanceController::class, 'index'])->name('maintenance.index');
    Route::get('/head-of-maintenance', [MaintenanceController::class, 'request'])->name('headOfMaintenance.index');

    Route::get('/sales', [NoteController::class, 'index'])->name('sales.index');
    Route::resource('notes', NoteController::class);


});


require __DIR__.'/auth.php';
