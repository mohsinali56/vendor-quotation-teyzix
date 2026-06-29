<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\AdminQuotationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuotationRequestController;
use App\Http\Controllers\VendorController;
//use App\Http\Controllers\VendorProfileController;
use App\Http\Controllers\VendorQuotationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// ========== ADMIN ROUTES ==========
// Sirf admin access kar sake
Route::middleware(['auth', 'admin'])->group(function () {
    
    Route::get('/vendors', [VendorController::class, 'index'])->name('vendors.index');
    Route::get('/vendors/create', [VendorController::class, 'create'])->name('vendors.create');
    Route::post('/vendors', [VendorController::class, 'store'])->name('vendors.store');
    Route::get('/vendors/{vendor}', [VendorController::class, 'show'])->name('vendors.show');
    Route::get('/vendors/{vendor}/edit', [VendorController::class, 'edit'])->name('vendors.edit');
    Route::put('/vendors/{vendor}', [VendorController::class, 'update'])->name('vendors.update');
    Route::delete('/vendors/{vendor}', [VendorController::class, 'destroy'])->name('vendors.destroy');
    
    // Admin quotation requests - CRUD
    Route::resource('quotation-requests', QuotationRequestController::class);
       Route::patch('/quotation-requests/{quotationRequest}/update-status', [QuotationRequestController::class, 'updateStatus'])
    ->name('quotation-requests.update-status');
    Route::get('/quotation-history', [QuotationRequestController::class, 'history'])
    ->name('quotation-requests.history');

    //Compare route ADMIN
      Route::get('/admin/{id}/compare', [AdminQuotationController::class, 'compare'])
         ->name('quotation-requests.compare');
         Route::post('/admin/{id}/accept/{vendorId}', [AdminQuotationController::class, 'acceptVendor'])->name('admin.quotation.accept');
         Route::get('/admin/{id}/pdf', [AdminQuotationController::class, 'downloadPdf'])->name('admin.quotation.pdf');

         Route::put('/admin/quotations/{request}/vendor/{vendor}/delivered', [AdminQuotationController::class, 'markDelivered'])
         ->name('admin.quotations.mark-delivered');
});




Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});


// ========== VENDOR ROUTES ==========
// Sirf vendor access kar sake
Route::middleware(['auth', 'vendor'])->prefix('vendor')->name('vendor.')->group(function () {
    Route::get('/dashboard', [VendorController::class, 'vendorIndex'])->name('dashboard');
    
    Route::get('/quotation-requests', [VendorQuotationController::class, 'index'])
         ->name('quotation-requests.index');
    Route::get('/quotation-requests/{id}/edit', [VendorQuotationController::class, 'edit'])
         ->name('quotation-requests.edit');
    Route::put('/quotation-requests/{id}', [VendorQuotationController::class, 'update'])
         ->name('quotation-requests.update');

         Route::get('/my-quotations', [VendorController::class, 'myQuotations'])->name('my.quotations');
      
});


//Route::middleware(['auth', 'vendor'])->group(function () {
    //Route::get('/vendor/profile/create', [VendorProfileController::class, 'create'])->name('vendor.profile.create');
   // Route::post('/vendor/profile', [VendorProfileController::class, 'store'])->name('vendor.profile.store');
//});


Route::prefix('vendor')->middleware(['auth', 'vendor'])->name('vendor.')->group(function () {
    
    Route::get('/quotation-requests', [VendorQuotationController::class, 'index'])
         ->name('quotation-requests.index');

    Route::get('/quotation-requests/{id}/edit', [VendorQuotationController::class, 'edit'])
         ->name('quotation-requests.edit');
    
    Route::put('/quotation-requests/{id}', [VendorQuotationController::class, 'update'])
         ->name('quotation-requests.update');

         
});

// ========== COMMON ROUTES ==========
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';