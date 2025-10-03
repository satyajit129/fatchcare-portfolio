<?php

use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminAuth;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class, 'index'])->name('index');
Route::get('/tc', [AdminController::class, 'tc'])->name('tc');
Route::get('/privacy', [AdminController::class, 'privacy'])->name('privacy');

Route::prefix('admin')->group(function () {

    Route::middleware(AdminAuth::class)->group(function () {
        Route::get('/dasboard', [AdminController::class, 'adminDashboard'])->name('adminDashboard');
        Route::get('/settings', [AdminController::class, 'adminSettings'])->name('adminSettings');
        Route::post('store-settings', [AdminController::class, 'storeWebsiteSettings'])->name('storeWebsiteSettings');
        Route::get('/landing', [AdminController::class, 'adminLanding'])->name('adminLanding');

        Route::prefix('faq')->group(function () {
            Route::get('/', [AdminController::class, 'adminFAQ'])->name('adminFAQ');
            Route::get('/create-or-edit/{id?}', [AdminController::class, 'adminFAQCreateOrEdit'])->name('adminFAQCreateOrEdit');
            Route::post('/save/{id?}', [AdminController::class, 'adminFAQSave'])->name('adminFAQSave');
            Route::get('delete/{id}', [AdminController::class, 'adminFAQDelete'])->name('adminFAQDelete');
        });
        Route::get('logout', [AdminController::class, 'adminLogout'])->name('adminLogout');
    });
    // Login routes should be outside middleware
    Route::get('/login', [AdminController::class, 'adminLogin'])->name('adminLogin');
    Route::post('/login-request', [AdminController::class, 'adminLoginRequest'])->name('adminLoginRequest');
});
