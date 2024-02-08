<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContractsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SourcingController;
use App\Http\Controllers\Maintenance\MaintenanceController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RepairRequestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkOrderController;

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

Route::get('/privacy-verklaring', function () {
    return view('privacy-verklaring');
})->name('privacy-verklaring');

Route::get('/contact', [PageController::class, 'contactForm'])->name('contact');
Route::get('/contact-quotation/{id}', [PageController::class, 'contactFormForQuotation'])->name('contact-quotation');
Route::post('/contact-send', [PageController::class, 'contactFormSend'])->name('contact-send');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified', 'role:1'])->group(function () {
        Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
        Route::resource('repairRequests', RepairRequestController::class)->except(['index']);
        Route::resource('privacyData', PrivacyController::class);
        Route::post('privacyData/requestDeletionByEmail', [PrivacyController::class, 'requestDeletionByEmail'])->name('privacyData.requestDeletionByEmail');
        // Add other customer routes as needed
});

Route::middleware(['auth', 'verified', 'role:2'])->group(function () {
    Route::get('/finance', [InvoicesController::class, 'index'])->name('finance.index');
    Route::resource('invoices', InvoicesController::class)->except(['index']);
    Route::resource('contracts', ContractsController::class)->except(['index']);
    Route::get('/finance{invoice}/download-pdf', [InvoicesController::class, 'downloadPdf'])->name('invoices.download-pdf');
});

Route::middleware(['auth', 'verified', 'role:3'])->group(function () {
    Route::resource('maintenance', MaintenanceController::class)->except(['index']);
    Route::get('/maintenance', [MaintenanceController::class, 'index'])->name('maintenance.index');
    Route::get('/head-of-maintenance', [MaintenanceController::class, 'request'])->name('headOfMaintenance.index');
});

Route::middleware(['auth', 'verified', 'role:4'])->group(function () {
    Route::get('/sales', [NoteController::class, 'index'])->name('sales.index');
    Route::resource('notes', NoteController::class);
    Route::resource('offers', OfferController::class)->except(['index']);
    Route::resource('users', UserController::class)->except(['index']);
    Route::get('/searchnote', [NoteController::class, 'searchnote'])->name('searchnote');
});

    Route::get('/workOrders', [WorkOrderController::class, 'index'])->name('workOrders.index');
    Route::get('/workOrder/create', [WorkOrderController::class, 'create'])->name('workOrder.create');
    Route::get('/workorder/{id}/create', [WorkOrderController::class, 'createWithId']);
    Route::post('/workOrders', [WorkOrderController::class, 'store'])->name('workOrders.store');

Route::middleware(['auth', 'verified', 'role:5'])->group(function () {
    Route::get('/sourcing', [SourcingController::class, 'index'])->name('sourcing.index');
    Route::resource('sourcing', ProductController::class);
    Route::get('/search', [ProductController::class, 'search'])->name('search');
    // Add other sourcing routes as needed
});

Route::middleware(['auth', 'verified', 'role:6'])->group(function () {
    Route::get('/head-of-maintenance', [MaintenanceController::class, 'request'])->name('headOfMaintenance.request');
    Route::resource('appointment', AppointmentController::class);
    // Add other routes for HeadOfMaintenance
});
Route::post('/contact-send', [ContactController::class, 'send'])->name('contact-send');

require __DIR__.'/auth.php';